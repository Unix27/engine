<?php


namespace App\Http\Controllers\Checkout;

use Apoca\Sibs\Facade\Sibs;
use App\Events\UserWasLogged;
use App\Helpers\Curl;
use App\Http\Controllers\Auth\Traits\AjaxAuthResponses;
use App\Http\Controllers\FrontController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Payment as PaymentModel;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderMail;
use App\Services\Cart\CartService;
use App\Services\Dto\DtoOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Packages\Paypal\Api\BillingPlan;
use Packages\Paypal\Api\BillingSubscription;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Sentry\SentrySdk;
use Torann\LaravelMetaTags\Facades\MetaTag;

class CheckoutController extends FrontController
{
    use AjaxAuthResponses;
    /**
     * @var CartService
     */
    private $cartService;

    private $_api_context;
    private $paypal_conf;

    /** Production Postback URL */
    const VERIFY_URI = 'https://ipnpb.paypal.com/cgi-bin/webscr';
    /** Sandbox Postback URL */
    const SANDBOX_VERIFY_URI = 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr';

    /** Response from PayPal indicating validation was successful */
    const VALID = 'VERIFIED';
    /** Response from PayPal indicating validation failed */
    const INVALID = 'INVALID';

    /**
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        /** PayPal api context **/
        $this->paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($this->paypal_conf['client_id'], $this->paypal_conf['secret']));
        $this->_api_context->setConfig($this->paypal_conf['settings']);

        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function show(Request $request)
    {
        // Meta Tags
        MetaTag::set('title', config('app.name') . ' - Checkout');
        MetaTag::set('description', config('app.name') . ' - Checkout');

        if (!$this->getCartCount()) {
            return redirect()->back();
        }

        $cart = $this->cartService->getCart();
        if ($cart) {
            foreach ($cart as &$item) {
                if(!isset($item->post)) continue;
                $pid = 0;
                if (isset($item->options[0])) {
                    $pid = (int)$item->options[0]['options']['product_id'];
                }
                $item->product = Product::find($pid);
                $item->post = $item->product->post;
            }
        }

        $total = $this->cartService->getCartTotal();
        $this->cartService->createCartModel();
        $this->cartService->updateProductsInCart($cart);

        $cart_model = $this->cartService->getCartModel();

        return view('order.checkout', compact('cart', 'total', 'cart_model'));
    }

    /**
     * @param OrderRequest $request
     * @return mixed
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_and_last_names' => 'required',
            'address' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'country_id' => 'required',
            'mobile_phone' => 'required',
            'login' => 'required|email',
            'password' => 'required',
            'payment' => 'required',
            'shipping' => 'required',
            'i_agree' => 'required'
        ]);

        if (!Auth::user()) {
            $dbUser = User::where('email', $request->get('login'))->first();
            if($dbUser) {
                $validator->errors()
                    ->add('login', trans('auth.Email address already exists', [], $request->get('locale', config('app.locale'))))
                    ->add('message', trans('auth.Email address already exists', [], $request->get('locale', config('app.locale'))));
                return redirect()->back()->withInput()->withErrors($validator);
            }
        }

        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        //TODO: wtf???
        $dtoOrder = new DtoOrder();
        $dtoOrder->__set('name', $request->first_and_last_names);
        $dtoOrder->__set('address', $request->address);
        $dtoOrder->__set('post_code', $request->post_code);
        $dtoOrder->__set('city', $request->city);
        $dtoOrder->__set('country_id', $request->country_id);
        $dtoOrder->__set('phone', $request->mobile_phone);
        $dtoOrder->__set('email', $request->login);
        $dtoOrder->__set('password', $request->password);
        $dtoOrder->__set('payment', $request->payment);
        $dtoOrder->__set('shipping', $request->shipping);

        $user = $this->cartService->getUser($dtoOrder);
        $order = $this->cartService->createOrder($dtoOrder, $user);

        $this->cartService->removeAll();


        if(!$user->hasAnyRole(['super-admin', 'trial', 'subscriber'])) {
            if($request->get('payment') == 'sepa') {
                return $this->subscribe_sepa($order);
            } else {
                return $this->subscribe($order);
            }
        } else {
            if($request->get('payment') == 'sepa') {
                return $this->subscribe_sepa($order);
            } else {
                return $this->pay($order);
            }
        }
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function pay(Order $order)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $itemList = [];
        foreach ($order->items as $orderItem) {
            $item = new Item();
            $item->setName($orderItem->product->title)
            ->setCurrency($order->currency->code)
                ->setQuantity($orderItem->quantity)
                ->setPrice($orderItem->price);
            $itemList[] = $item;
        }

        $item_list = new ItemList();
        $item_list->setItems($itemList);
        $amount = new Amount();
        $amount->setCurrency($order->currency->code)
            ->setTotal($order->total_price);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Order: ' . $order->number);
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(lurl("checkout/done"))
        ->setCancelUrl(lurl("checkout/cancel"));
        $request = new Payment();
        $request->setIntent('Order')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $request->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            app('sentry')->captureException($ex);
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::to(url('/'));
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to(url('/'));
            }
        }

        $payment = $order->payments->first();
        $payment->payment_id = $request->getId();
        $payment->save();


        foreach ($request->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $approvalUrl = $link->getHref();
                break;
            }
        }

        return \Redirect::away($approvalUrl);
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function subscribe(Order $order)
    {
        // Create a new billing plan
        $name = Str::limit($order->items->first()->post->title, 117);
        if($order->items->count() > 1) {
            $name = 'Order: ' . $order->number . ' at: ' . Carbon::parse($order->created_at)->toDateString();
        }

        $plan = new BillingPlan();
        $plan->setName($name)
            ->setProductId(env('PAYPAL_PRODUCT_ID'))
            ->setDescription($name)
            ->setBillingCycles([
                [
                    'frequency' => [
                        'interval_unit' => 'DAY',
                        'interval_count' => 14
                    ],
                    "tenure_type" => "TRIAL",
                    "sequence" => 1,
                    "total_cycles" => 1
                ],
                [
                    'frequency' => [
                        'interval_unit' => 'MONTH',
                        'interval_count' => 12
                    ],
                    "tenure_type" => "REGULAR",
                    "sequence" => 2,
                    "pricing_scheme" => [
                        "fixed_price" => [
                            "value" => "99.96",
                            "currency_code" => "EUR"
                        ]
                    ],
                ],
            ])
            ->setPaymentPreferences([
                "auto_bill_outstanding" => true,
                "setup_fee" => [
                    "value" => $order->total_price,
                    "currency_code" => $order->currency->code,
                ],
                "setup_fee_failure_action" => "CONTINUE",
                "payment_failure_threshold" => 3
            ]);

        try {
            $createdPlan = $plan->create($this->_api_context);
            $planId = $createdPlan->getId();
            $subscription = new BillingSubscription();
            $subscription->setPlanId($planId)
                ->setStartTime(\Carbon\Carbon::now()->addMinutes(1)->toIso8601String())
                ->setSubscriber([
                    "name" => [
                        "given_name" => $order->customer_first_name,
                        "surname" => $order->customer_last_name,
                    ],
                    "email_address" => $order->customer_email,
                ])->setApplicationContext([
                    "brand_name" => config('app.name'),
                    "locale" => Str::replaceFirst('_', '-', config('appLang.locale', 'de-DE')),
                    "shipping_preference" => "SET_PROVIDED_ADDRESS",
                    "user_action" => "SUBSCRIBE_NOW",
                    "payment_method" => [
                        "payer_selected" => "PAYPAL",
                        "payee_preferred" => "IMMEDIATE_PAYMENT_REQUIRED",
                    ],
                    "return_url" => env('APP_URL') . "/checkout/done",
                    "cancel_url" => env('APP_URL') . "/checkout/cancel",
                ]);

            $subscription->create($this->_api_context);
            $approvalUrl = $subscription->getLink('approve');

            $payment = $order->payments->first();
            $payment->payment_id = $subscription->getId();
            $payment->save();

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            app('sentry')->captureException($ex);
            die($ex);
        } catch (\Exception $ex) {
            app('sentry')->captureException($ex);
            die($ex);
        }

        return \Redirect::away($approvalUrl);
    }

    public function subscribe_sepa(Order $order) {
        $request = [
            'brand' => 'CHECKOUT',
            'amount' => 99.96,
            'currency' => 'EUR',
            'type' => 'DB',
            'optionalParameters' => [
                "recurringType" => "REPEATED",
                'shopperResultUrl' => config('app.url') . '/checkout/done'
            ],
        ];

        $response = Sibs::checkout($request)->pay();
        $checkoutId = $response->response->id;

        return Redirect::route('show_sepa_form', ['checkoutId' => $checkoutId])->with('checkoutId', $checkoutId);
    }

    public function showSepaForm(Request $request, $checkoutId)
    {
        return view('order.sepa', compact('checkoutId'));
    }

    /**
     * @param Order $order
     * @return mixed
     */
    public function invite_subscribe()
    {
        // Create a new billing plan
        $name = 'Early access to ' . Str::ucfirst(config('app.name')) . '!';
        $plan = new BillingPlan();
        $plan->setName($name)
            ->setProductId(env('PAYPAL_PRODUCT_ID'))
            ->setDescription($name)
            ->setBillingCycles([
                [
                    'frequency' => [
                        'interval_unit' => 'DAY',
                        'interval_count' => 14
                    ],
                    "tenure_type" => "TRIAL",
                    "sequence" => 1,
                    "total_cycles" => 1
                ],
                [
                    'frequency' => [
                        'interval_unit' => 'MONTH',
                        'interval_count' => 12
                    ],
                    "tenure_type" => "REGULAR",
                    "sequence" => 2,
                    "pricing_scheme" => [
                        "fixed_price" => [
                            "value" => "99.96",
                            "currency_code" => "EUR"
                        ]
                    ],
                ],
            ])
            ->setPaymentPreferences([
                "auto_bill_outstanding" => true,
//                "setup_fee" => [
//                    "value" => $order->total_price,
//                    "currency_code" => $order->currency->code,
//                ],
//                "setup_fee_failure_action" => "CONTINUE",
                "payment_failure_threshold" => 3
            ]);

        try {
            $createdPlan = $plan->create($this->_api_context);
            $planId = $createdPlan->getId();
            $subscription = new BillingSubscription();
            $subscription->setPlanId($planId)
                ->setStartTime(\Carbon\Carbon::now()->addMinutes(1)->toIso8601String())
                ->setSubscriber([
                    "name" => [
                        "given_name" => Auth::user()->name,
                        "surname" => Auth::user()->name,
                    ],
                    "email_address" => Auth::user()->email,
                ])->setApplicationContext([
                    "brand_name" => config('app.name'),
                    "locale" => Str::replaceFirst('_', '-', config('appLang.locale', 'de-DE')),
                    "shipping_preference" => "SET_PROVIDED_ADDRESS",
                    "user_action" => "SUBSCRIBE_NOW",
                    "payment_method" => [
                        "payer_selected" => "PAYPAL",
                        "payee_preferred" => "IMMEDIATE_PAYMENT_REQUIRED",
                    ],
                    "return_url" => env('APP_URL') . "/checkout/done",
                    "cancel_url" => env('APP_URL') . "/checkout/cancel",
                ]);

            $subscription->create($this->_api_context);
            $approvalUrl = $subscription->getLink('approve');

            $payment = PaymentModel::create(
                [
                    'user_id' => Auth::user()->id,
                    'payment_method_id' => 1,
                    'payment_id' => $subscription->getId(),
//                'package_id' => 1,
                    'payment_status' => PaymentModel::STATUS_INCOMPLETE,
                    'price' => 99.96,
                    'affise_clickid' => Cookie::get('clickid'),
                    'affise_secure' => Cookie::get('secure'),
                ]
            );

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            app('sentry')->captureException($ex);
            die($ex);
        } catch (\Exception $ex) {
            app('sentry')->captureException($ex);
            die($ex);
        }

        return \Redirect::away($approvalUrl);
    }
    /**
     * @param LoginRequest $request
     * @return mixed
     * @throws \Throwable
     */
    public function login(LoginRequest $request)
    {
        // Get the right login field
        $loginField = getLoginField($request->input('login'));

        // Get credentials values
        $credentials = [
            $loginField => $request->input('login'),
            'password' => $request->input('password'),
            'blocked' => 0,
        ];
        if (in_array($loginField, ['email', 'phone'])) {
            $credentials['verified_' . $loginField] = 1;
        } else {
            $credentials['verified_email'] = 1;
            $credentials['verified_phone'] = 1;
        }

        // Auth the User
        if (auth()->attempt($credentials)) {
            $user = User::find(auth()->user()->getAuthIdentifier());
            // Update last user logged Date
            Event::dispatch(new UserWasLogged($user));
            // Redirect normal users
            return $this->successResponse(lurl('checkout'));
        }

        $user = User::whereEmail($request->input('login'))->first();
        if($user) {
            if (!password_verify($request->input('password'), $user->password)) {
                $errors = ['password' => trans('auth.failed', [], $request->get('locale', config('app.locale')))];
                $view = view('order.inc.checkout._partials._login')->withErrors($errors)->render();
                return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
            }
        }

        $user = new User();
        $user->email = $request->input('login');
        $user->password = $request->input('password');
        $view = view('order.inc.checkout._partials._user-info')->with('user', $user)->render();
        return response()->json(['html' => $view], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return mixed
     */
    public function getCartCount()
    {
        return $this->cartService->getCartCount();
    }

    /**
     * @return mixed
     */
    public function thankYouPage(Request $request)
    {
        if(!Auth::user()) return false;

        $user = \Auth::user();
        $user->assignRole('trial');
        $user->save();


        // Get the payment info
        $paymentId = null;
        if($request->has('subscription_id')) {
            $paymentId = $request->get('subscription_id');
        }

        if($request->has('paymentId')) {
            $paymentId = $request->get('paymentId');
        }

        $payment = PaymentModel::where('payment_id', $paymentId)
            ->first();

        $similarProducts = [];
        if (!empty($payment) && $paymentId) {
            $paymentData = [
                'payment_status' => PaymentModel::STATUS_SUCCESS,
                'payment_id' => $paymentId,
                'transaction_id' =>  $request->get('token'),
                'payer_id' =>  $request->get('PayerID'),
                'price' => Cookie::has('clickid') ? '99.96' : $payment->order->total_price,
            ];

            $payment->update($paymentData);

            $order = $payment->order;
            if($order) {
                $order->payment_status = Order::STATUS_SUCCESS;
                $order->save();
                if(isset($order->items) && $order->items->count() > 0){
                    $post = isset($order->items->first()->post) ? $order->items->first()->post : Post::all()->random();
                    $similarProducts = $post->getSimilarByCategory();
                }

                Mail::to($user)->send(new OrderMail($order, $similarProducts));
            }
        }

        if (Cookie::has('clickid') && Cookie::has('secure')) {
            if (Cookie::has('clickid') && Cookie::has('secure')) {
                Curl::getContent(
                    'https://offers-onlinegrup.affise.com/postback?clickid='. Cookie::get('clickid') . '&secure=' .  Cookie::get('secure')
                );
            }
//            Curl::getContent(
//                'https://offers-onlinegrup.affise.com/postback?clickid='. Cookie::get('clickid') .'&goal=rebill&secure=' . Cookie::get('secure')
//            );
        }
        return view('order.thankyou', compact('order','similarProducts'));
    }

    public function subscriptionCancelled(Request $request)
    {
        return response()->json([], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function subscriptionActivated(Request $request)
    {
        return response()->json([], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
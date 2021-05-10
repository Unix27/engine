<?php

namespace App\Services\Cart;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment as PaymentModel;
use App\Models\Permission;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Services\Dto\DtoCart;
use App\Services\Dto\DtoOrder;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Auth;
use App\Models\Cart as ModelCart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

/**
 * Class CartService
 * @package App\Services\Cart
 */
class CartService
{
    /**
     * @return mixed
     */
    public function getCart()
    {
        return Cart::content();
    }

    /**
     * @return mixed
     */
    public function getCartTotal()
    {
        return Cart::initial();
    }

    /**
     * @return mixed
     */
    public function getCartCount()
    {
        return Cart::count();
    }

    /**
     * @param DtoCart $dtoCart
     * @return bool|mixed
     */
    public function getRowId(DtoCart $dtoCart)
    {
        $id = $dtoCart->__get('product_id');
        $cart = $this->getCart();

        if ($cart) {
            foreach ($cart as $item) {
                if ((int)$item->id == $id) {
                    return $item->rowId;
                }
            }
        }

        return false;
    }

    /**
     * @param DtoCart $dtoCart
     * @return mixed
     */
    public function addToCart(DtoCart $dtoCart)
    {
        $id = $dtoCart->__get('product_id');
        $title = $dtoCart->__get('product_title');
        $count = $dtoCart->__get('quantity');
        $price = $dtoCart->__get('price');
        $attrs = $dtoCart->__get('attrs');

        $attrs['currency_code'] =  $dtoCart->__get('currency_code');

        if (!$attrs) {
            $attrs = array();
        }

        return Cart::add($id, $title, $count, $price, 1, $attrs);
    }

    /**
     * @param DtoCart $dtoCart
     * @param $action
     * @return bool
     */
    public function updateCart(DtoCart $dtoCart, $action)
    {
        $row_id = $dtoCart->__get('row_id');
        $count = $dtoCart->__get('quantity');

        $product = Cart::get($row_id);
        if ($product) {
            switch ($action) {
                case 'remove':
                    return Cart::remove($row_id);
                    break;
                case 'plus':
                    $qty = (int)$product->qty;
                    if ($count) {
                        $qty = $qty + $count;
                    } else {
                        $qty++;
                    }
                    return Cart::update($row_id, $qty);
                    break;
                case 'minus':
                    $qty = (int)$product->qty;;
                    if ($qty == 1) {
                        return false;
                    } else {
                        $qty--;
                        return Cart::update($row_id, $qty);
                    }
                    break;
                case 'set_count':
                    if ((int)$count > 0) {
                        return Cart::update($row_id, $count);
                    } else {
                        return false;
                    }
                    break;
                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function removeAll()
    {
        return Cart::destroy();
    }

    //work with database

    /**
     * @return ModelCart
     */
    public function createCartModel()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $cart = ModelCart::find(Session::get('user_cart_id'));
        if (!Session::has('user_cart_id') || !$cart) {
            $cart = new ModelCart();

            if ($user) {
                $cart->user_id = $user->id;
                $cart->is_guest = 0;
            } else {
                $cart->is_guest = 1;
            }

            $cart->save();

            Session::put('user_cart_id', $cart->id);
            Session::put('user_order_id', false);
        } else {
            if ($user) {
                $cart->user_id = $user->id;
                $cart->is_guest = 0;
            } else {
                $cart->is_guest = 1;
            }
            $cart->save();
        }

        if ($user) {
            if (!$cart->customer_email) {
                $cart->customer_email = $user->email;
            }
            if (!$cart->customer_first_name) {
                $cart->customer_first_name = $user->first_name;
            }
            if (!$cart->customer_last_name) {
                $cart->customer_last_name = $user->last_name;
            }
            if (!$cart->address) {
                $cart->address = $user->address;
            }
            if (!$cart->city) {
                $cart->city = $user->city;
            }
            if (!$cart->mobile_phone) {
                $cart->mobile_phone = $user->phone;
            }
            if (!$cart->post_code) {
                $cart->post_code = $user->zip;
            }

            $cart->save();
        }

        return $cart;
    }

    /**
     * @param $session_cart
     * @return bool
     */
    public function updateProductsInCart($session_cart)
    {
        $cart_id = Session::get('user_cart_id');

        if ($session_cart) {
            $items_count = 0;
            $total_price = 0;
            foreach ($session_cart as $item) {
                $fields_set = array();

                if(isset($item->options[0])){
                    $product_id = $item->options[0]['options']['product_id'];
                    $product = Product::find($product_id);
                    if(isset($item->options[0]['options']['fields_set'])){
                        $fields_set = $item->options[0]['options']['fields_set'];
                    }
                }

                $cartItem = new CartItem();

                $cartItem->cart_id = $cart_id;
                $cartItem->post_id = $product->post->id;
                $cartItem->quantity = $item->qty;
                $items_count += $item->qty;
                $cartItem->price = $item->price;
                $cartItem->total_price = $item->subtotal;
                $cartItem->currency_code = currency()->getUserCurrency();
                $total_price += $item->subtotal;
                $cartItem->product_id = $product->id;
                $cartItem->options = json_encode($fields_set);

                $cartItem->save();
            }

            $cart = ModelCart::find($cart_id);
            $cart->items_count = $items_count;
            $cart->total_price = $total_price;
            $cart->currency_code = currency()->getUserCurrency();
            $cart->save();
        }

        return true;
    }

    /**
     * @return bool
     */
    public function getCartModel()
    {
        $cart_id = session('user_cart_id');
        if ($cart_id) {
            $cart = ModelCart::with('items')->where('id', '=', $cart_id)->first();
            return $cart;
        } else {
            return false;
        }
    }

    /**
     * @param DtoOrder $dtoOrder
     * @return User
     */
    public function getUser(DtoOrder $dtoOrder)
    {
        // Conditions to Verify User's Email or Phone
        $emailVerificationRequired = config('settings.mail.email_verification') == 1 && request()->filled('email');
        $phoneVerificationRequired = config('settings.sms.phone_verification') == 1 && request()->filled('phone');

        $email = $dtoOrder->__get('email');
        $user = User::where('email', '=', $email)->withCount('orders')->first();

        if (!$user) {
            $name = explode(' ', $dtoOrder->__get('name'));
            $firstname = $name[0];
            $lastname = (isset($name[1])) ? $name[1] : '';

            $user = new User();
            $user->email = $email;
            $user->name = $dtoOrder->__get('name');
            $user->password = Hash::make(request()->input('password'));
            $user->country_code = $dtoOrder->__get('country_id');
            $user->phone = $dtoOrder->__get('phone');
            $user->ip_addr = $_SERVER['REMOTE_ADDR'];
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->address = $dtoOrder->__get('address');
            $user->zip = $dtoOrder->__get('post_code');
            $user->city = $dtoOrder->__get('city');
            $user->verified_email = 1;
            $user->verified_phone = 1;

            // Email verification key generation
            if ($emailVerificationRequired) {
                $user->email_token = md5(microtime() . mt_rand());
                $user->verified_email = 0;
            }

            // Mobile activation key generation
            if ($phoneVerificationRequired) {
                $user->phone_token = mt_rand(100000, 999999);
                $user->verified_phone = 0;
            }

            $user->save();
            \Illuminate\Support\Facades\Auth::login($user, true);
            // Send Admin Notification Email
            if (config('settings.mail.admin_notification') == 1) {
                try {
                    // Get all admin users
                    $admins = User::permission(Permission::getStaffPermissions())->get();
                    if ($admins->count() > 0) {
                        Notification::send($admins, new UserNotification($user));
                    }
                } catch (\Exception $e) {
                    flash($e->getMessage())->error();
                }
            }
        } else {
            if(!\Illuminate\Support\Facades\Auth::user()) {
                \Illuminate\Support\Facades\Auth::login($user, true);
            }
        }

        return $user;
    }

    /**
     * @param DtoOrder $dtoOrder
     * @param User $user
     * @return Order|bool|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function createOrder(DtoOrder $dtoOrder, User $user)
    {
        $cart = $this->getCartModel();
        $name = explode(' ', $dtoOrder->__get('name'));
        $firstname = $name[0];
        $lastname = (isset($name[1])) ? $name[1] : '';

        $cart_update = ModelCart::where('id', '=', $cart->id)->first();
        if ($cart_update) {
            $cart_update->user_id = $user->id;
            $cart_update->is_guest = 0;
            $cart_update->customer_email = $dtoOrder->__get('email');
            $cart_update->customer_first_name = $firstname;
            $cart_update->customer_last_name = $lastname;
            $cart_update->address = $dtoOrder->__get('address');
            $cart_update->country_id = $dtoOrder->__get('country_id');
            $cart_update->city = $dtoOrder->__get('city');
            $cart_update->mobile_phone = $dtoOrder->__get('phone');
            $cart_update->shipping_method = $dtoOrder->__get('shipping');
            $cart_update->payment_method = $dtoOrder->__get('payment');
            $cart_update->post_code = $dtoOrder->__get('post_code');
            $cart_update->save();
        }

        //create order
        $cart = $this->getCartModel();
        $payment = PaymentModel::create(
            [
                'user_id' => $user->id,
                'payment_method_id' => 1,
//                'package_id' => 1,
                'payment_status' => PaymentModel::STATUS_INCOMPLETE,
                'price' => $cart->total_price,
            ]
        );

        $order = new Order();
        $order->cart_id = $cart->id;
        $order-> number = 'S-' . str_pad($user->id, 8, "0", STR_PAD_LEFT) . '-' . (data_get($user, 'orders_count', 0) + 1);
        $order->is_guest = 0;
        $order->user_id = $user->id;
        $order->customer_email = $cart->customer_email;
        $order->customer_first_name = $cart->customer_first_name;
        $order->customer_last_name = $cart->customer_last_name;
        $order->address = $cart->address;
        $order->city = $cart->city;
        $order->mobile_phone = $cart->mobile_phone;
        $order->shipping_method = $cart->shipping_method;
        $order->payment_method = $cart->payment_method;
        $order->items_count = $cart->items_count;
        $order->total_price = $cart->total_price;
        $order->post_code = $cart->post_code;
        $order->country_id = $cart->country_id;
        $order->currency_code = $cart->currency_code;
        $order->payment_status = Order::STATUS_INCOMPLETE;
        $order->payment_id = $payment->id;
        $order->save();

        $payment->order_id = $order->id;
        $payment->save();

        session(['user_cart_id' => false]);
        session(['user_order_id' => $order->id]);

        //create order items
        if ($cart->items) {
            foreach ($cart->items as $item) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->post_id = $item->post_id;
                $order_item->quantity = $item->quantity;
                $order_item->price = $item->price;
                $order_item->total_price = $item->total_price;
                $order_item->currency_code = $item->currency_code;
                $order_item->product_id = $item->product_id;
                $order_item->options = $item->options;
                $order_item->save();
            }
        } else {
            return false;
        }

        return $order;
    }

    /**
     * @param $order_id
     * @return mixed
     */
    public function getOrderModel($order_id)
    {
        $order = Order::with('items')->where('id', '=', $order_id)->first();
        return $order;
    }
}
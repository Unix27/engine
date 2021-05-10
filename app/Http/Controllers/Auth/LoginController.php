<?php

namespace App\Http\Controllers\Auth;


use App\Helpers\Auth\Traits\AuthenticatesUsers;
use App\Http\Controllers\Auth\Traits\AjaxAuthResponses;
use App\Http\Controllers\FrontController;
use App\Http\Requests\LoginRequest;
use App\Events\UserWasLogged;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Torann\LaravelMetaTags\Facades\MetaTag;

class LoginController extends FrontController
{
	use AuthenticatesUsers, AjaxAuthResponses;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	// If not logged in redirect to
	protected $loginPath = 'login';

	// The maximum number of attempts to allow
	protected $maxAttempts = 5;

	// The number of minutes to throttle for
	protected $decayMinutes = 15;

	// After you've logged in redirect to
	protected $redirectTo = 'account';

	// After you've logged out redirect to
	protected $redirectAfterLogout = '/';

	/**
	 * LoginController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware('guest')->except(['except' => 'logout']);

		// Set default URLs
		$isFromLoginPage = Str::contains(url()->previous(), '/' . trans('routes.login'));
		$this->loginPath = $isFromLoginPage ? config('app.locale') . '/' . trans('routes.login') : url()->previous();
		$this->redirectTo = $isFromLoginPage ? config('app.locale') . '/account' : url()->previous();
		$this->redirectAfterLogout = config('app.locale');

		// Get values from Config
		$this->maxAttempts = (int)config('settings.security.login_max_attempts', $this->maxAttempts);
		$this->decayMinutes = (int)config('settings.security.login_decay_minutes', $this->decayMinutes);
	}

	// -------------------------------------------------------
	// Laravel overwrites for loading LaraClassified views
	// -------------------------------------------------------

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLoginForm()
	{
		// Remembering Login
		if (auth()->viaRemember()) {
			return redirect()->intended($this->redirectTo);
		}

		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'login'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'login')));
		MetaTag::set('keywords', getMetaTag('keywords', 'login'));

		return view('auth.login');
	}

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function login(LoginRequest $request)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->toManyAttemptsResponse();
//			return $this->sendLockoutResponse($request);
        }

        // Get the right login field
        $loginField = getLoginField($request->input('login'));

        // Get credentials values
        $credentials = [
            $loginField => $request->input('login'),
            'password'  => $request->input('password'),
            'blocked'   => 0,
        ];
        if (in_array($loginField, ['email', 'phone'])) {
            $credentials['verified_' . $loginField] = 1;
        } else {
            $credentials['verified_email'] = 1;
            $credentials['verified_phone'] = 1;
        }

//        if($user = User::whereEmail($request->input('login'))->first()) {
//            if(!$user->verified_payment_data) {
//                $payment_data_url = route('payment-data', ['user_id' => $user->id]);
//                return $this->successResponse($payment_data_url);
////                return Redirect::route('payment-data', ['user_id' => $user->id]);
//            }
//        }

        // Auth the User
        if (auth()->attempt($credentials)) {
            $user = User::find(auth()->user()->getAuthIdentifier());

            // Update last user logged Date
            Event::dispatch(new UserWasLogged($user));

            // Redirect admin users to the Admin panel
//			if (auth()->check()) {
//				if ($user->hasAllPermissions(Permission::getStaffPermissions())) {
//				    return $this->successResponse(admin_uri());
////					return redirect(admin_uri());
//				}
//			}
//            \Session::forget('flash_notification');
//            flash()->clear();
//            flash(t("Welcome to :app_name", ['app_name' => config('app.name')]))->info();
            // Redirect normal users
            if ($request->ajax()) {
                return $this->successResponse($this->redirectTo);
            } else {
                return redirect()->intended($this->redirectTo);
            }

        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        // Check and retrieve previous URL to show the login error on it.
        if (session()->has('url.intended')) {
            $this->loginPath = session()->get('url.intended');
        }

        if ($request->ajax()) {
            return $this->errorResponse(['error' => trans('auth.failed', ['seconds' => 30])]);
        } else {
            return redirect($this->loginPath)->withErrors(['error' => trans('auth.failed')])->withInput();
        }

//		return redirect($this->loginPath)->withErrors(['error' => trans('auth.failed')])->withInput();
    }

    /**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function logout(Request $request)
	{
		// Get the current Country
		if (session()->has('country_code')) {
			$countryCode = session('country_code');
		}

		// Remove all session vars
		$this->guard()->logout();
		$request->session()->flush();
		$request->session()->regenerate();

		// Retrieve the current Country
		if (isset($countryCode) && !empty($countryCode)) {
			session(['country_code' => $countryCode]);
		}

//		$message = t('You have been logged out.') . ' ' . t('See you soon.');
//		flash($message)->success();

        // return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
        $referrer = \Spatie\Url\Url::fromString(\Illuminate\Support\Facades\URL::previous())->getFirstSegment();
        return $referrer == 'account' || $referrer == 'checkout' ?  Redirect::to('/') : Redirect::back();
	}
}

<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Auth\Traits\SendsPasswordResetEmails;
use App\Http\Controllers\Auth\Traits\AjaxAuthResponses;
use App\Http\Controllers\Auth\Traits\SendsPasswordResetSmsTrait;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Torann\LaravelMetaTags\Facades\MetaTag;


class ForgotPasswordController extends FrontController
{
//    use SendsPasswordResetEmails {
//        sendResetLinkEmail as public traitSendResetLinkEmail;
//    }
    use SendsPasswordResetSmsTrait, SendsPasswordResetEmails, AjaxAuthResponses;
    
    protected $redirectTo = '/account';
    
    /**
     * PasswordController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->middleware('guest');
    }
    
    // -------------------------------------------------------
    // Laravel overwrites for loading LaraClassified views
    // -------------------------------------------------------
    
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        // Meta Tags
        MetaTag::set('title', getMetaTag('title', 'password'));
        MetaTag::set('description', strip_tags(getMetaTag('description', 'password')));
        MetaTag::set('keywords', getMetaTag('keywords', 'password'));
        
        return view('auth.passwords.email');
    }
    
    /**
     * Send a reset link to the given user.
     *
     * @param ForgotPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        // Get the right login field
        $field = getLoginField($request->input('login'));
        $request->merge([$field => $request->input('login')]);
        if ($field != 'email') {
            $request->merge(['email' => $request->input('login')]);
        }
        
        // Send the Token by SMS
        if ($field == 'phone') {
            return $this->sendResetTokenSms($request);
        }
        
        // Go to the core process
        return $this->sendResponse($request);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function sendResponse(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }



    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $this->successResetLinkResponse(trans($response, [], $request->get('locale', config('app.locale'))));
//        return back()->with('status', trans($response));
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return $this->errorResponse(['email' => trans($response, [], $request->get('locale', config('app.locale')))]);
//        return back()
//            ->withInput($request->only('email'))
//            ->withErrors(['email' => trans($response)]);
    }

}

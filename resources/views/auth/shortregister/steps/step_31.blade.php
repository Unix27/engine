<div class="simpleRegister step41">
    <div class="freeTrialMessaging" data-uia="freeTrialMessaging">
        <div class="content">
            <span data-uia="freeTrialMessagingText" id="">@lang('register.step_2_isfree')</span>
        </div>
    </div>
    <div class="simpleContainer" data-transitioned-child="true">
        <div class="centerContainer" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
            <form data-uia="payment-form" method="post">
                <div class="paymentFormContainer">
                    <div>
                        <div class="stepHeader-container" data-uia="header">
                            <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                                <span class="stepIndicator" data-uia="" id="">@lang('register.step_3_title')</span>
                                <h1 class="stepTitle" data-uia="stepTitle">@lang('register.paypal_info')</h1>
                            </div>
                        </div>
                    </div>
                    <div class="fieldContainer">
                        <div class="changePlanContainer">
                            <div class="planInfo">
                                <span class="planName" data-uia="planName">@lang('register.step_1_subscribe')</span><span class="planDesc" data-uia="planDesc" id="">€8,33/mo*</span>
                            </div>
                            {{--<div class="changePlanAction">
                                <a class="pointer changePlanLink" data-uia="changePlanAction">Ändra</a>
                            </div>--}}
                        </div>
                        <p class="paypalText" data-uia="" id="">@lang('register.pp_continue')</p>
                    </div>
                </div>
                <div class="submitBtnContainer">
                    <button class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="action-submit-payment" id="simplicityPayment-FORTS" type="submit">@lang('register.step_1_btn2')<span class="icon-paypal-container" style="position:relative; top:4px; margin-left: 5px;">&nbsp;<img src="{{url('images/regimages/paypal_icon.png')}}"/></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
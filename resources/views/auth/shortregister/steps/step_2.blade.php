<div class="simpleRegister">
    <div class="simpleContainer" data-transitioned-child="true">
        <div class="centerContainer contextStep" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
            <div class="regContainer" data-uia="context-registration">
                <div class="stepLogoContainer">
                    <span class="stepLogo regStepLogo"></span>
                </div>
                <div class="stepHeader-container" data-uia="header">
                    <div class="stepHeader" data-a11y-focus="true" tabindex="0">
                        <span class="stepIndicator" data-uia="" id="">@lang('register.step_2_title')</span>
                        <h1 class="stepTitle" data-uia="stepTitle">@lang('register.step_2_subtitle')</h1>
                    </div>
                </div>
                <div class="contextBody contextRow" data-uia="" id="">
                    @lang('register.step_2_text')
                </div>
            </div>
            <div class="submitBtnContainer">
                <a href="{{route('regstep21')}}" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="cta-continue-registration" type="button">@lang('register.step_1_btn2')</a>
            </div>
        </div>
    </div>
</div>
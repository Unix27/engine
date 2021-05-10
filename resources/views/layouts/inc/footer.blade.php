<div class="footer">
    <div class="reducer noMarginBottom">
        <div class="inner">
            <div class="links">
                <div class="links__wrapper"><a class="link" href="/{{app()->getLocale()}}/category">{{ trans('footer.Catalog') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/about">{{ trans('footer.About Joonlo', ['sitename' => config('app.name')]) }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/help-centre">{{ trans('footer.Help Centre') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/privacy">{{ trans('footer.Privacy Policy') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/privacy-collection-statement">{{ trans('footer.Privacy Collection Statement') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/terms">{{ trans('footer.Terms of Use') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/membership">{{ trans('footer.Membership') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/review-policy">{{ trans('footer.Review Policy') }}</a></div>
                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/whistleblower-protection-policy">{{ trans('footer.Whistleblower Protection Policy') }}</a></div>
{{--                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/cancellation-right">{{ trans('footer.Cancellation right') }}</a></div>--}}
{{--                <div class="links__wrapper"><a class="link link-in-swal" href="/{{app()->getLocale()}}/page/delivery">{{ trans('footer.Shipping', ['sitename' => config('app.name')]) }}</a></div>--}}
                <div class="links__wrapper"><a class="link" href="/{{app()->getLocale()}}/contact">{{ t('Contact') }}</a></div>
            </div>
            <div class="copy"><span><!--noindex--></span>© <!-- -->{{ date('Y') }}<!-- --> {{ config('settings.app.app_name') }}. {{ t('All Rights Reserved') }}.<span><!--/noindex--></span>
            </div>
        </div>
    </div>
</div>

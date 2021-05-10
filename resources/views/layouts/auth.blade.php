<?php
$rawFullUrl = url(\Illuminate\Support\Facades\Request::getRequestUri());
$fullUrl = rawurldecode($rawFullUrl);
$plugins = array_keys((array)config('plugins'));
$publicDisk = \Storage::disk(config('filesystems.default'));
?>
        <!DOCTYPE html>
<html lang="{{ ietfLangTag(config('app.locale')) }}"{!! (config('lang.direction')=='rtl') ? ' dir="rtl"' : '' !!}>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('common.meta-robots')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-title" content="{{ config('settings.app.app_name') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-144-precomposed.png') . getPictureVersion() }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-114-precomposed.png') . getPictureVersion() }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-72-precomposed.png') . getPictureVersion() }}">
    <link rel="apple-touch-icon-precomposed"
          href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-57-precomposed.png') . getPictureVersion() }}">
    <link rel="shortcut icon" href="{{ imgUrl(config('settings.app.favicon'), 'favicon') }}">
    <title>{!! MetaTag::get('title') !!}</title>
    {!! MetaTag::tag('description') !!}{!! MetaTag::tag('keywords') !!}

    @if (config('settings.other.js_code'))
        {!! printJs(config('settings.other.js_code')) . "\n" !!}
    @endif

    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (strtolower($localeCode) == strtolower(config('lang.abbr', config('app.locales'))))
            <link rel="canonical" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}"/>
        @else
            <link rel="alternate" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}"
                  hreflang="{{ strtolower($localeCode) }}"/>
        @endif
    @endforeach
    @if (!empty($dnsPrefetch) && count($dnsPrefetch) > 0)
        @foreach($dnsPrefetch as $dns)
            <link rel="dns-prefetch" href="//{{ $dns }}">
        @endforeach
    @endif

    @if (isset($post))
        @if (isVerifiedPost($post))
            @if (config('services.facebook.client_id'))
                <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
            @endif
            {!! !empty($og) ? $og->renderTags() : '' !!}
            {!! MetaTag::twitterCard() !!}
        @endif
{{--            <link href="{{ url('assets/plugins/magiczoomplus/magiczoomplus/magiczoomplus.css') . getPictureVersion() }}" rel="stylesheet" type="text/css" media="screen"/>--}}
{{--            <script type="text/javascript" src="{{ url('assets/plugins/magiczoomplus/magiczoomplus/magiczoomplus.js') }}"></script>--}}
    @else
        @if (config('services.facebook.client_id'))
            <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
        @endif
{{--        {!! !empty($og) ? $og->renderTags() : '' !!}--}}
{{--        {!! MetaTag::twitterCard() !!}--}}
    @endif
    @include('feed::links')
    @if (config('settings.seo.google_site_verification'))
        <meta name="google-site-verification" content="{{ config('settings.seo.google_site_verification') }}"/>
    @endif
    @if (config('settings.seo.msvalidate'))
        <meta name="msvalidate.01" content="{{ config('settings.seo.msvalidate') }}"/>
    @endif
    @if (config('settings.seo.alexa_verify_id'))
        <meta name="alexaVerifyID" content="{{ config('settings.seo.alexa_verify_id') }}"/>
    @endif
    @if (config('settings.seo.yandex_verification'))
        <meta name="yandex-verification" content="{{ config('settings.seo.yandex_verification') }}"/>
    @endif

    @yield('before_styles')

    @if (config('plugins.detectadsblocker.installed'))
        <link href="{{ url('assets/detectadsblocker/css/style.css') . getPictureVersion() }}" rel="stylesheet">
    @endif

{{--    @include('layouts.inc.tools.style')--}}
{{--    <link href="{{ url('css/app.rtl.css') . getPictureVersion() }}" rel="stylesheet">--}}
    <link href="{{ url('css/main_p.min.css') . getPictureVersion() }}" rel="stylesheet">
{{--    <link href="{{ url('css/iapp.css') . getPictureVersion() }}" rel="stylesheet">--}}
    <link href="{{ url('css/jquery.fancybox.min.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ url('css/custom.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ url('css/need_auth.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">

    @yield('after_styles')

	@if (isset($plugins) and !empty($plugins))
		@foreach($plugins as $plugin)
			@yield($plugin . '_styles')
		@endforeach
	@endif

    @if (config('settings.style.custom_css'))
		{!! printCss(config('settings.style.custom_css')) . "\n" !!}
    @endif

	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
      paceOptions = {
        elements: true
      };
    </script>

{{--    <script src="{{ url('assets/js/pace.min.js') }}"></script>--}}
    <script src="{{ url('assets/plugins/modernizr/modernizr-custom.js') }}"></script>
{{--    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>--}}
    @section('recaptcha_scripts')
        @if (
            config('settings.security.recaptcha_activation')
            and config('recaptcha.site_key')
            and config('recaptcha.secret_key')
        )
            <style>
                .is-invalid .g-recaptcha iframe,
                .has-error .g-recaptcha iframe {
                    border: 1px solid #f85359;
                }
            </style>
            @if (config('recaptcha.version') == 'v3')
                <script type="text/javascript">
                  function myCustomValidation(token) {
                    /* read HTTP status */
                    /* console.log(token); */

                    if ($('#gRecaptchaResponse').length) {
                      $('#gRecaptchaResponse').val(token);
                    }
                  }
                </script>
                {!! recaptchaApiV3JsScriptTag([
                    'action' 		    => request()->path(),
                    'custom_validation' => 'myCustomValidation'
                ]) !!}
            @else
                {!! recaptchaApiJsScriptTag() !!}
            @endif
        @endif
    @show
</head>
{{--<body class="{{ config('app.skin') }}">--}}
<body>
@if (\App::environment(['staging', 'production']))
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTX9B7T"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
@php
    $agent =  new \Jenssegers\Agent\Agent();
@endphp
<div id="content">
    <div class="{{app()->getLocale()}}">
        <div class="parent___container light___white">
            <div class="reducer__wrapper">
                @include('cookieConsent::index')
{{--                @include('layouts.inc.navbar')--}}
{{--                @include('layouts.inc.header')--}}
{{--                @include('layouts.inc.menu')--}}
                <div class="content">
                    @yield('content')
                </div>
            </div>
            @section('footer')
                @include('layouts.inc.footer')
            @show
        </div>
    </div>
</div>


@section('modal_abuse')
@show
@section('modal_message')
@show
@section('modal_menu')
@show
@section('modal_menu_header')
@show

@if (config('plugins.detectadsblocker.installed'))
    @if (view()->exists('detectadsblocker::modal'))
        @include('detectadsblocker::modal')
    @endif
@endif

<script>
            {{-- Init. Root Vars --}}
  var siteUrl = '<?php echo url((!currentLocaleShouldBeHiddenInUrl() ? config('app.locale') : '').'/'); ?>';
  var languageCode = '<?php echo config('app.locale'); ?>';
  var countryCode = '<?php echo config('country.code', 0); ?>';
  var timerNewMessagesChecking = <?php echo (int)config('settings.other.timer_new_messages_checking', 0); ?>;

            {{-- Init. Translation Vars --}}
  var langLayout = {
      'hideMaxListItems': {
        'moreText': "{{ t('View More') }}",
        'lessText': "{{ t('View Less') }}"
      },
    };
</script>

@yield('before_scripts')
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>

{{--    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>--}}
{{--<script src="{{ assetVer('app.min.js', '', 'build', 'js/')   }}"></script>--}}
<script src="{{ asset('vendor/admin') }}/sweetalert2/sweetalert2.all.min.js"></script>
{{--<script src="{{ url('js/app.js') . getPictureVersion()   }}"></script>--}}
{{--<script src="{{ url('assets/js/app/make.favorite.js') . getPictureVersion()  }}"></script>--}}
{{--<script src="{{ url('js/login.js') . getPictureVersion()  }}"></script>--}}
{{--@if (config('settings.optimization.lazy_loading_activation') == 1)--}}
{{--    <script src="{{ url('assets/plugins/lazysizes/lazysizes.min.js') }}" async=""></script>--}}
{{--@endif--}}
{{--@if (file_exists(public_path() . '/assets/plugins/select2/js/i18n/'.config('app.locale').'.js'))--}}
{{--    <script src="{{ url('assets/plugins/select2/js/i18n/'.config('app.locale').'.js') }}"></script>--}}
{{--@endif--}}
{{--@if (config('plugins.detectadsblocker.installed'))--}}
{{--    <script src="{{ url('assets/detectadsblocker/js/script.js') . getPictureVersion() }}"></script>--}}
{{--@endif--}}

<script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('js/jquery.validate.min.js') }}"></script>
@if(app()->getLocale() == 'de')
    <script src="{{ url('js/messages_de.js') }}"></script>
@endif
{{--<script src="{{ url('js/custom.js') . getPictureVersion() }}"></script>--}}



{{--<script>--}}
{{--  $(document).ready(function () {--}}
{{--      --}}{{-- Modal Login --}}
{{--      @if (isset($errors) and $errors->any())--}}
{{--          @if ($errors->any() and old('quickLoginForm')=='1')--}}
{{--            $('#quickLogin').modal();--}}
{{--          @endif--}}
{{--      @endif--}}
{{--  });--}}
{{--</script>--}}
{{--@include('auth.inc.auth')--}}

@section('details_scripts')
@show

@section('footer_scripts')
@show

@yield('after_scripts')

@if (isset($plugins) and !empty($plugins))
    @foreach($plugins as $plugin)
        @yield($plugin . '_scripts')
    @endforeach
@endif

@if (config('settings.footer.tracking_code'))
    {!! printJs(config('settings.footer.tracking_code')) . "\n" !!}
@endif

@if(Session::has('setReferrer') && \App::environment(['staging', 'production']))
    <script>
        ga('set', 'referrer', "{!! env('APP_URL') !!}");
    </script>
@endif

<div class="alert-modal" data-modal="add-to-favorites-success"  style="display: none">
    <div data-modal-overlay class="sidebar___3X-DF isRight___3q0nh isPopupOnDesktop___31Nwb undefined" role="button" tabindex="-1">
        <div class="inner___3uuBN">
            <div>
                <div class="hasControls___2hM-W header___FpcwU isPopupHeader___2wcWY isPopupOnDesktopHeader___2LnPe">
                    <div class="inner___2zF7X inner____spgD">
                        <div class="back___20j9M back" role="button" tabindex="0" style="display: none"></div>
                        <div class="close___3u6yL" role="button" tabindex="0" data-modal-close></div>
                        <div class="title___21_yP">Product add to favorites</div>
                    </div>
                </div>
            </div>
            <div class="alert-modal__content">
                <button class="alert-modal__btn  button" data-modal-close>Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="alert-modal" data-modal="remove-from-favorites-success"  style="display: none">
    <div data-modal-overlay class="sidebar___3X-DF isRight___3q0nh isPopupOnDesktop___31Nwb undefined" role="button" tabindex="-1">
        <div class="inner___3uuBN">
            <div>
                <div class="hasControls___2hM-W header___FpcwU isPopupHeader___2wcWY isPopupOnDesktopHeader___2LnPe">
                    <div class="inner___2zF7X inner____spgD">
                        <div class="back___20j9M back" role="button" tabindex="0" style="display: none"></div>
                        <div class="close___3u6yL" role="button" tabindex="0" data-modal-close></div>
                        <div class="title___21_yP">Product remove from favorites</div>
                    </div>
                </div>
            </div>
            <div class="alert-modal__content">
                <button class="alert-modal__btn  button" data-modal-close>Ok</button>
            </div>
        </div>
    </div>
</div>

<div style="display: none">
    <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" id="ico-delivery">
        <g>
            <path id="svg_2" d="m23,16l0,-4c0,-0.552 0.448,-1 1,-1l2.857,0l-0.338,-0.788c-0.315,-0.735 -1.038,-1.212 -1.838,-1.212l-6.681,0l0,14l3.05,0c-0.084,-0.414 -0.068,-0.863 0.087,-1.326c0.262,-0.784 0.935,-1.404 1.738,-1.598c1.652,-0.4 3.125,0.84 3.125,2.424c0,0.171 -0.018,0.338 -0.05,0.5l3.05,0l0,-7l-6,0z"/>
            <circle id="svg_3" fill="none"  stroke-width="2" stroke-miterlimit="10" r="2.5" cy="22.5" cx="23.5"/>
            <circle id="svg_4" fill="none"  stroke-width="2" stroke-miterlimit="10" r="2.5" cy="22.5" cx="7.5"/>
            <line id="svg_5" fill="none"  stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" y2="22" y1="22" x2="29" x1="28"/>
            <line id="svg_6" fill="none"  stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" y2="22" y1="22" x2="3" x1="1"/>
            <path id="svg_7" d="m16,5l-13,0c-1.105,0 -2,0.895 -2,2l0,16l4.05,0c-0.084,-0.414 -0.068,-0.863 0.087,-1.326c0.262,-0.784 0.935,-1.404 1.739,-1.598c1.651,-0.4 3.124,0.84 3.124,2.424c0,0.171 -0.018,0.338 -0.05,0.5l8.05,0l0,-16c0,-1.105 -0.895,-2 -2,-2z"/>
        </g>
    </svg>

    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" id="ico-arrow-back">
        <g data-name="Layer 2" id="Layer_2">
            <path
                d="M31,18A11.73,11.73,0,0,0,19.18,7.59H4L7.25,3A1,1,0,0,0,7,1.59a1,1,0,0,0-1.39.24L1.15,8.08a.87.87,0,0,0,0,1l4.47,6.26A1,1,0,0,0,7.25,14.2L4,9.59H19.18A9.73,9.73,0,0,1,29,18.44a9.51,9.51,0,0,1-9.48,10.15H2a1,1,0,1,0,0,2h17.5A11.51,11.51,0,0,0,31,18Z"/>
            <path
                d="M5.6,15.77,1.13,9.51a.9.9,0,0,1,0-1L5.6,2.23A1,1,0,0,1,7,2H7a1,1,0,0,1,.23,1.4L3.23,9l4,5.6A1,1,0,0,1,7,16H7A1,1,0,0,1,5.6,15.77Z"/>
            <path
                d="M19.16,8H2A1,1,0,0,0,1,9H1a1,1,0,0,0,1,1H19.16A9.73,9.73,0,0,1,29,18.85,9.51,9.51,0,0,1,19.5,29H2a1,1,0,0,0-1,1H1a1,1,0,0,0,1,1H19.5A11.51,11.51,0,0,0,31,18.39,11.72,11.72,0,0,0,19.16,8Z"/>
        </g>
    </svg>
</div>

@if ($agent->isMobile())
    <div class="sign-mobile-menu" style="display: none;">
        <div class="sidebar newHeaderWebOn" role="button" tabindex="-1">
            <div class="inner"><div>
                    <nav>
                        @if(!empty($mainCategories))
                            @foreach($mainCategories as $key => $cat)
                                <a class="child" href="{{ \App\Helpers\UrlGen::category($cat) }}">
                                <span class="icon">
                                    <img class="image image contain" alt="" src="{{ imgUrl($cat->picture, 'cat') }}" sizes="1.5em" srcset="{{ imgUrl($cat->picture, 'cat') }} 42w, {{ imgUrl($cat->picture, 'cat') }} 63w, {{ imgUrl($cat->picture, 'cat') }} 84w, {{ imgUrl($cat->picture, 'cat') }} 126w, {{ imgUrl($cat->picture, 'cat') }} 168w">
                                </span>
                                    <span class="text">{{ $cat->name }}</span>
                                </a>
                            @endforeach
                        @endif
                    </nav>
                    <div class="separator"></div>
{{--                    <a class="burgerFooterLink" href="/en/support">--}}
{{--                        <div class="text">Support</div>--}}
{{--                    </a>--}}
{{--                    <a class="burgerFooterLink" href="/en/support?s=ordering-paying&amp;f=fees-taxes">--}}
{{--                        <div class="text">Delivery</div>--}}
{{--                    </a>--}}
{{--                    <a class="burgerFooterLink" href="/en/support?s=refund-policy-warranty">--}}
{{--                        <div class="text">Warranty</div>--}}
{{--                    </a>--}}
                    <div class="burgerFooterButtons">
                        @if (is_array(LaravelLocalization::getSupportedLocales()) && count(LaravelLocalization::getSupportedLocales()) > 1)
                            <div class="burgerFooterButton select__language-button-mobile">
                                <div class="buttonWrapper newHeaderWeb">
                                    <button class="button fill-lightgrey padding-normal block rounded">
                                <span class="children">
                                    <div class="language">
                                        <div role="button" tabindex="0" class="lang-icon">
                                            @php
                                                if(strtoupper(config('app.locale')) == 'EN') {
                                                    $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDIxIDE1IiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGRlZnM+PHBhdGggaWQ9ImEiIGQ9Ik0wIDBoMjF2MTVIMHoiLz48cGF0aCBpZD0iYiIgZD0iTS0xLTFoMjN2MTdILTF6Ii8+PC9kZWZzPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PHVzZSBmaWxsPSIjMjI0MzhCIiB4bGluazpocmVmPSIjYSIvPjxtYXNrIGlkPSJjIiBmaWxsPSIjZmZmIj48dXNlIHhsaW5rOmhyZWY9IiNiIi8+PC9tYXNrPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zIDFsLTIuMDMuMDNMMSAzbDE2Ljk4IDExLjAzIDIuMDQtLjA0LS4wNC0xLjk3IiBtYXNrPSJ1cmwoI2MpIi8+PHBhdGggZmlsbD0iI0M3MTUyQSIgZD0iTTEgMmwxOCAxMiAxLTFMMiAxIiBtYXNrPSJ1cmwoI2MpIi8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTE4IDFoMnYyUzguMjUgMTAuNCAzLjAyIDE0LjAzYy0uMDcuMDQtMiAwLTIgMGwtLjE2LTEuOUwxOCAxeiIgbWFzaz0idXJsKCNjKSIvPjxwYXRoIGZpbGw9IiNDNzE1MkEiIGQ9Ik0xOS4wNC45N0wyMCAyIDIgMTRsLTEtMSIgbWFzaz0idXJsKCNjKSIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik04IDFoNXY0aDd2NWgtN3Y0SDh2LTRIMVY1aDciIG1hc2s9InVybCgjYykiLz48cGF0aCBmaWxsPSIjQzcxNTJBIiBkPSJNOSAxaDN2NWg4djNoLTh2NUg5VjlIMVY2aDgiIG1hc2s9InVybCgjYykiLz48L2c+PC9zdmc+";
                                                } elseif(strtoupper(config('app.locale')) == 'DE') {
                                                    $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDIxIDE1Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMwMDAiIGQ9Ik0wIDBoMjF2MTVIMHoiLz48cGF0aCBmaWxsPSIjRkYyNTAwIiBkPSJNMCA1aDIxdjVIMHoiLz48cGF0aCBmaWxsPSIjRkZDQzAxIiBkPSJNMCAxMGgyMXY1SDB6Ii8+PC9nPjwvc3ZnPg==";
                                                }
                                            @endphp
                                            <img alt="{{strtoupper(config('app.locale'))}}" class="image" src="{{$src}}">
                                        </div>
                                        {{config('app.locale') == 'en' ? 'English': 'German'}}
                                    </div>
                                </span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="burgerFooterButton select__currency-button-mobile">
                            <div class="parent">
                                <button class="button fill-lightgrey padding-normal block rounded">
                                    <span class="children">{{ strip_tags(currency()->getUserCurrency()) }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="crossWrapper close-mobile-menu">
                        <div class="cross" role="button" tabindex="0">
                            <svg width="18" height="18">
                                <path d="M9 10.414l-7.293 7.293a1 1 0 01-1.414-1.414L7.586 9 .293 1.707A1 1 0 011.707.293L9 7.586 16.293.293a1 1 0 011.414 1.414L10.414 9l7.293 7.293a1 1 0 01-1.414 1.414L9 10.414z" fill="#fff"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="select__language-popup-mobile" style="display: none;">
        <div class="lang-contextMenu top newHeaderWebOn">
            <div role="button" tabindex="-1" class="overlay"></div>
            <div class="transform-container" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(15px, 710px, 0px);">
                <div class="menu" role="button" tabindex="-1">
                    <div>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (strtolower($localeCode) != strtolower(config('app.locale')))
                                <?php
                                // Controller Parameters
                                $attr = [];
                                $attr['countryCode'] = config('country.icode');
                                if (isset($uriPathCatSlug)) {
                                    $attr['catSlug'] = $uriPathCatSlug;
                                    if (isset($uriPathSubCatSlug)) {
                                        $attr['subCatSlug'] = $uriPathSubCatSlug;
                                    }
                                }
                                if (isset($uriPathCityName) && isset($uriPathCityId)) {
                                    $attr['city'] = $uriPathCityName;
                                    $attr['id'] = $uriPathCityId;
                                }
                                if (isset($uriPathUserId)) {
                                    $attr['id'] = $uriPathUserId;
                                    if (isset($uriPathUsername)) {
                                        $attr['username'] = $uriPathUsername;
                                    }
                                }
                                if (isset($uriPathUsername)) {
                                    if (isset($uriPathUserId)) {
                                        $attr['id'] = $uriPathUserId;
                                    }
                                    $attr['username'] = $uriPathUsername;
                                }
                                if (isset($uriPathTag)) {
                                    $attr['tag'] = $uriPathTag;
                                }
                                if (isset($uriPathPageSlug)) {
                                    $attr['slug'] = $uriPathPageSlug;
                                }
                                if (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Post\DetailsController')) {
                                    $postArgs = request()->route()->parameters();
                                    $attr['slug'] = isset($postArgs['slug']) ? $postArgs['slug'] : getSegment(1);
                                    $attr['id'] = isset($postArgs['id']) ? $postArgs['id'] : getSegment(2);
                                }
                                // $attr['debug'] = '1';

                                // Default
                                // $link = LaravelLocalization::getLocalizedURL($localeCode, null, $attr);
                                $link = lurl(null, $attr, $localeCode);
                                $localeCode = strtolower($localeCode);

                                ?>

                                <a href="{{ $link }}" hreflang="{{ $localeCode }}"
                                   class="item clickable">{!! $properties['native'] !!}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="corner" style="left: 50px;"></div>
            </div>
        </div>
    </div>
    <div class="select__currency-popup-mobile" style="display: none;">
        <div class="contextMenu top newHeaderWebOn">
            <div role="button" tabindex="-1" class="overlay"></div>
            <div class="transform-container" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(114px, 710px, 0px);">
                <div class="menu" role="button" tabindex="-1">
                    <div>
                        <div class="content">
                            <div class="list">
                                <div class="inner">
                                    <div class="item">
                                        <span class="currency link" role="button" tabindex="0">
                                            <a href="{{url()->current()}}/?currency=EUR">
                                                EUR
                                            </a>
                                        </span>
                                    </div>
                                    <div class="item">
                                        <span class="currency" role="button" tabindex="0">
                                             <a class="link" href="{{url()->current()}}/?currency=USD">
                                                USD
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="corner" style="left: 85px;"></div>
            </div>
        </div>
    </div>
@endif



</body>
</html>

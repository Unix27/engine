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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="{{ config('settings.app.app_name') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $publicDisk->url('app/default/ico/apple-touch-icon-144-precomposed.png') . getPictureVersion()
	}}">
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
    <script>
        fbq('track', 'Lead');
    </script>

@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @if (strtolower($localeCode) == strtolower(config('lang.abbr', config('app.locales'))))
            <link rel="canonical" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}"/>
        @else
            <link rel="alternate" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}"
                  hreflang="{{ strtolower($localeCode) }}"/>
        @endif
    @endforeach
    @if (count($dnsPrefetch) > 0)
        @foreach($dnsPrefetch as $dns)
            <link rel="dns-prefetch" href="//{{ $dns }}">
        @endforeach
    @endif

    @if (isset($post))
        @if (isVerifiedPost($post))
            @if (config('services.facebook.client_id'))
                <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
            @endif
            {!! $og->renderTags() !!}
            {!! MetaTag::twitterCard() !!}
        @endif
    @else
        @if (config('services.facebook.client_id'))
            <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
        @endif
        {!! $og->renderTags() !!}
        {!! MetaTag::twitterCard() !!}
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

    @include('layouts.inc.tools.style')

    <link href="{{ url('css/app.rtl.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ url('css/main_p.min.css') . getPictureVersion() }}" rel="stylesheet">
{{--    <link href="{{ url('css/iapp.css') . getPictureVersion() }}" rel="stylesheet">--}}
    <link href="{{ url('css/jquery.fancybox.min.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ url('css/custom.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ url('css/need_auth.css') . getPictureVersion() }}" rel="stylesheet">

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
    <script src="{{ url('assets/js/pace.min.js') }}"></script>
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
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTX9B7T"
                  height="0" width="0" style="display:none;visibility:hidden">

    </iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="content">

    <div class="en-us">
        <div class="parent___2r1FF">
            <div class="reducer___LDWrv">
                @include('cookieConsent::index')
                @section('header')
                    @include('layouts.inc.payment-data-header')
                @show
                <div class="content___3QzDJ ">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    @section('footer')
        @include('layouts.inc.footer')
    @show

</div>

@section('modal_location')
@show
@section('modal_abuse')
@show
@section('modal_message')
@show

{{--@includeWhen(!auth()->check(), 'layouts.inc.modal.login')--}}
{{--@include('layouts.inc.modal.change-country')--}}


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
      {{--'select2': {--}}
      {{--  errorLoading: function () {--}}
      {{--    return "{!! t('The results could not be loaded.') !!}"--}}
      {{--  },--}}
      {{--  inputTooLong: function (e) {--}}
      {{--    var t = e.input.length - e.maximum, n = {!! t('Please delete #t character') !!};--}}
      {{--    return t != 1 && (n += 's'), n--}}
      {{--  },--}}
      {{--  inputTooShort: function (e) {--}}
      {{--    var t = e.minimum - e.input.length, n = {!! t('Please enter #t or more characters') !!};--}}
      {{--    return n--}}
      {{--  },--}}
      {{--  loadingMore: function () {--}}
      {{--    return "{!! t('Loading more results…') !!}"--}}
      {{--  },--}}
      {{--  maximumSelected: function (e) {--}}
      {{--    var t = {!! t('You can only select #max item') !!};--}}
      {{--    return e.maximum != 1 && (t += 's'), t--}}
      {{--  },--}}
      {{--  noResults: function () {--}}
      {{--    return "{!! t('No results found') !!}"--}}
      {{--  },--}}
      {{--  searching: function () {--}}
      {{--    return "{!! t('Searching…') !!}"--}}
      {{--  }--}}
      {{--}--}}
    };
</script>

@yield('before_scripts')
<script src="{{ url('js/main.js') }}"></script>
{{--<script src="{{ url('js/app.js') }}"></script>--}}
<script src="{{ url('assets/js/app/make.favorite.js') }}"></script>
<script src="{{ url('js/login.js') }}"></script>
@if (config('settings.optimization.lazy_loading_activation') == 1)
    <script src="{{ url('assets/plugins/lazysizes/lazysizes.min.js') }}" async=""></script>
@endif
@if (file_exists(public_path() . '/assets/plugins/select2/js/i18n/'.config('app.locale').'.js'))
    <script src="{{ url('assets/plugins/select2/js/i18n/'.config('app.locale').'.js') }}"></script>
@endif
@if (config('plugins.detectadsblocker.installed'))
    <script src="{{ url('assets/detectadsblocker/js/script.js') . getPictureVersion() }}"></script>
@endif

<script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>

<script>
  $(document).ready(function () {
      {{-- Select Boxes --}}
      {{--$('.selecter').select2({--}}
      {{--  language: langLayout.select2,--}}
      {{--  dropdownAutoWidth: 'true',--}}
      {{--  minimumResultsForSearch: Infinity,--}}
      {{--  width: '100%'--}}
      {{--});--}}

      {{-- Searchable Select Boxes --}}
      {{--$('.sselecter').select2({--}}
      {{--  language: langLayout.select2,--}}
      {{--  dropdownAutoWidth: 'true',--}}
      {{--  width: '100%'--}}
      {{--});--}}

      {{-- Social Share --}}
      {{--$('.share').ShareLink({--}}
      {{--  title: '{{ addslashes(MetaTag::get('title')) }}',--}}
      {{--  text: '{!! addslashes(MetaTag::get('title')) !!}',--}}
      {{--  url: '{!! $rawFullUrl !!}',--}}
      {{--  width: 640,--}}
      {{--  height: 480--}}
      {{--});--}}

      {{-- Modal Login --}}
      @if (isset($errors) and $errors->any())
      @if ($errors->any() and old('quickLoginForm')=='1')
      $('#quickLogin').modal();
      @endif
      @endif
  });
</script>
@include('auth.inc.auth')

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


<div class="alert-modal" data-modal="add-to-favorites-success">
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

<div class="alert-modal" data-modal="remove-from-favorites-success">
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
@if(Session::has('setReferrer') && \App::environment(['staging', 'production']))
    <script>
        console.table({setReferrer: true});
        ga('set', 'referrer', "{!! env('APP_URL') !!}");
    </script>
@endif
</body>
</html>

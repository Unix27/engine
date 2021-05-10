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

    @yield('before_styles')


    @yield('after_styles')

	@if (isset($plugins) and !empty($plugins))
		@foreach($plugins as $plugin)
			@yield($plugin . '_styles')
		@endforeach
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

    @section('recaptcha_scripts')

    @show
</head>

<body  x-cloak x-data="galaxyChoose()" x-on:scroll.window="scrolledWindow=true" x-init="scrolledWindow=false; introAnimation($refs.phoneAnimate1, $refs.phoneAnimate2, $refs.phoneAnimate3, $refs.phoneAnimate4), checkStock($refs.stockCheck, $refs.stockCheckResult)">
@if (\App::environment(['staging', 'production']))
    @if (config('settings.other.js_code'))
        {!! printJs(config('settings.other.js_code')) . "\n" !!}
    @endif


@endif
@php
    $agent =  new \Jenssegers\Agent\Agent();
@endphp
<div id="content">
    @yield('content')
</div>


@section('modal_abuse')
@show
@section('modal_message')
@show
@section('modal_menu')
@show
@section('modal_menu_header')
@show

<script>
            {{-- Init. Root Vars --}}
  var siteUrl = '<?php echo url((!currentLocaleShouldBeHiddenInUrl() ? config('app.locale') : '').'/'); ?>';
  var languageCode = '<?php echo config('app.locale'); ?>';
  var countryCode = '<?php echo config('country.code', 0); ?>';

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

    <script src="{{ url('js/login.js') . getPictureVersion()  }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
@if(app()->getLocale() == 'de')
    <script src="{{ url('js/messages_de.js') }}"></script>
@endif
{{--    <script src="{{ url('js/custom.js') . getPictureVersion() }}"></script>--}}
{{--    <script src="{{ url('assets/plugins/lazysizes/lazysizes.min.js') }}" async=""></script>--}}
@include('auth.inc.auth')

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




</body>
</html>

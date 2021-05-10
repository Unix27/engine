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
<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PTX9B7T');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2285119575121904');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=2285119575121904&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '504616136916421');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=504616136916421&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->



    <!-- Hotjar Tracking Code for joonlo.com -->
{{--    <script>--}}
{{--        (function(h,o,t,j,a,r){--}}
{{--            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};--}}
{{--            h._hjSettings={hjid:1700365,hjsv:6};--}}
{{--            a=o.getElementsByTagName('head')[0];--}}
{{--            r=o.createElement('script');r.async=1;--}}
{{--            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;--}}
{{--            a.appendChild(r);--}}
{{--        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');--}}
{{--    </script>--}}
    <!-- End Hotjar Tracking Code for joonlo.com -->

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
    @if (config('services.facebook.client_id'))
        <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
    @endif
    {!! !empty($og) ? $og->renderTags() : '' !!}
    {!! MetaTag::twitterCard() !!}

    @if (config('settings.seo.google_site_verification'))
        <meta name="google-site-verification" content="{{ config('settings.seo.google_site_verification') }}"/>
    @endif

    @yield('before_styles')


    @include('layouts.inc.tools.style')


    @yield('after_styles')

	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="xpz">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTX9B7T"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="content">
    @yield('content')
</div>

@section('modal_location')
@show
@section('modal_abuse')
@show
@section('modal_message')
@show

@yield('before_scripts')

@include('auth.inc.auth')

@section('footer_scripts')
@show

@yield('after_scripts')

@if(Session::has('setReferrer') && \App::environment(['staging', 'production']))
    <script>
        console.table({setReferrer: true});
        ga('set', 'referrer', "{!! env('APP_URL') !!}");
    </script>
@endif
</body>
</html>

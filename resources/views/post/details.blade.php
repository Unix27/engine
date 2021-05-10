@extends('layouts.master')
@section('before_styles')
    <link href="{{ url('css/jquery.fancybox.min.css') . getPictureVersion() }}" rel="stylesheet">
    @if (config('lang.direction') == 'rtl')
        <link href="{{ url('assets/plugins/bxslider/jquery.bxslider.rtl.css') }}" rel="stylesheet"/>
    @else
        <link href="{{ url('assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet"/>
    @endif

    <link href="{{ assetVer('post.min.css', '', 'build', 'css/') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection
@section('content')
    {!! csrf_field() !!}
    <input type="hidden" id="postId" name="post_id" value="{{ $post->id }}">
{{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"/>--}}

    <div class="post__content">
        @include('post.inc.breadcrumbs')
        <div>
            <div itemscope="" itemtype="http://schema.org/Product">
                <div class="post__content__reducer post__content__center">
                    <div class="inner">
                        <div class="row">
                            @include('post.inc.details-left')
                            @include('post.inc.details-right')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('before_scripts')
    @parent

    <script>
        /* Carousel Parameters */
        var carouselItems = {{ (isset($featured) and isset($featured->posts)) ? collect($featured->posts)->count() : 0 }};
        var carouselAutoplay = {{ (isset($featuredOptions) && isset($featuredOptions['autoplay'])) ? $featuredOptions['autoplay'] : 'false' }};
        var carouselAutoplayTimeout = {{ (isset($featuredOptions) && isset($featuredOptions['autoplay_timeout'])) ? $featuredOptions['autoplay_timeout'] : 1500 }};
        var carouselLang = {
            'navText': {
                'prev': "{{ t('prev') }}",
                'next': "{{ t('next') }}"
            }
        };

    </script>
    <script src="{{ asset('vendor/admin') }}/sweetalert2/sweetalert2.all.min.js"></script>
@endsection

<style type="text/css">

    .owl-carousel,.owl-carousel .owl-item {
        -webkit-tap-highlight-color: transparent;
        position: relative
    }

    .owl-carousel {
        display: none;
        width: 100%;
        /*z-index: 1*/
    }

    .owl-carousel .owl-stage {
        position: relative;
        -ms-touch-action: pan-Y;
        touch-action: manipulation;
        -moz-backface-visibility: hidden
    }

    .owl-carousel .owl-stage:after {
        content: ".";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0
    }

    .owl-carousel .owl-stage-outer {
        position: relative;
        overflow: hidden;
        -webkit-transform: translate3d(0,0,0)
    }

    .owl-carousel .owl-item,.owl-carousel .owl-wrapper {
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        -ms-transform: translate3d(0,0,0)
    }

    .owl-carousel .owl-item {
        min-height: 1px;
        float: left;
        -webkit-backface-visibility: hidden;
        -webkit-touch-callout: none
    }

    .owl-carousel .owl-item img {
        display: block;
        width: 100%
    }

    .owl-carousel .owl-dots.disabled,.owl-carousel .owl-nav.disabled {
        display: none
    }

    .no-js .owl-carousel,.owl-carousel.owl-loaded {
        display: block
    }

    .owl-carousel .owl-dot,.owl-carousel .owl-nav .owl-next,.owl-carousel .owl-nav .owl-prev {
        cursor: pointer;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .owl-carousel .owl-nav button.owl-next,.owl-carousel .owl-nav button.owl-prev,.owl-carousel button.owl-dot {
        background: 0 0;
        color: inherit;
        border: none;
        padding: 0!important;
        font: inherit
    }

    .owl-carousel.owl-loading {
        opacity: 0;
        display: block
    }

    .owl-carousel.owl-hidden {
        opacity: 0
    }

    .owl-carousel.owl-refresh .owl-item {
        visibility: hidden
    }

    .owl-carousel.owl-drag .owl-item {
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .owl-carousel.owl-grab {
        cursor: move;
        cursor: grab
    }

    .owl-carousel.owl-rtl {
        direction: rtl
    }

    .owl-carousel.owl-rtl .owl-item {
        float: right
    }

    .owl-carousel .animated {
        animation-duration: 1s;
        animation-fill-mode: both
    }

    .owl-carousel .owl-animated-in {
        z-index: 0
    }

    .owl-carousel .owl-animated-out {
        z-index: 1
    }

    .owl-carousel .fadeOut {
        animation-name: fadeOut
    }

    @keyframes fadeOut {
        0% {
            opacity: 1
        }

        100% {
            opacity: 0
        }
    }

    .owl-height {
        transition: height .5s ease-in-out
    }

    .owl-carousel .owl-item .owl-lazy {
        opacity: 0;
        transition: opacity .4s ease
    }

    .owl-carousel .owl-item .owl-lazy:not([src]),.owl-carousel .owl-item .owl-lazy[src^=""] {
        max-height: 0
    }

    .owl-carousel .owl-item img.owl-lazy {
        transform-style: preserve-3d
    }

    .owl-carousel .owl-video-wrapper {
        position: relative;
        height: 100%;
        background: #000
    }

    .owl-carousel .owl-video-play-icon {
        position: absolute;
        height: 80px;
        width: 80px;
        left: 50%;
        top: 50%;
        margin-left: -40px;
        margin-top: -40px;
        background: url(owl.video.play.png) no-repeat;
        cursor: pointer;
        z-index: 1;
        -webkit-backface-visibility: hidden;
        transition: transform .1s ease
    }

    .owl-carousel .owl-video-play-icon:hover {
        -ms-transform: scale(1.3,1.3);
        transform: scale(1.3,1.3)
    }

    .owl-carousel .owl-video-playing .owl-video-play-icon,.owl-carousel .owl-video-playing .owl-video-tn {
        display: none
    }

    .owl-carousel .owl-video-tn {
        opacity: 0;
        height: 100%;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: contain;
        transition: opacity .4s ease
    }

    .owl-carousel .owl-video-frame {
        position: relative;
        z-index: 1;
        height: 100%;
        width: 100%
    }

    .owl-theme .owl-dots,.owl-theme .owl-nav {
        text-align: center;
        -webkit-tap-highlight-color: transparent
    }

    .owl-theme .owl-nav {
        margin-top: 10px
    }

    .owl-theme .owl-nav [class*=owl-] {
        color: #fff;
        font-size: 14px;
        margin: 5px;
        padding: 4px 7px;
        background: #d6d6d6;
        display: inline-block;
        cursor: pointer;
        border-radius: 3px
    }

    .owl-theme .owl-nav [class*=owl-]:hover {
        background: #869791;
        color: #fff;
        text-decoration: none
    }

    .owl-theme .owl-nav .disabled {
        opacity: .5;
        cursor: default
    }

    .owl-theme .owl-nav.disabled+.owl-dots {
        margin-top: 10px
    }

    .owl-theme .owl-dots .owl-dot {
        display: inline-block;
        zoom:1}

    .owl-theme .owl-dots .owl-dot span {
        width: 10px;
        height: 10px;
        margin: 5px 7px;
        background: #d6d6d6;
        display: block;
        -webkit-backface-visibility: visible;
        transition: opacity .2s ease;
        border-radius: 30px
    }

    .owl-theme .owl-dots .owl-dot.active span,.owl-theme .owl-dots .owl-dot:hover span {
        background: #869791
    }
</style>



@section('after_styles')
{{--        <link href="{{ url('css/main_p.min.css') . getPictureVersion() }}" rel="stylesheet" media="all">--}}
        <!-- bxSlider CSS file -->
    <style>
        .collapsed____eyE9 .text___3JGYJ.full_description {
            max-height: 100% !important;
        }

        .collapsed____eyE9 .text___3JGYJ {
            max-height: 3rem !important;
        }


        .detailmodule_image img {
            width: 100% !important;
            height: auto !important;
            margin-top: -5px;
        }


        .product-specs {
            background-color: #fff;
            border-radius: 0 0 5px 5px;
        }

        .product-specs .product-specs-list {
            padding: 20px
        }

        .product-specs .product-prop {
            display: inline-block;
            max-width: 50%
        }

        .product-specs .product-specs-list li {
            position: relative;
            width: 50%;
            float: left;
            line-height: 28px;
            list-style: none;
            margin-left: 0
        }

        .product-specs .property-title {
            color: #999;
            font-size: 14px
        }

        .product-specs .property-desc {
            cursor: pointer;
            display: inline-block;
            max-width: 300px;
            font-size: 14px;
            color: #151515;
            vertical-align: bottom
        }

        .shops-item__price-wrap .product-price-mark {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            background: #fff1f1;
            color: #ff4747;
            -webkit-transform: scale(.9);
            -ms-transform: scale(.9);
            transform: scale(.9);
            font-size: 12px;
            font-weight: 600;
            vertical-align: middle
        }

        .mobile_search_form {
            display: none;
        }
    </style>
@endsection

@section('details_scripts')
    @parent
    <script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
    <!-- bxSlider Javascript file -->
    <script src="{{ url('assets/plugins/bxslider/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

{{--    <script src="{{ url('assets/js/script.js') . getPictureVersion() }}"></script>--}}

    <script>
        var product_count = 1;
        var now_pid = {{ $bestSellerProduct->tid }};

        var custom_fields_count = {{$customFields->count()}};
        var selected_custom_fields = [];

        var user_currency = "{{currency()->getUserCurrency()}}";
        var success_add_to_cart = '@lang('global.success_add_to_cart')';
        var not_checked = '@lang('global.not_selected')';
        document.addEventListener('DOMContentLoaded',function(){
            setAddToCartEvents();
        });

        function setAddToCartEvents(){
            $('.vpAddToCart').off('click');
            $('.vpAddToCart').on('click',function(e){
                var ok = 1;

                if(custom_fields_count > 0){
                    for(var i = 0; i < custom_fields_count; i++){
                        if(!selected_custom_fields.includes(i)){
                            ok = 0;
                            $('.custom_field_' + i + ' .post-attribute-name').addClass('shake___3oxNN');
                            $('.custom_field_' + i + ' .post-attribute-name').html('<span class="error___1q9h7">' + $('.custom_field_' + i + ' .post-attribute-name').data('attr-name') + ': ' + not_checked + '</span>');
                        }
                    }
                }

                if(ok){
                    e.preventDefault();

                    var t = e.currentTarget;
                    var pid = $(t).data('post-id');
                    var attrs = [];

                    attrs.push({'options':{
                            'product_id': now_pid,
                            'fields_set': now_set
                        }});

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: siteUrl + '/cart/add',
                        method: 'POST',
                        data: {product_id:now_pid,quantity:parseInt($('#countOfProduct').text()),'attrs':attrs,currency:user_currency},
                        success: function success(response) {
                            updateCartCount();
                            Swal.fire(
                                success_add_to_cart
                            );
                        },
                        error: function (xhr, status, error) {
                            let err = JSON.parse(xhr.responseText);
                            console.log(err);
                        },
                    });
                }else{
                    if($(document).width() > 600){
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $($(".product-card-attributes")[1]).offset().top
                        }, 400);
                    }else{
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $($(".product-card-attributes")[0]).offset().top
                        }, 400);
                    }
                }
            });

            $('.vpBuyNow').off('click');
            $('.vpBuyNow').on('click',function(e){
                var ok = 1;

                if(custom_fields_count > 0){
                    for(var i = 0; i < custom_fields_count; i++){
                        if(!selected_custom_fields.includes(i)){
                            ok = 0;
                            $('.custom_field_' + i + ' .post-attribute-name').addClass('shake___3oxNN');
                            $('.custom_field_' + i + ' .post-attribute-name').html('<span class="error___1q9h7">' + $('.custom_field_' + i + ' .post-attribute-name').data('attr-name') + ': ' + not_checked + '</span>');
                        }
                    }
                }

                if(ok){
                    e.preventDefault();

                    var t = e.currentTarget;
                    var pid = $(t).data('post-id');
                    var attrs = [];

                    attrs.push({'options':{
                            'product_id': now_pid,
                            'fields_set': now_set
                        }});

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: siteUrl + '/cart/add',
                        method: 'POST',
                        data: {product_id:now_pid,quantity:parseInt($('#countOfProduct').text()),'attrs':attrs,currency:user_currency},
                        success: function success(response) {
                            updateCartCount();
                            location.href = siteUrl+'/checkout';
                        },
                        error: function (xhr, status, error) {
                            let err = JSON.parse(xhr.responseText);
                        },
                    });
                }else{
                    if($(document).width() > 600){
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $($(".product-card-attributes")[1]).offset().top
                        }, 400);
                    }else{
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $($(".product-card-attributes")[0]).offset().top
                        }, 400);
                    }
                }
            });
        }

        function updateCartCount(){
            $.get('/cart/count',{},function onAjaxSuccess(data){
                if(data > 0){
                    $('#cartCount').text(data);
                    $('#cartCount').fadeIn();
                }else{
                    $('#cartCount').text(data);
                    $('#cartCount').fadeOut();
                }

            });
        }

        $('[data-fancybox]').fancybox({
            backFocus: false,
            loop: true
        });

        /* Favorites Translation */

        var lang = {
            labelSavePostSave: "{!! t('Save ad') !!}",
            labelSavePostRemove: "{!! t('Remove favorite') !!}",
            loginToSavePost: "{!! t('Please log in to save the Ads.') !!}",
            loginToSaveSearch: "{!! t('Please log in to save your search.') !!}",
            confirmationSavePost: "{!! t('Post saved in favorites successfully !') !!}",
            confirmationRemoveSavePost: "{!! t('Post deleted from favorites successfully !') !!}",
            confirmationSaveSearch: "{!! t('Search saved successfully !') !!}",
            confirmationRemoveSaveSearch: "{!! t('Search deleted successfully !') !!}"
        };

        $(document).ready(function () {


            $('#bx-pager .thumb___1midQ_').unwrap();

            @if (config('settings.single.show_post_on_googlemap'))
            /* Google Maps */
            getGoogleMaps(
                '{{ config('services.googlemaps.key') }}',
                '{{ (isset($post->city) and !empty($post->city)) ? addslashes($post->city->name) . ',' . config('country.name') : config('country.name') }}',
                '{{ config('app.locale') }}'
            );
            @endif

            /* Keep the current tab active with Twitter Bootstrap after a page reload */
            /* For bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line */
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                /* save the latest tab; use cookies if you like 'em better: */
                localStorage.setItem('lastTab', $(this).attr('href'));
            });
            /* Go to the latest tab, if it exists: */
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
                $('[href="' + lastTab + '"]').tab('show');
            }
        });

        /* bxSlider - Initiates Responsive Carousel */
        function bxSliderSettings() {
            var smSettings = {
                slideWidth: 65,
                minSlides: 1,
                maxSlides: 4,
                slideMargin: 5,
                adaptiveHeight: true,
                pager: false
            };
            var mdSettings = {
                slideWidth: 100,
                minSlides: 1,
                maxSlides: 4,
                slideMargin: 5,
                adaptiveHeight: true,
                pager: false
            };
            var lgSettings = {
                slideWidth: 100,
                minSlides: 3,
                maxSlides: 6,
                pager: false,
                slideMargin: 10,
                adaptiveHeight: true
            };

            if ($(window).width() <= 640) {
                return smSettings;
            } else if ($(window).width() > 640 && $(window).width() < 768) {
                return mdSettings;
            } else {
                return lgSettings;
            }
        }

        $('.description .button___Ljx44').on('click tap', function (e) {
            $('.description .text___3JGYJ').toggleClass('full_description');
            if ($('.description .text___3JGYJ').hasClass('full_description')) {
                $('.description .button___Ljx44').text("{!! t('Hide full description') !!}");
            } else {
                $('.description .button___Ljx44').text("{!! t('Show full description') !!}");
            }
        });
        $('.specifications .button___Ljx44').on('click tap', function (e) {
            $('.specifications .text___3JGYJ').toggleClass('full_description');
            if ($('.specifications .text___3JGYJ').hasClass('full_description')) {
                $('.specifications .button___Ljx44').text("{!! t('Hide full description') !!}");
            } else {
                $('.specifications .button___Ljx44').text("{!! t('Show full description') !!}");
            }
        });

        // $(window).scroll(function () {
        //     if ($(window).scrollTop() + document.body.clientHeight >= $(document).height()) {
        //         $('.controlsPanel__root--MWM3r').hide();
        //     } else {
        //         $('.controlsPanel__root--MWM3r').show();
        //     }
        // });
    </script>
@endsection

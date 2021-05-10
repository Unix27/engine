@extends('layouts.master')

@section('content')
    @include('common.spacer')
    {!! $page->content !!}
@endsection



@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

@endsection
@section('footer_scripts')


    <script>
        document.addEventListener('DOMContentLoaded',function(){
            $('.b-promo__slider .owl-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                navText: ['<i class="icon-left-arrow"></i>', '<i class="icon-right-arrow"></i>'],
                dots: true,
                autoplay: true,
                autoplayTimeout: 7000,
                items: 1,
            });
        });
    </script>
@parent
@endsection

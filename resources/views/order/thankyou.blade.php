@extends('layouts.master')

@section('content')
    @include('common.spacer')
        <link href="{{ url('css/custom.css') . getPictureVersion() }}" rel="stylesheet">
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
    <div class="content___3QzDJ">
        <div class="reducer___1JA85">
            <div class="inner___1BAvS">
                <div class="row___3n5Yt">
                    <div class="successMessage___2HJJT successMessage__container">
                        <div class="background___3x0Ip"></div>
                        <div class="content___2auFF">
                            <div class="title___y9Xk_">
                                @lang('checkout.order.thank')
                            </div>
                            <div class="text___pv4Hk">
                                @lang('checkout.order.description')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('order.similar',['posts' => $similarProducts])
@endsection
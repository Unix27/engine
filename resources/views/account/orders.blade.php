@extends('layouts.master')

@section('content')
    <div class="reducer___1JA85 center___30TB8 account">
        <div class="inner___1BAvS">
            <div class="row___56-KP">
                @include('account.order.sidebar')
                <div class="column___1WRbZ marginBottom___lo7lp md-12___1B8aG lg-9___6qUD3">
                    <div class="orders-loader" style="display: none; text-align: center; background: #f2f2f2;">
                        <img src="{{ url('images/loading_cover.gif') }}" alt="loading...">
                    </div>
                    <div class="tabcontent ">
                        @include('account.order.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('before_styles')
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ assetVer('cabinet.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection
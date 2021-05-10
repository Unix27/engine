@extends('layouts.master')

@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection

@section('content')
    @include('common.spacer')
    <div class="content___3QzDJ">
        <div class="hyperText___20r5F asPage___3EwhR  ">
            <h1 class="h1___m_X_j">{{ $page->title }}</h1>
            <div class="text-content text-left from-wysiwyg">
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection

@section('info')
@endsection

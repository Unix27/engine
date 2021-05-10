
<?php
$fullUrl = rawurldecode(url(request()->getRequestUri()));
$tmpExplode = explode('?', $fullUrl);
$fullUrlNoParams = current($tmpExplode);
?>
@extends('layouts.master')

@section('search')
    @parent
    @include('search.inc.form')
@endsection

@section('content')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
    <div class="posts_category light___white">
        @include('search.inc.breadcrumbs')
        @isset($cat)
            <div class="posts_category__reducer"><div class="inner___1BAvS"><h1 class="header___aX7Fc">{!! $cat->name !!}</h1></div></div>
        @endisset
        <div class="posts_category__reducer center">
            <div class="inner">
                <div class="inner__row">
                    @include('search.inc.categories')
                    @include('search.inc.posts')
                </div>
            </div>
        </div>
    </div>
@endsection
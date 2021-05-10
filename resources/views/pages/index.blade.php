@extends('layouts.master')

@section('search')
	@parent
    @include('pages.inc.page-intro')
@endsection
@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection

@section('content')
	@include('common.spacer')
	<div class="content___3QzDJ">
		<div class="hyperText___20r5F asPage___3EwhR  ">
            <h1 class="h1___m_X_j">{{ $page->title }}</h1>
{{--            <p class="p___3KdXL"><a id="_DV_C4" class="a___faZ7g"></a>Last modified: {{ \Carbon\Carbon::parse('2019-12-20 10:48:35')->toFormattedDateString() }}</p>--}}
            <div class="text-content text-left from-wysiwyg">
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection

@section('info')
@endsection

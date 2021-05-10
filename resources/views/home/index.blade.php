@extends('layouts.master')

{{--@section('modal_promo')--}}
{{--    @if(!\Illuminate\Support\Facades\Auth::user())--}}
{{--        @include('home.inc.promo')--}}
{{--    @endif--}}
{{--@endsection--}}
@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection
@section('content')

    @include('home.inc.promotions')
    @if(!\Illuminate\Support\Facades\Auth::user() && getSubDomainName() == 'quiz')
        @include('home.inc.quiz')
    @endif

	@if (isset($sections) and $sections->count() > 0)
		@foreach($sections as $section)
			@if (view()->exists($section->view))
				@include($section->view, ['firstSection' => $loop->first])
			@endif
		@endforeach
	@endif

@endsection

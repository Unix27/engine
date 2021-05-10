@extends('layouts.master')

@section('content')
    @include('common.spacer')
    <div class="content___3QzDJ" style="padding-top: 50px;">
        <div style="text-align: center;" class="hyperText___20r5F asPage___3EwhR">
            <div class="text-content ">
                <h1 class="h1___m_X_j">{!! t('join_success', ['sitename' => config('app.name'), 'siteurl' => env('APP_URL') . $redirectUrl]) !!}</h1>
                <div class="row" style="text-align: center">
                    <button onclick="document.location='{{$redirectUrl}}'" class="btn btn-primary btn-lg">Join Us</button>
                </div>

            </div>
        </div>
    </div>
@endsection
<style>
    .btn {
        display: inline-block;
        font-weight: normal;
        line-height: 1.5;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: 8px 12px;
        font-size: 0.85rem;
        border-radius: 0.2rem;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }

    .btn-lg {
        padding: 10px 18px;
        font-size: 1rem;
        border-radius: 0.2 0.5rem;
    }
    .btn-primary {
        background-color: #4682B4;
        border-color: #4682B4;
        color: #fff;
    }
    .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
    }
    }
    .btn-primary:not([href]):not([tabindex]):not(.btn-line) {
        color: #fff;
    }
</style>
@section('info')
@endsection

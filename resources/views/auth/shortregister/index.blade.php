@extends('layouts.auth')

@section('content')
    <style>

        header .has-feedback .form-control-feedback {
            top: 3px;
            right: 4px
        }

        header>.navbar-default {
            background: #fff;
            border: none;
            margin-bottom: 0
        }

        header>.navbar-default .navbar-toggle {
            padding: 1.5em;
            margin: .4em;
            background: #D2E5EA;
            border: 1px solid #C2D4DA;
            border-radius: 0;
            transition: all .2s ease-in-out
        }

        header>.navbar-default .navbar-toggle.collapsed {
            background: 0 0;
            border: 1px solid transparent
        }

        header>.navbar-default .navbar-toggle:hover {
            background-color: #8AD9EF;
            border: 1px solid #5EC7E4
        }

        header>.navbar-default .navbar-toggle:focus {
            background-color: #D2E5EA;
            border: 1px solid #C2D4DA
        }

        header>.navbar-default .navbar-brand {
            height: auto;
            padding-top: 1em;
            /*padding-left: 1.1em*/
        }

        header>.navbar-default .navbar-brand>img {
            height: 40px;
            display: inline;
            padding-right: 15px
        }

        @media (min-width: 900px) {
            header {
                height:78px
            }

            header>.navbar-default {
                margin: 0;
                background-color: transparent;
                border: none
            }

            header>.navbar-default>.container {
                padding-right: 15px
            }

            header>.navbar-default .navbar-header .navbar-brand {
                margin-top: 20px;
                padding-top: 0;
                padding-right: 0
            }

            header>.navbar-default .navbar-header .navbar-brand>img {
                padding-right: 15px
            }

            header>.navbar-default #usenet-navbar ul {
                margin-top: 28px
            }

            header>.navbar-default #usenet-navbar ul>li {
                padding: 0 15px;
                border: none
            }

            header>.navbar-default #usenet-navbar ul>li:first-child {
                padding-left: 0
            }

            header>.navbar-default #usenet-navbar ul>li.login {
                padding-right: 0;
                padding-left: 25px
            }

            header>.navbar-default #usenet-navbar ul>li.login>a {
                background: 0 0;
                color: #27a0c4;
                position: relative
            }

            header>.navbar-default #usenet-navbar ul>li.login>a:hover {
                color: #27a0c4;
                background: 0 0
            }

            header>.navbar-default #usenet-navbar ul>li.login>a>span {
                position: absolute;
                top: 1px;
                left: -20px;
                display: block;
                background-position: -2px -1px
            }

            header>.navbar-default #usenet-navbar ul>li>a {
                font-style: normal!important;
                font-weight: 500!important;
                color: #2a2930;
                padding: 0 0 10px;
                background: 0 0;
                transition: none
            }

        }

        header .nav-registration {
            width: 100%
        }

        header .nav-registration>div {
            margin: 14px 0 0
        }

        header .nav-registration>div>a {
            background: 0 0;
            color: #27a0c4;
            position: relative;
            font-style: normal!important;
            font-weight: 500!important
        }

        header .nav-registration>div>a:hover {
            color: #27a0c4;
            background: 0 0
        }

        header .nav-registration>div>a>span {
            width: 17px;
            height: 19px;
            position: absolute;
            top: -1px;
            left: -20px;
            display: block;
            background: url(/UNF/RESOURCE/shop/skin/v3/img/sprite.png) -2px -1px no-repeat
        }

        .headline {
            background: #f2f2f2;
            border-bottom: 1px solid #f2f2f2;
        }
        .container,.container-fluid {
            margin-right: auto;
            margin-left: auto
        }

        .container,.container-fluid {
            padding-left: 15px;
            padding-right: 15px
        }

        .pre-scrollable {
            overflow-y: scroll
        }

        @media (min-width: 992px) {
            .container {
                width:970px
            }
            .auth__login .inner {
                margin-top: 35px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width:1170px
            }
        }

        .headline h1 {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .text-center {
            text-align: center;
        }
    </style>
    <header>
        <nav class="navbar navbar-default">
            <div class="container" style="padding-bottom: 15px;text-align: center;">
                <div class="navbar-header nav-registration">
                    <a class="navbar-brand" href=""><img src="{{ imgUrl(config('settings.app.logo'), 'logo') }}" alt="{{ config('app.name') }}"></a>

                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </nav>
    </header>
    <div class="auth__login" >
        <div class="reducer center">
            <div class="row">
                <div class="headline">
                    <div class="container">
                        <h1 class="text-center">{{trans('auth.register')}}</h1>
                    </div>
                </div>
            </div>
            <div class="inner">
                <div class="row">
                    <div class="column marginBottom md-6">
                        <div class="column">
                            <div class="inner">
                                <div class="element">
                                    <div class="">
                                        <div class="leftCol light">
                                            <div class="item">
                                                <section class="auth-main"
                                                         id="authorization_inner_auth_main"
                                                         data-tabs-wrap>
                                                    <form class="auth-main__tab-block  _open" method="POST" action="{{ lurl('/fast-register') }}"
                                                          data-tab-block="2" id="authorization_inner_auth_main-registration">
                                                        <input type="hidden" name="locale" value="{{ config('app.locale') }}">
                                                        <input id="countryCode" name="country_code" type="hidden" value="{{ config('country.code') }}" required>
                                                        <input name="term" type="hidden" value="1">
                                                        <div class="auth-main__field {{ $errors->has('email') ? 'error___2Xi2C' : ''}}">
                                                            <label class="label">
                                                                <input autocomplete="email" class="input___36o72" name="email"
                                                                       {{ !empty(old('email')) ? ' value="' . old('email') . '"' : '' }} placeholder=" " type="email"
                                                                       maxlength="100" required>
                                                                <div
                                                                    class="caption___2klrn">{{ $errors->has('email') ? $errors->first('email') : trans('auth.email') }}</div>
                                                            </label>
                                                        </div>
                                                        @include('layouts.inc.tools.recaptcha', ['colLeft' => 'auth-main__recaptcha', 'colRight' => 'auth-main__recaptcha'])
                                                        <button type="submit" class="auth-main__btn  btn-main submit___adX-b">{{ trans('auth.register') }}</button>
                                                        <div class="auth-main__or">
                                                            <span>{{ t('or') }}</span>
                                                        </div>
                                                        <div class="main__soc-list">
                                                            <button type="button" class="auth-main__soc  btn-main" onclick="window.location.href = '{{ lurl('/auth/facebook') }}';">
                                                                <svg viewBox="0 0 768 764" style="width: 24px; height: 24px;">
                                                                    <path
                                                                        d="M384 0a384 384 0 00-60 763.3V495h-97.5V384H324v-84.6c0-96.2 57.3-149.4 145-149.4 42 0 86 7.5 86 7.5V252h-48.4c-47.7 0-62.6 29.6-62.6 60v72h106.5l-17 111H444v268.3A384 384 0 00384 0z"
                                                                        fill="#fff" fill-rule="evenodd"></path>
                                                                </svg>
                                                                <span>Facebook</span>
                                                            </button>
                                                            <button type="button" class="auth-main__soc  _google  btn-main" onclick="window.location.href = '{{ lurl('/auth/google') }}';">
                                                                <svg viewBox="0 0 46 46" style="width: 48px; height: 48px;">
                                                                    <defs>
                                                                        <filter x="-50%" y="-50%" filterUnits="objectBoundingBox" id="GoogleIcon-a">
                                                                            <feOffset dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                                                                            <feGaussianBlur stdDeviation=".5" in="shadowOffsetOuter1"
                                                                                            result="shadowBlurOuter1"></feGaussianBlur>
                                                                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.168 0" in="shadowBlurOuter1"
                                                                                           result="shadowMatrixOuter1"></feColorMatrix>
                                                                            <feOffset in="SourceAlpha" result="shadowOffsetOuter2"></feOffset>
                                                                            <feGaussianBlur stdDeviation=".5" in="shadowOffsetOuter2"
                                                                                            result="shadowBlurOuter2"></feGaussianBlur>
                                                                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.084 0" in="shadowBlurOuter2"
                                                                                           result="shadowMatrixOuter2"></feColorMatrix>
                                                                            <feMerge>
                                                                                <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                                                                                <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
                                                                                <feMergeNode in="SourceGraphic"></feMergeNode>
                                                                            </feMerge>
                                                                        </filter>
                                                                        <rect id="b" rx="2"></rect>
                                                                    </defs>
                                                                    <g fill="none" fill-rule="evenodd">
                                                                        <g transform="translate(3 3)" filter="url(#GoogleIcon-a)">
                                                                            <use fill="#FFF"></use>
                                                                            <use></use>
                                                                            <use></use>
                                                                            <use></use>
                                                                        </g>
                                                                        <path
                                                                            d="M31.64 23.205c0-.639-.057-1.252-.164-1.841H23v3.481h4.844a4.14 4.14 0 0 1-1.796 2.716v2.259h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"
                                                                            fill="#4285F4"></path>
                                                                        <path
                                                                            d="M23 32c2.43 0 4.467-.806 5.956-2.18l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711h-3.007v2.332A8.997 8.997 0 0 0 23 32z"
                                                                            fill="#34A853"></path>
                                                                        <path
                                                                            d="M17.964 24.71a5.41 5.41 0 0 1-.282-1.71c0-.593.102-1.17.282-1.71v-2.332h-3.007A8.996 8.996 0 0 0 14 23c0 1.452.348 2.827.957 4.042l3.007-2.332z"
                                                                            fill="#FBBC05"></path>
                                                                        <path
                                                                            d="M23 17.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C27.463 14.891 25.426 14 23 14a8.997 8.997 0 0 0-8.043 4.958l3.007 2.332c.708-2.127 2.692-3.71 5.036-3.71z"
                                                                            fill="#EA4335"></path>
                                                                        <path d="M14 14h18v18H14V14z"></path>
                                                                    </g>
                                                                </svg>
                                                                <span>Google</span>
                                                            </button>
                                                        </div>
                                                        <div class="checkbox  auth-main__note" style="margin-bottom: 15px">
                                                            <label>
                                                                <input type="checkbox" id="bDoAcceptTerms" name="send_newsletter" value="1" checked="true">
                                                                {!! t('I want to learn about other offers via the newsletter. I can cancel it at any time.') !!}
                                                                {!! trans('auth.click_fb_google', ['sitename' => config('app.name'), 'action' => t('Register'), 'terms' => lurl('/terms'), 'privacy' => lurl('/privacy'), 'cancellation-right' => lurl('/page/cancellation-right')]) !!}
                                                            </label>
                                                        </div>
                                                    </form>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column marginBottom md-6">
                        <div class="column">
                            <div class="inner">
                                <div class="element">
                                    <div class="">
                                        <div class="text-on-img campaign-banner-container">
                                            <img src="{{ url('/images/site/register-' . config('app.locale') .'.png') }}" alt="" class="img-responsive" style="width: 600px">
                                        </div>
                                        <div style="z-index:100; position:relative;">
                                            <h3 class="after-img">{{ t('Warranty') }}</h3>

                                            <ul class="check-list">
                                                <li>{{ t('If you want to refund your money, please contact directly to your seller') }}</li>
                                                <li>{{t("Product doesn't match the description? Contact us within 30 days after you receive it!")}}</li>
                                                <li>{{ t("Access to all articles") }}</li>
                                                <li>{{ t("Onetime offer") }}</li>
                                                <li>{{ t("Test for 14 days free of charge and cancel at any time * Afterwards membership for € 99.96 per year (corresponds to € 8.33 per month)") }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="column marginBottom md-12 center">
                        <div style="margin-top: 1em;margin-left: auto;text-align: center">
                            <img src="{{ url('images/SepaLogoEN.jpg') . getPictureVersion() }}" height="22">
                            <img height="25px" src="{{ url('images/icon_bank_paypal.png') . getPictureVersion() }}">
                        </div>
                        <p class="auth-main__note" style="font-size: 10px;text-align: center">{!! t('You can use Joonlo for free during the trial period.  If you do not cancel during this time, your membership in the Joonlo tariff will automatically be extended at € 8.33 / month (12 months term - total € 99.96).', ['sitename' => config('app.name')]) !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

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
            <div class="inner">
                <div class="row simpleregister_layout">
                    @include('auth.shortregister.steps.step_'.$step)
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

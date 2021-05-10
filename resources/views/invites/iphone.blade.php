@extends('layouts.invite')

@section('before_styles')

@endsection

@section('content')
    <!DOCTYPE html>
<!-- saved from url=(0125)https://junebox.me/iphone11/en/gbp/?clickid=3558509133a10d7bf1491600786647&pubid=4997&password={password}&username={username} -->
<html class=" js flexbox canvas canvastext webgl touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface no-generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths" lang="fr" style=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>iPhone 11 Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/invites/iphone/css/bootstrap.min.css">
    <link rel="stylesheet" href="/invites/iphone/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="/invites/iphone/css/animate.css">
    <link rel="stylesheet" href="/invites/iphone/css/jquery.qtip.min.css">
    <link rel="stylesheet" href="/invites/iphone/css/default.css">
    <link rel="stylesheet" href="/invites/iphone/css/custom.css">
    <link rel="stylesheet" href="/invites/iphone/css/responsive.css">
    <script src="/invites/iphone/js/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="/invites/iphone/js/jquery.min.js"></script>
    <script type="text/javascript" src="/invites/iphone/js/jquery.qtip.min.js"></script>

    <script type="text/javascript">
        setInterval('countdown()', 1000);
        function countdown() {
            var mins = parseInt(document.getElementById("mins").innerHTML);
            var secs = parseInt(document.getElementById("hsecs").innerHTML);
            if (mins != 0 && secs == 0) {
                nmins = mins - 1;
                nsecs = 59;
            } else if (mins != 0 || secs != 0) {
                nmins = mins;
                nsecs = secs - 1;
            } else if (mins == 0 && secs == 0) {
                nmins = mins;
                nsecs = secs;
            }
            document.getElementById("mins").innerHTML = nmins;
            document.getElementById("hsecs").innerHTML = nsecs;
            if (nsecs < 10) nsecs = "0" + nsecs;
            document.getElementById("secs").innerHTML = nsecs;
        }
    </script>
    <style>
        r {
            font-weight: bold;
        }
    </style>
</head>
<body tcap-name="mainman">
<div class="wrapper">
    <div class="container-fluid campaign-area">
        <div class="row">
            <div class="col-xl-8 col-xl-offset-2 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-sm-6" id="section-product">
                    <div class="phone">
                        <div class="wow fadeInLeft tag animated" id="section-price" style="visibility: visible;">
                            <span><br>Pay Only </span>
                            <br>
                            <span class="price">1<sup class="curr" style="font-size: 52%;">£</sup></span>

                        </div>
                        <img src="/invites/iphone/img/phone.png" class="wow fadeInLeft img animated" data-wow-duration="1s" data-wow-delay="1.5s" alt="Phone" style="visibility: visible; animation-duration: 1s; animation-delay: 1.5s; animation-name: fadeInLeft;">
                    </div>
                </div>
                <div class="col-sm-6" id="section-form">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl-70">
                        <div class="wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInUp;">
                            <img src="/invites/iphone/img/title.png" class="img title-1" alt="Title">

                        </div>
                        <div class="col-md-12 form-wrap">
                            <div class="wow fadeInUp text-center animated" data-wow-duration="1s" data-wow-delay="1.7s" style="visibility: visible; animation-duration: 1s; animation-delay: 1.7s; animation-name: fadeInUp;">
                                <center>
                                    <p class="counter" style="color:#333;font-weight:bold;">Remaining Time <span style="color:#0071e3;font-weight:bold;"><span id="mins">17</span> minutes and <span id="hsecs">49</span> seconds </span><br>
                                        Don't miss this offer.</p>
                                </center>

                            </div>
                            <div class="wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="1.7s" style="visibility: visible; animation-duration: 1s; animation-delay: 1.7s; animation-name: fadeInUp;">
                                <p class="title-3">Complete information below</p>
                                <form id="sform" method="post" action="{{ lurl(trans('routes.register')) }}" class="frmReg" accept-charset="utf-8">
                                    <input type="hidden" name="invite" value="iphone">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" class="half text-uppercase" placeholder="E-mail" id="username" name="email" data-tooltip-at="top center" data-tooltip-my="bottom center" required="required">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <input type="password" placeholder="Create password" id="password" name="password" data-tooltip-at="top center" data-tooltip-my="bottom center" required="required">
                                            <input type="hidden" name="data[User][password2]" maxlength="30" class="form-control" id="UserPassword2">
                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="button btn-txt" data-alt-text="Acceder au paiement" id="infos_btn">
                                            Continue
                                        </button>
                                    </div>

                                </form>


                            </div>
                            <!-- END SIGNUP FORM AREA -->
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<!-- END CAMPAIGN AREA -->

<!-- START PAGE CONTENT BELOW -->
<section id="page-content" class="page-wrapper">

    <!-- FEATURE TAB SECTION START -->
    <div class="section-bg-tb pt-80 pb-55 product-tab-section mb-50 wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInUp;">
        <div class="container">



            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center mb-0">
                        <h2 id="btn1">Description</h2>

                    </div>
                </div>
            </div>


            <div class="product-tab product-tab-2">

                <div class="spec-wrapper">
                    <div class="inner-wrap" align="center">
                        <h2 class="title-2">And then there was Pro</h2>
                        <p class="spec-text2">A transformative triple‑camera system that adds tonnes of capability without complexity. An unprecedented leap in battery life. And a mind‑blowing chip that doubles down on machine learning and pushes the boundaries of what a smartphone can do. Welcome to the first iPhone powerful enough to be called Pro.</p>
                    </div>
                </div>




            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center mb-0">
                        <h2 id="btn1">Specifications</h2>
                        <h2 class="title-2">iPhone 11 Pro</h2>
                    </div>
                </div>
            </div>


            <div class="product-tab">
                <ul>
                    <li>
                        <div class="spec-wrapper">
                            <div class="inner-wrap">
                                <div class="icon"><span class="icon-size"><img src="/invites/iphone/img/size.png" alt="Dimension"></span>
                                </div>
                                <h3 class="spec-head">Dimensions</h3>
                                <p class="spec-text">14,4 x 7,14 x 0,81 cm (188 g)</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="spec-wrapper">
                            <div class="inner-wrap">
                                <div class="icon"><span class="icon-size"><img src="/invites/iphone/img/camera.png" alt="Camera"></span>
                                </div>
                                <h3 class="spec-head">Camera</h3>
                                <p class="spec-text">
                                    Ultra Wide: ƒ/2.4 aperture and 120-degree field of view<br>
                                    Wide: ƒ/1.8 aperture<br>
                                    Telephoto: ƒ/2.0 aperture</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="spec-wrapper">
                            <div class="inner-wrap">
                                <div class="icon"><span class="icon-size"><img src="/invites/iphone/img/screen.png" alt="Display"></span>
                                </div>
                                <h3 class="spec-head">Display</h3>
                                <p class="spec-text">5.8‑inch (diagonal) all‑screen OLED Multi-Touch</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="spec-wrapper">
                            <div class="inner-wrap">
                                <div class="icon"><span class="icon-size"><img src="/invites/iphone/img/processor.png" alt="AP"></span></div>
                                <h3 class="spec-head">Chip</h3>
                                <p class="spec-text">Chip A13 Bionic <br>Third-generation Neural Engine</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>



        </div>
    </div>
    <!-- FEATURE TAB SECTION END -->

    <!-- TERMS SECTION START -->
    <div style="background: #000" class="ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center mb-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.5s; animation-name: none;">
                        <div class="terms-info">
                            <h6>Among all participants we will select a winner who will win a new iPhone 11 Pro. The winner will be contacted directly by email.</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row address">
                <div class="col-md-12 text-center">
                    <p>
                        <span id="hostName">junebox</span>
                        -
                        <span id="campanyName">Thakshila&nbsp;&nbsp;Goonewardena LTD</span>
                        <span id="campanyAddress">400 Deans Road, 10, Colombo, Sri Lanka<br> Contact: info@junebox.me</span>
                    </p>
                    <br><br>
                </div>
            </div>
            <div class="row faq">
                <div class="col-md-6">
                    <h5>Why do we need your billing information?</h5>
                    <p>When you join our service you will receive 5 day trial access to junebox.me. If you continue as a subscriber after the 5 day trial period, then we will draw the agreed amount from your credit card. When money has been drawn from your credit card or other payment method, then you will maintain the access to our service, which is reserved only for our paying members on junebox.me.</p>

                    <h5>Is there an age limitation?</h5>
                    <p>At junebox.me, all members must be 18 or older to sign up. This means that people who are under 18 years can’t have access to our promotions. Anyone under 18 may not subscribe and pay with credit card for our services.</p>
                </div>
                <div class="col-md-6">
                    <h5>Never any Hidden Fees?</h5>
                    <p>We make sure to provide our members with a detailed transaction history so that they know what they are paying for. Credit card information is required to facilitate future purchases only. No charges will appear on your credit card statement, unless you upgrade to Premium Membership or you make a purchase.By creating an account, you agree to our <a href="https://junebox.me/terms.html">Terms &amp; Conditions</a></p>

                    <h5>Support contact</h5>
                    <p>Please contact us via <a href="mailto:info@junebox.me">email</a>, 24 hrs, 7 days a week.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- TERMS SECTION END -->

</section>
<!-- END PAGE CONTENT BELOW -->

<script>
    var url_server = 'http://junebox.me/';
    var site_slug = 'galaxy-S10';
</script>

<script>
    $('#sform').submit(function (e) {
        if ($('#password').val().length < 6) {
            alert('Password must contain at least 6 characters!');
            e.preventDefault();
            return false;
        }
    });
</script>

<script src="/invites/iphone/js/bootstrap.min.js"></script>
<script src="/invites/iphone/js/plugins.js"></script>
<script src="/invites/iphone/js/main.js"></script><a id="scrollUp" href="https://junebox.me/iphone11/en/gbp/?clickid=3558509133a10d7bf1491600786647&amp;pubid=4997&amp;password={password}&amp;username={username}#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="zmdi zmdi-chevron-up"></i></a>
<a id="scrollUp" href="https://junebox.me/iphone11/en/gbp/?clickid=3558509133a10d7bf1491600786647&amp;pubid=4997&amp;password={password}&amp;username={username}#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="zmdi zmdi-chevron-up"></i></a><a id="scrollUp" href="https://junebox.me/iphone11/en/gbp/?clickid=3558509133a10d7bf1491600786647&amp;pubid=4997&amp;password={password}&amp;username={username}#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="zmdi zmdi-chevron-up"></i></a>

<script src="/invites/iphone/js/validate.js"></script>
<script src="/invites/iphone/js/validate_error_messages.js"></script>


</body></html>
@endsection

@section('footer_scripts')

@endsection


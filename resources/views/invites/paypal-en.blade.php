@extends('layouts.invite')

@section('before_styles')

@endsection

@section('content')
    <!DOCTYPE html>
<html class=" js ">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>Win 1000 Cash</title>
    <script src="/invites/paypal-en/scripts/jquery.js?v=FVs3ACwOLIVInrAl5sdzR2jrCDmVOWFbZMY6g6Q0ulE1"></script>
    <script src="/invites/paypal-en/scripts/global.js?v=bEHghmQLLZgB5lqBhvX5QozC1RW5ccV0Ffm6NVYnuUg1"></script>
    <script>
        document.title = 'Win 1000 Cash'; </script>
    <link href="https://fonts.googleapis.com/css.css?family=Lato|Open+Sans|Oswald|Quicksand" rel="stylesheet">
    <link href="/invites/paypal-en/styles/fontawesome.css?v=3iEv8vqPidB6TVfgNOGrLoJr-SPH_mV3YwpggEk2_ao1" rel="stylesheet">
    <link href="/invites/paypal-en/styles/amazon-10.css?v=DkznLB7vAuGVQ1K1GG5AeqYSJrxAYl3n-RRtRszqxSU1" rel="stylesheet">
    <link href="/invites/paypal-en/styles/bootstrap.css?v=a2WgiorrS1AI2xTkqFt-uaHUlxL8D1BqLO6kuQOaW7A1" rel="stylesheet">
    <!--[if IE 8]>
    <link href="/invites/paypal-en/styles/standard-ie8" rel="stylesheet"/> <![endif]-->
    <style>
        .addressLookupFields .performPostcodeLookup {
            color: #fff;
            background: #22d653;
            border-color: #138e34;
        }

        .registrationForm .register-submit-form {
            color: #fff;
            background: #22d653;
            border: 1px solid #138e34;
            box-shadow: none;
        }

        .registrationForm #divStage1 .terms-row {
            text-align: left;
        }
    </style>
    <script>
        window.enableReengagement = true;
        if ("registration" == "registration") {
            window.enableReengagement = "true";
        }
        window.mpPageSettings = {
            websiteName: "OfferX UK",
            page: "registration",
            prizeType: "feature",
            disabled: (!window.enableReengagement).toString(),
            pathId: "-1",
            prizeUrl: "win-1000-paypal-cash",
            pageNumber: "-1",
            affiliateId: "ho_GDMCD"
        }; </script>
    <script>
        $(function () {
            $(".optional-checkboxes").find("input[type='checkbox']").addClass("optional");
            var cookies = document.cookie.replace(/\s/g, '').split(';');
            var cookiesEnabled = false;
            for (var i = 0; i < cookies.length; i++) {
                if (cookies[i].split('=')[0] == 'cookietest') {
                    cookiesEnabled = true;
                    break;
                }
            }
            $(".terms-explained").click(function () {
                $("#terms-tick").trigger('click');
            });
            $(".voucher-choice").click(function (e) {
                updateState();
            });
        });

        function updateState() {
            var optionValue = "";
            $(".voucher-choice").each(function () {
                if ($(this).is(":checked")) {
                    optionValue += $(this).val() + ",";
                }
            });
            if (optionValue.length > 0) {
                optionValue = optionValue.substring(0, optionValue.length - 1);
            }
            $(".myvc-selection").val(optionValue);
            $(".myvc-userresponse").val(optionValue.length > 0);
        }

        function GoToRegForm() {
            $('html, body').animate({
                scrollTop: $("#registrationHeader").offset().top
            }, 1000);
        };
        // Update the count down every 1 second
        var minutes = 2;
        var seconds = 59;
        $(function () {
            $("#timer").html(minutes + "m " + seconds + "s ");
            setInterval(function () {
                if (seconds <= 0) {
                    minutes--;
                    seconds = 59;
                }
                seconds--;
                // Display the result in the element with id="demo"
                $("#timer").html(minutes + "m " + seconds + "s ");
                // If the count down is finished, write some text
                if (minutes <= 0 && seconds <= 0) {
                    minutes = 3;
                    seconds = 0;
                }
            }, 1000);
        });
        $(function () {
            var randomNumber = Math.floor(Math.random() * (20 - 13 + 1)) + 10;
            $(".visitors").html(randomNumber);
        }); </script>
    <script>
        window.onload = function (e) {
            var fbd = $("#FullBirthDate");
            var fbdVal = fbd.val();
            if (fbdVal !== '0001/01/01' && fbd.valid() && $("#coregs").length > 0) {
                $("#coregs").show();
            }
        }
    </script>




    <style type="text/css">iframe#_hjRemoteVarsFrame {
            display: none !important;
            width: 1px !important;
            height: 1px !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }</style>
</head>
<body class="gb" ondragstart="return false" style="">

<header id="header" class="container-fluid clearfix" ondragstart="return false">
    <div class="mainLogo"> <a href="/" tabindex="-1">
            <img src="{{ imgUrl(config('settings.app.logo'), 'logo') }}" class="offerx" alt="offerxlogo"> </a>
    </div>
</header>
<form action="{{ lurl(trans('routes.register')) }}" id="frm-registration" method="post" novalidate="novalidate"
      style="height: auto !important;">
    @csrf
    <input type="hidden" name="invite" value="amazon">
    <input type="hidden" name="password" value="{{\Illuminate\Support\Str::random(10)}}">

    <input type="hidden" id="Stage1Fields"
                                              value="Title|FirstName|LastName|EmailAddress|BirthDay|BirthMonth|BirthYear|FullBirthDate">
    <input id="FieldErrors" name="FieldErrors" type="hidden" value=""><input id="fldPostCode" name="fldPostCode"
                                                                             type="hidden" value=""><input
        id="AnuraFraudResult" name="AnuraFraudResult" type="hidden"
        value="{&quot;result&quot;:&quot;warn&quot;,&quot;mobile&quot;:0,&quot;adblocker&quot;:0}"><input
        data-val="true" data-val-number="The field SelectedPrizeDrawID must be a number."
        data-val-required="The SelectedPrizeDrawID field is required." id="SelectedPrizeDrawID"
        name="SelectedPrizeDrawID" type="hidden" value="6590"><input data-val="true"
                                                                     data-val-number="The field SelectedPrizeDrawPrizeID must be a number."
                                                                     data-val-required="The SelectedPrizeDrawPrizeID field is required."
                                                                     id="SelectedPrizeDrawPrizeID"
                                                                     name="SelectedPrizeDrawPrizeID" type="hidden"
                                                                     value="1876"><input data-val="true"
                                                                                         data-val-required="The ThirdPartyOptOut field is required."
                                                                                         id="ThirdPartyOptOut"
                                                                                         name="ThirdPartyOptOut"
                                                                                         type="hidden"
                                                                                         value="False"><input
        data-val="true" data-val-required="The PartnerOptOut field is required." id="PartnerOptOut" name="PartnerOptOut"
        type="hidden" value="False"><input id="AjaxRequestAuth" name="AjaxRequestAuth" type="hidden"
                                           value="6B031D7FBA63CEFEA14E69E552B57079"> <input type="hidden" value="GB"
                                                                                            id="CountryCode">
    <div class="a-1876" style="height: auto !important;">
        <div id="mainContainer" class="container-fluid clearfix mainContainer"
             style="background-image: url(&quot;https://cdn.marketingpunch.co.uk/lptests/gb/1876.jpg&quot;); height: auto !important;"
             ondragstart="return false">
            <div class="downarrow"></div>
            <div class="clearfix mainImage main-content col-xs-12 col-md-6">
                <img onclick="GoToRegForm()" src="https://cdn.marketingpunch.co.uk/lptests/gb/1876.png"
                     alt="Win £1000 Cash">
            </div>
            <div id="mainForm" class="clearfix col-xs-12 col-md-6 UKVersion">
                <div class="registrationForm clearfix">
                    <div class="row registration-header" id="registrationHeader">
                        <div class="header" tabindex="0">
                            <span>Sign up by Storefy for your chance to Win £1000 Cash</span>
                        </div>
                        <div class="downarrow">
                        </div>
                        <div class="col-xs-12 clearfix vcount">
                            <p>CURRENTLY: <span class="visitors">16</span> visitors on this page</p>
                        </div>
                    </div>
                    <div id="divStage1" class="clearfix">
                        <div class="row titleRow clearfix toprow">
                            <div class="col-xs-12">
                                <select class="oxdata-title form-control" id="Title" name="title">
                                    <option value="">Title</option>
                                    <option>Mr</option>
                                    <option>Miss</option>
                                    <option>Mrs</option>
                                    <option>Ms</option>
                                </select>
                                <span aria-label="Please enter your title" class="field-validation-valid alwaysShow"
                                      data-valmsg-for="Title" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="row titleRow clearfix">
                            <div class="col-xs-12 col-md-6">
                                <input aria-label="Please enter your firstname" class="oxdata-firstname form-control"
                                       data-val="true"
                                       data-val-maxlength="The field First Name must be a string or array type with a maximum length of '25'."
                                       data-val-maxlength-max="25"
                                       data-val-minlength="The field First Name must be a string or array type with a minimum length of '2'."
                                       data-val-minlength-min="2" data-val-required="First name is required"
                                       id="FirstName" name="FirstName" placeholder="First name" type="text" value="">
                                <span class="field-validation-valid" data-valmsg-for="FirstName"
                                      data-valmsg-replace="true"></span>
                            </div>
                            <div class="mobile-padding">
                                <div class="col-xs-12 col-md-6">
                                    <input aria-label="Please enter your surname" class="oxdata-lastname form-control"
                                           data-val="true"
                                           data-val-maxlength="The field Last name must be a string or array type with a maximum length of '25'."
                                           data-val-maxlength-max="25"
                                           data-val-minlength="The field Last name must be a string or array type with a minimum length of '2'."
                                           data-val-minlength-min="2" data-val-required="Last name is required"
                                           id="LastName" name="LastName" placeholder="Last name" type="text" value="">
                                    <span class="field-validation-valid" data-valmsg-for="LastName"
                                          data-valmsg-replace="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <input aria-label="Please enter your email"
                                       class="oxdata-emailaddress form-control text-box single-line" data-val="true"
                                       data-val-maxlength="The field Email must be a string or array type with a maximum length of '255'."
                                       data-val-maxlength-max="255" data-val-regex="Invalid email address"
                                       data-val-regex-pattern="^[a-zA-Z0-9._%+-]+@([a-zA-Z0-9.-]+\.[a-zA-Z]{2,20})$"
                                       data-val-required="Email is required" id="EmailAddress" name="email"
                                       placeholder="Email" type="email" value="">
                                <input id="EmailAddressValid" name="EmailAddressValid" type="hidden" value="">
                                <span class="field-validation-valid" data-valmsg-for="EmailAddress"
                                      data-valmsg-replace="true"></span>
                            </div>
                        </div>

                        <div class="row terms-row clearfix" id="coregs" style="text-align: left;">
                            <input type="hidden" name="AnswerIds" id="AnswerIds"
                                   value="366200ab-5504-4976-b9c1-c535c9e75aed">

                            <input id="fld366200ab-5504-4976-b9c1-c535c9e75aed" name="QuestionBlocks[0].Result"
                                   type="hidden" value=""><input data-val="true"
                                                                 data-val-number="The field QuestionBlockID must be a number."
                                                                 data-val-required="The QuestionBlockID field is required."
                                                                 id="QuestionBlocks_0__QuestionBlockID"
                                                                 name="QuestionBlocks[0].QuestionBlockID" type="hidden"
                                                                 value="3516"><input data-val="true"
                                                                                     data-val-number="The field QuestionBlockVersionID must be a number."
                                                                                     data-val-required="The QuestionBlockVersionID field is required."
                                                                                     id="QuestionBlocks_0__QuestionBlockVersionID"
                                                                                     name="QuestionBlocks[0].QuestionBlockVersionID"
                                                                                     type="hidden" value="9952"><input
                                id="QuestionBlocks_0__Identifier" name="QuestionBlocks[0].Identifier" type="hidden"
                                value="366200ab-5504-4976-b9c1-c535c9e75aed">
                            <script>
                                var campaignIds = ["366200ab-5504-4976-b9c1-c535c9e75aed"];
                                var campaignNames = [];
                                var user = {
                                    telephoneNumbers: [],
                                    firstName: "",
                                    lastName: "",
                                    city: "",
                                    title: "",
                                    email: "",
                                    countryCode: "GB"
                                };
                                var hideContinueButton = false; </script>
                        </div>
                        <input data-val="true" data-val-ischeckedvalidator="Must agree to terms and conditions"
                               data-val-required="The TermsAccepted field is required." id="Preferences_TermsAccepted"
                               name="Preferences.TermsAccepted" type="hidden" value="True">
                        <div class="row clearfix labelRow button-terms terms-row" tabindex="0">
                            <div class="col-md-12">
                                By ticking the boxes, you:
                            </div>
                        </div>
                        <div class="row terms-row clearfix" tabindex="0">
                            <div class="col-xs-2 col-sm-1">
                                <div class="optional">
                                    <input class="email-master-optin check-box" data-val="true"
                                           data-val-required="The MasterOptIn field is required."
                                           id="Preferences_EmailSector_MasterOptIn"
                                           name="Preferences.EmailSector.MasterOptIn" type="checkbox"
                                           value="true" checked>
                                    <input name="Preferences.EmailSector.MasterOptIn" type="hidden" value="true"></div>
                            </div>
                            <div class="col-xs-10 col-sm-11 nomobilepadding">
                                <div class="partner-text">
                                    By creating an account, you agree to Storefy  <a href="/en/terms" target="_blank" class="open-popup-link" id="terms-info">Conditions of Use</a> and <a href="/en/privacy" target="_blank" class="open-popup-link" id="privacy">Privacy Notice</a>.
                                </div>
                            </div>
                        </div>
                        <div class="row terms-row clearfix" tabindex="0" style="display: none">
                            <div class="col-xs-2 col-sm-1">
                                <div class="optional">
                                    <input class="email-master-optin check-box" data-val="true"
                                           data-val-required="The MasterOptIn field is required."
                                           id="Preferences_EmailSector_MasterOptIn"
                                           name="Preferences.EmailSector.MasterOptIn" type="checkbox"
                                           value="true"><input name="Preferences.EmailSector.MasterOptIn" type="hidden"
                                                               value="true">
                                </div>
                            </div>
                            <div class="col-xs-10 col-sm-11 nomobilepadding">
                                <div class="partner-text">
                                    Agree to receive offers by email about selected companies, that we believe will be
                                    of interest to you. These <a href="#" data-toggle="modal"
                                                                 data-target="#sectorPreferencesEmail" tabindex="-1">
                                        companies </a>
                                    are within the following categories: <span class="email-categories">Automotive, Retail, Finance, Gambling, Insurance, Travel, Lifestyle, General, Utilities</span>
                                    .
                                    Click companies to view the specific companies.
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix labelRow button-terms terms-row clickregister" tabindex="0">
                            <div class="col-md-12">
                                Your advantages at a glance:
                                <ul>
                                    <li>Save up to 50% on shopping</li>
                                    <li>Immediate access to the database</li>
                                    <li>Access to all articles</li>
                                    <li>Onetime offer</li>
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div class="correctErrors" style="display:none;">
                                    Please correct errors above
                                </div>
                                <p class="pSubmitting submitting " style="display: none;  text-align: center;">
                                    <i class="fa fa-cog fa-spin"></i>
                                </p>
                                <input type="submit" value="100% free, register"
                                       class="button register-submit-form last-stage"/>
                            </div>
                            <div class="EndDate clearfix" tabindex="0">
                                <p><strong>Closing Date: 15/12/2020</strong></p>
                            </div>
                            <div class="col-md-12" style="font-size: 8px;">
                                * You can use Storefy for free during the trial period. If you do not cancel during this time, your membership in the Storefy tariff will automatically be extended at € 8.33 / month (12 months term - total € 99.96).
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="/invites/paypal-en/scripts/bootstrap.js?v=259GRi7C-wqLujdSFf7c8eD78BQusV-wO1OdFdk_FUc1"></script>
<script src="/invites/paypal-en/scripts/jquery.js?v=FVs3ACwOLIVInrAl5sdzR2jrCDmVOWFbZMY6g6Q0ulE1"></script>
<script src="/invites/paypal-en/scripts/question-block-campaign?v=NgtJNAeIXisTssN6a7gFFtU844Y4p6rbSh0rNm-jKhk1"></script>
<script src="/invites/paypal-en/scripts/registration.js?v=l8d4CrdEaw0GOow9YKQH4mKn0Vh9h2lTtN4W016EEEo1"></script>
</body>
</html>
@endsection

@section('footer_scripts')

@endsection

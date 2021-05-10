
@extends('layouts.master')

@section('after_styles')
    <!-- Ladda Buttons (loading buttons) -->
    <link href="{{ url('css/unf-style.min.css') . getPictureVersion() }}" rel="stylesheet">
@endsection

@section('before_scripts')
    <script src="{{ url('assets/js/iban.js') }}"></script>
    <script src="{{ url('assets/js/countries.js') }}"></script>
@endsection

@section('content')

	@if (!(isset($paddingTopExists) and $paddingTopExists))
		<div class="h-spacer"></div>
	@endif
    <main class="content___3QzDJ registration">

        <div class="reducer___1JA85">
            <div class="inner___1BAvS">
                <h1 class="text-center header___aX7Fc">{{ trans('auth.register_throw_site', ['sitename' => config('app.name')]) }}</h1>
            </div>
        </div>

        <div class="main-content" style="margin-top: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <noscript>
                            <p class="noscript">Please enable JavaScript and reload the page!</p>
                        </noscript>

                        <h2 class="registration">{{ trans('auth.Billing address') }}</h2>
                        <p class="registration">{{ trans('auth.enter_billing_address') }}</p>
                        <form id="register-form-step2" class="form-horizontal" method="post" name="register-form-step2" novalidate="novalidate"
{{--                              action="{!! URL::to('paypal') !!}"--}}
                        >
                            {!! csrf_field() !!}
                            <input type="hidden" name="elvInputMode" value="3">
                            <input type="hidden" name="isIbanShown" id="isIbanShown" value="1">
                            <input type="hidden" name="user_id"  value="{{$user_id}}">

                            <div class="panel-group" id="banking" role="tablist" aria-multiselectable="false">
                                <div class="panel panel-default active">
                                    <div class="panel-heading" role="tab" id="heading_bank_ec" onclick="return false" style="display: none">
                                        <h4 class="panel-title">
                                            <input aria-controls="panel_bank_ec" class="payment-radio" data-parent="#banking" data-target="#panel_bank_ec" data-toggle="collapse" id="paymentElv" name="PaymentTypeID" type="radio" value="2">
                                            <label for="paymentElv">
                                                PayPal
                                                <span class="bank-icon" style="top: -3px;"><img src="{{ url('images/paypal-payment.png') . getPictureVersion() }}" alt=""></span>
                                            </label>
                                        </h4>
                                    </div>
                                    <div id="panel_bank_ec" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_bank_ec">
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-inline ">
                                                        <input type="text" class="form-control " id="inputFirstName" name="sFirstNameElv" placeholder={{t("First name")}} value="{{old('sFirstNameElv')}}">

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control" id="inputLastName" name="sLastNameElv" placeholder={{ t("Last name") }} value="{{old("sLastNameElv")}}">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group required">
                                                    <?php $countryCodeError = (isset($errors) and $errors->has('country_code')) ? ' is-invalid' : ''; ?>
                                                    <div class="col-md-6">
                                                        <select id="countryCode" name="country_code" class="form-control sselecter{{ $countryCodeError }}">
                                                            <option value="0" {{ (!old('country_code') or old('country_code')==0) ? 'disabled selected="selected"' : '' }}>{{ t('Country') }}</option>

                                                            <option value="DE" {{ (old('country_code') == 'DE') ? 'selected="selected"' : '' }}>
                                                                Deutschland
                                                            </option>
                                                            <option value="AT" {{ (old('country_code') == 'AT') ? 'selected="selected"' : '' }}>
                                                                Österreich
                                                            </option>
                                                            <option value="CH" {{ (old('country_code') == 'CH') ? 'selected="selected"' : '' }}>
                                                                Switzerland
                                                            </option>
                                                            <option value="NL" {{ (old('country_code') == 'NL') ? 'selected="selected"' : '' }}>
                                                                Nederland
                                                            </option>
                                                            <option value="BE" {{ (old('country_code') == 'BE') ? 'selected="selected"' : '' }}>
                                                                Belgique
                                                            </option>
                                                            <option value="0" disabled="">------------------------</option>
                                                            @foreach ($countries as $code => $item)
                                                                @if(in_array($code, ['DE', 'AT', 'CH', 'NL', 'BE']))
                                                                    @continue
                                                                @endif
                                                                <option value="{{ $code }}" {{ (old('country_code') == $code) ? 'selected="selected"' : '' }}>
                                                                    {{ $item->get('name') }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-inline ">
                                                        <input type="text" class="form-control" id="inputAddress" name="sStreetElv" placeholder={{t("Address line")}} value="{{old("sStreetElv")}}" maxlength="50">

                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control" id="inputNumber" name="sStreetNrElv" placeholder={{t("House_no")}} value="{{old("sStreetNrElv")}}" maxlength="15">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-sm-2">
                                                    <div class="form-group form-group-inline ">
                                                        <input type="text" class="form-control" id="inputPLZ" name="sZipElv" placeholder={{ t("Post code") }} value="{{old("sZipElv")}}" maxlength="10">

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control" id="inputOrt" name="sCityElv" placeholder={{ t("City") }} value="{{old("sCityElv")}}" maxlength="30">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="col-sm-12 alert alert-default alert-no-margin">
                                                    <p class="payment-footnote">
                                                        <span class="glyphicon glyphicon-info-sign"></span>
                                                        {{ t("You will be forwarded directly to PayPal after the end of the order process to complete your purchase there.") }}
                                                    </p>
                                                </div>

                                            </div>

                                            <div class="col-sm-12" id="inputACBCcontainer" style="display: none;">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-inline ">
                                                        <input type="tel" class="form-control" id="inputKontoNr" name="sAccountNr" placeholder={{ t("Account number") }} maxlength="10" value="{{old("sAccountNr")}}" disabled="">

                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="tel" class="form-control" id="inputBlz" name="sBankCode" placeholder={{ t("Bank code") }} maxlength="8" value="{{old("sBankCode")}}" disabled="">

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-sm-12" id="inputIBANcontainer" style="display: none">
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control" id="inputIban" name="sIban" placeholder="IBAN" value="{{old("inputIban")}}">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" id="amount">
                                                <div class="col-sm-6">
                                                    <div class="form-group ">
                                                        <input  type="hidden" class="form-control" id="inputAmount" name="amount" placeholder="Amount" value="99.96">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/.panel -->

                            </div>


                            <div class="col-sm-12">
                                <div class="alert">
                                    <ul class="check-list" id="stepTwoDisclaimer" style="font-size: 12px;">
                                        <li>
                                            {!! t('I am entitled to test Joonlo.com for 14 days free of charge.', ['sitename' => config('app.name')]) !!}
                                        </li>
                                        <li>
                                            {!! t("Unless I cancel during the test period, I subscribe to Joonlo for the price of just € 8.33 per month, for one year (one-off charge for one year: € 99.96).  If I do not cancel the paid subscription at least 1 month before the end of the contract term, the contract is extended by a further contract term of one year.", ['sitename' => config('app.name')]) !!}
                                        </li>
                                        <li>
                                            {!! trans("global.I have read the terms of use and cancellation policy.", ['terms' => lurl('/terms'), 'cancellation' => lurl('/page/cancellation-right')]) !!}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="button buy-button unf-cta-button-event" id="stepTwoCtaButton">
                                        {{ t("buy") }}
                                    </button>

{{--                                    <span class="loadingButton" style="display: none">--}}
{{--                                        <span class="loader___AOgfw loader___1H8DK">--}}
{{--                                            <span class="dot___27mgG light___2-R8m dot1___zYQVX"></span>--}}
{{--                                            <span class="dot___27mgG light___2-R8m dot2___1Bd_A"></span>--}}
{{--                                            <span class="dot___27mgG light___2-R8m dot3___pGqeN"></span>--}}
{{--                                            <span class="dot___27mgG light___2-R8m dot4___1C96p"></span>--}}
{{--                                        </span>--}}
{{--                                    </span>--}}

                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="register-save small" style="    color: #9697a1!important;">
                                        <span class="register-icon"></span>
                                        {{t("Your data is being sent securely.")}}
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.main-content -->

    </main>
    <div class="__GL__parent" style="display: none">
        <div class="__GL__loader">
            <div class="__GL__dot1"></div>
            <div class="__GL__dot2"></div>
            <div class="__GL__dot3"></div>
            <div class="__GL__dot4"></div>
        </div>
    </div>
@endsection
<style>
    @keyframes __GL__reveal {
        from { transform: scale(0.001); }
        to { transform: scale(1); }
    }

    @keyframes __GL__slide {
        to {
            transform: translateX(1.5em)
        }
    }

    .__GL__parent {
        align-items: center;
        bottom: 0;
        display: flex;
        font-size: 15px;
        justify-content: center;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        background: rgba(0, 0, 0, 0.7);
        overflow: auto;
        text-align: center;
        z-index: 21;
    }

    .__GL__loader {
        display: inline-block;
        height: 1em;
        position: relative;
        vertical-align: middle;
        width: 4em;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .__GL__loader > div {
        background: #0177e4;
        width: 1em;
        height: 1em;
        border-radius: 0.5em;
        position: absolute;
        animation-duration: 0.5s;
        animation-timing-function: ease;
        animation-iteration-count: infinite;
    }

    .__GL__dot1,
    .__GL__dot2 {
        left: 0;
    }

    .__GL__dot3 {
        left: 1.5em;
    }

    .__GL__dot4 {
        left: 3em;
    }

    .__GL__dot1 {
        animation-name: __GL__reveal;
    }

    .__GL__dot2,
    .__GL__dot3 {
        animation-name: __GL__slide;
    }

    .__GL__dot4 {
        animation-name: __GL__reveal;
        animation-direction: reverse;
    }

    .mobile_search_form, .main__header__row .side .buttons, .main__header__row .content, .main__header__row .burger, .navBarContainer__wrapper .navBar, .categoriesList {
        display: none !important;
    }
    .panel>.panel-heading label {
        cursor: auto;
    }
    .main__header .newLogo, .main__header .site-logo {
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>
@section('after_scripts')
    <script src="{{ url('assets/plugins/jquery.placeholder.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/plugins/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/plugins/jquery.unf.validator.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/plugins/jquery.payment.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/unf-base.min.js') }}" type="text/javascript"></script>

    <script>
		$(document).ready(function () {
			/* Submit Form */
            $("#register-form-step2 .buy-button").on('click tap', function () {
                if($('#register-form-step2').valid()) {
                    $('.__GL__parent').show();
                    $('#register-form-step2 .buy-button').prop('disabled', true);
                    $('#register-form-step2 .buy-button').attr('id', 'stepTwoCtaButtonDone');
                    $("#register-form-step2").submit();
                    return false;
                }
            });
                            $('#ibantoggle').on('click', function(e) {
                                isIbanShown = !isIbanShown;
                                toggleIbanInput(isIbanShown);
                            });

                            function toggleIbanInput(isIbanShown) {
                                if (isIbanShown) {

                                    $('#ibantoggletext').hide();
                                    $('#bankcodetoggletext').show();
                                    $('#inputIBANcontainer').show();
                                    $('#inputIban').prop('disabled', false);

                                    $('#inputACBCcontainer').hide();
                                    $('#inputKontoNr').prop('disabled', true);
                                    $('#inputBlz').prop('disabled', true);
                                    $('#isIbanShown').val(1);

                                } else {

                                    $('#ibantoggletext').show();
                                    $('#bankcodetoggletext').hide();
                                    $('#inputIBANcontainer').hide();
                                    $('#inputIban').prop('disabled', true);

                                    $('#inputACBCcontainer').show();
                                    $('#inputKontoNr').prop('disabled', false);
                                    $('#inputBlz').prop('disabled', false);
                                    $('#isIbanShown').val(0);
                                }
                            }


            var schufaLink = $("#schufaLink");
            var sState = "38";
            var accordion = $('#banking');
            var langtoken = "ENG";
            var paymentCheckboxes = accordion.find('input[type="radio"]');
            var sState = "38";


            function SpyoffVisibility() {
                var paymentTypeId = $("#register-form-step2 input[type='radio']:checked").val();
                if (paymentTypeId == 2 || paymentTypeId == 3){
                    $('#spyoffLink').show();
                }
                else {
                    $('#spyoffLink').hide();
                };
            };

            function SchufaVisibility(checkboxId) {
                if (checkboxId === $("#paymentElv").attr('id') && sState === "38"){
                    schufaLink.show();
                }
                else {
                    schufaLink.hide();
                }
            };

            paymentCheckboxes.on("click", function (e) {
                SchufaVisibility($(e.target).attr('id'));
                SpyoffVisibility();
            });

            SchufaVisibility();

            SpyoffVisibility();


            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            var stepTwoDisclaimer = $('#stepTwoDisclaimer');

            var resolvePaymentTypeId = function(){
                return $('#register-form-step2').find('input[name="PaymentTypeID"]:checked').val();
            };

            var resolveCreditCardTypeId = function() {
                if (resolvePaymentTypeId() === "3") {
                    return $('#inputCardProvider').val();
                }
                return 0;
            };

            var resolveStepTwoDisclaimer = function(){

            };

            var fillStepTwoDisclaimer = function(){
                resolveStepTwoDisclaimer()
                    .done(function(response){
                        response = JSON.parse(response);
                        var html = $.parseHTML($.trim(response.DATA));
                        stepTwoDisclaimer.html($(html).text());
                    });
            };

            $('#inputCardNr').on('keyup change', function(){
                fillStepTwoDisclaimer();
            });

            $('#register-form-step2').find('input[name="PaymentTypeID"]').on("change", function(){
                fillStepTwoDisclaimer();
            });



            $('#inputCardNr').payment('formatCardNumber');
            $('#inputSecurityNr2').payment('formatCardCVC');

            $('#inputKontoNr').payment('restrictNumeric');
            $('#inputBlz').payment('restrictNumeric');
            $('#sAreaCode').payment('restrictNumeric');
            $('#sPhoneNr').payment('restrictNumeric');

            $('#inputFirstName').unfnoNumeric();
            $('#inputFirstName2').unfnoNumeric();
            $('#inputFirstName3').unfnoNumeric();
            $('#inputFirstName4').unfnoNumeric();

            $('#inputLastName').unfnoNumeric();
            $('#inputLastName2').unfnoNumeric();
            $('#inputLastName3').unfnoNumeric();
            $('#inputLastName4').unfnoNumeric();
            $('#countryCode').unfnoNumeric();

            var modelCreditCardTypes = [];
            var currentCardType = {};
            var creditCardTypes = [];
            var cctypeselector = $('#CCardTypeSelector');
            var bankCodeisValid = false;
            var ibanisvalid = false;
            var elvInputMode = 3;
            var isIbanShown = 1;
            var isIbanRequired = true;
            var isBankCodeRequired = false;
            var countryID = 38;




            modelCreditCardTypes.push({Id: "1", Name: "Visa"});

            modelCreditCardTypes.push({Id: "2", Name: "American Express"});

            modelCreditCardTypes.push({Id: "3", Name: "Mastercard"});

            modelCreditCardTypes.push({Id: "4", Name: "Visa Debit"});

            modelCreditCardTypes.push({Id: "7", Name: "Visa Electron"});

            modelCreditCardTypes.push({Id: "14", Name: "Diners Club International"});


            $.each(modelCreditCardTypes, function(modelindex, modeltype) {
                $.each($.payment.cards, function(jqpindex, jqptype) {
                    var mo = modeltype.Name.toLowerCase().replace(/\s+/g, '');
                    if(mo.indexOf("american") !== -1 && mo.indexOf("express") !== -1){
                        mo = "amex";
                    }
                    if (mo.indexOf("visa") !== -1 && mo.indexOf("delta") !== -1){
                        mo = "visa";
                    }
                    if (mo.indexOf("diners") !== -1){
                        mo = "dinersclub";
                    }
                    if (jqptype.type === mo) {
                        var t = $.extend({}, jqptype);
                        t.displayname = modeltype.Name;
                        t.cardtypeid = modeltype.Id;
                        creditCardTypes.push(t);

                        var insertcardtype = function(type){
                            cctypeselector.append("<div class='cc-icon-container'><span class='cc-icon cc-" + type + " inactive'></span></div>");
                        };
                        //If cardtype is visa, display only once in selector
                        if(modeltype.Id === "1" || modeltype.Id === "4" || modeltype.Id === "7") {
                            if(cctypeselector.find('.cc-visa').length === 0){
                                insertcardtype(jqptype.type);
                            }
                        } else {
                            insertcardtype(jqptype.type);
                        }
                    }
                });
            });

            jQuery.validator.addMethod("validcardnumber", function (value, element, param) {
                cctypeselector.find('.cc-icon').removeClass('active').addClass('inactive');
                return this.optional(element) || $.payment.validateCardNumber(value) === param;
            }, "");

            jQuery.validator.addMethod("validcvc", function (value, element) {
                if(!currentCardType.type){
                    return !1;
                }
                return this.optional(element) || $.payment.validateCardCVC(value, currentCardType.type);
            }, "");

            //STATIC SELECTBOXES! CHANGE HERE IN CASE OF CREDIT CARD DATE STUFF CHANGES
            jQuery.validator.addMethod("validexpirydate", function(value, element, param) {
                var month = $('#inputMonth2').find('option:selected').text();
                var year = $('#inputYear2').find('option:selected').text();
                var now = new Date();
                return this.optional(element) || (new Date(now.getFullYear(),now.getMonth()+2,1,0,0,0,0)).getTime() < (new Date(parseInt(year),parseInt(month),1,0,0,0,0)).getTime();
            }, "The credit part expiry date is too close to the current date");

            jQuery.validator.addMethod("numbermatchcctype", function(value, element) {
                var result;
                if(currentCardType.type){
                    result = $.payment.cardType(value) === currentCardType.type;
                } else {
                    result = !0;
                }
                return this.optional(element) || result;
            }, "The CreditCard number doesnt match the Card type");

            jQuery.validator.addMethod("ccnumberprovidersupported", function(value, element, param) {
                var type = $.payment.cardType(value);

                cctypeselector.find('.cc-icon').removeClass('active').addClass('inactive');
                if(type){
                    var matchedCCType = creditCardTypes.filter(function(item){
                        return item.type == type;
                    });
                    if(matchedCCType.length){
                        $('#inputCardProvider').val(matchedCCType[0].cardtypeid);
                        currentCardType = matchedCCType[0];
                        var icon = $('.cc-'+matchedCCType[0].type);
                        icon.removeClass('inactive').addClass('active');
                        return this.optional(element) || true;
                    } else {
                        cctypeselector.find('.cc-icon').removeClass('active').addClass('inactive');
                        return false;
                    }
                }
                return false;
            }, "Credit card provider is not accepted");

            jQuery.validator.addMethod("valueNotZero", function(value, element, param) {
                return this.optional(element) || $(element).find('option:selected').val() !== "0";
            }, "Please choose a value!");

            jQuery.validator.addMethod("notNumeric", function (value, element) {
                var reg = /[0-9]/;
                return this.optional(element) || !reg.test(value);
            }, "Only alphabatic characters allowed.");

            jQuery.validator.addMethod("bankcodeisvalid", function(value, element) {
                return this.optional(element) || bankCodeisValid;
            }, "Your bank identification code is invalid. Please check the data.");


            jQuery.validator.addMethod("ibanisvalid", function (value, element) {
                var countryPrefix = value.slice(0,2);

                var hasIbanValidCountryPrefix = value.search(countryPrefix);

                if (hasIbanValidCountryPrefix == 0) {
                    return this.optional(element) || IBAN.isValid(value);
                } else {
                    return false;
                }
            }, "Your country code is not valid.");

            jQuery.validator.addMethod("valueNotDefault", function(value, element, param) {
                var def = param !== true ? param : "0";
                return this.optional(element) || $(element).find('option:selected').val() !== def;
            }, "Please choose a value!");

            var validationRules = {
                'sEmailIdeal': {
                    required: '#paymentIdeal:checked',
                    notNumeric: true
                },
                'sFirstNameIdeal': {
                    required: '#paymentIdeal:checked',
                    notNumeric: true
                },
                'sLastNameIdeal': {
                    required: '#paymentIdeal:checked',
                    notNumeric: true
                },
                'sStreetIdeal': {
                    required: '#paymentIdeal:checked',
                    maxlength: 50
                },
                'sStreetNrIdeal': {
                    required: '#paymentIdeal:checked',
                    maxlength: 15
                },
                'sZipIdeal': {
                    required: '#paymentIdeal:checked',
                    maxlength: 10
                },
                'sCityIdeal': {
                    required: '#paymentIdeal:checked',
                    maxlength: 30
                },
                'sFirstNameCC': {
                    required: '#paymentCC:checked',
                    notNumeric: true
                },
                'sLastNameCC': {
                    required: '#paymentCC:checked',
                    notNumeric: true
                },
                'sStreetCC': {
                    required: '#paymentCC:checked',
                    maxlength: 50
                },
                'sStreetNrCC': {
                    required: '#paymentCC:checked',
                    maxlength: 15
                },
                'sZipCC': {
                    required: '#paymentCC:checked',
                    maxlength: 10
                },
                'sCityCC': {
                    required: '#paymentCC:checked',
                    maxlength: 30
                },
                'sCardNr': {
                    required: '#paymentCC:checked',
                    validcardnumber: true,
                    ccnumberprovidersupported: true
                    //numbermatchcctype: true,
                },
                'CCardTypeID': {
                    required: '#paymentCC:checked'
                },
                'iExpMonth': {
                    required: '#paymentCC:checked',
                    validexpirydate: true,
                    valueNotZero: true
                },
                'iExpYear': {
                    required: '#paymentCC:checked',
                    validexpirydate: true,
                    valueNotZero: 'true',
                },
                'sKpn': {
                    required: '#paymentCC:checked',
                    validcvc: true,
                    minlength: 3,
                    maxlength: 4
                },
                'sFirstNameElv': {
                    required: '#paymentElv:checked',
                    notNumeric: true
                },
                'sLastNameElv': {
                    required: '#paymentElv:checked',
                    notNumeric: true
                },
                'sStreetElv': {
                    required: '#paymentElv:checked',
                    maxlength: 50
                },
                'sStreetNrElv': {
                    required: '#paymentElv:checked',
                    maxlength: 15
                },
                'sZipElv': {
                    required: '#paymentElv:checked',
                    maxlength: 10
                },
                'sCityElv': {
                    required: '#paymentElv:checked',
                    maxlength: 30
                },
                'sAccountNr': {
                    required: '#paymentElv:checked',
                    number: true
                },
                'sBankCode': {
                    required: isBankCodeRequired,

                    bankcodeisvalid: true,

                    number: true
                },
                'sIban': {
                    required: isIbanRequired,
                    ibanisvalid: true,
                    // maxlength: 22
                },
                'sFirstNamePP': {
                    required: '#paymentPP:checked',
                    notNumeric: true
                },
                'sLastNamePP': {
                    required: '#paymentPP:checked',
                    notNumeric: true
                },
                'sStreetPP': {
                    required: '#paymentPP:checked',
                    maxlength: 50
                },
                'sStreetNrPP': {
                    required: '#paymentPP:checked',
                    maxlength: 15
                },
                'sZipPP': {
                    required: '#paymentPP:checked',
                    maxlength: 10
                },
                'sCityPP': {
                    required: '#paymentPP:checked',
                    maxlength: 30
                },
                'sPhoneNr': {

                    required: true,

                    maxlength: 200,
                    number: true
                },
                'sAreaCode': {

                    required: true,

                    maxlength: 10,
                    number: true
                },
                'HasAcceptedTerms': {
                    required: true
                },
                'country_code': {
                    // number: false,
                    valueNotDefault: true,
                    required: true
                },
                'amount': {
                    valueNotZero: 'true',
                    required: true
                }
            };

            var validationMessages = {
                "sEmailIdeal": {
                    required: "{!! t('Please enter the following:') !!} email",
                },
                "sFirstNameIdeal": {
                    required: "{!! t('Please enter the following:') !!} {!! t('First Name') !!}",
                    notNumeric: "The first name may not contain numbers. Please check your details."
                },
                "sLastNameIdeal": {
                    required: "{!! t('Please enter the following:') !!} {{ t('Last Name') }}",
                    notNumeric: "The last name may not contain numbers. Please check your details."
                },
                "sStreetIdeal": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street name') !!}"
                },
                "sStreetNrIdeal": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street number') !!}"
                },
                "sZipIdeal": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Postal code') !!}"
                },
                "sCityIdeal": {
                    required: "{!! t('Please enter the following:') !!} {!! t('City') !!}"
                },
                "sFirstNameCC": {
                    required: "{!! t('Please enter the following:') !!} {!! t('First Name') !!}",
                    notNumeric: "The first name may not contain numbers. Please check your details."
                },
                "sLastNameCC": {
                    required: "{!! t('Please enter the following:') !!} {{ t('Last Name') }}",
                    notNumeric: "The last name may not contain numbers. Please check your details."
                },
                "sStreetCC": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street name') !!}"
                },
                "sStreetNrCC": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street number') !!}"
                },
                "sZipCC": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Postal code') !!}"
                },
                "sCityCC": {
                    required: "{!! t('Please enter the following:') !!} {!! t('City') !!}"
                },
                "sCardNr": {
                    required: "{!! t('Please enter the following:') !!} credit card number",
                    validcardnumber: "The credit card number entered is not valid. Pleae check your details.",
                    //numbermatchcctype: "",
                },
                "CCardTypeID": {
                    required: "Please enter the follwoing: account number"
                },
                "iExpMonth": {
                    required: "{!! t('Please enter the following:') !!} expiry month",
                    validexpirydate: "Your credit card has expired. Please check the expiry date."
                },
                "iExpYear": {
                    required: "{!! t('Please enter the following:') !!} expiry year",
                    validexpirydate: "Your credit card has expired. Please check the expiry date."
                },
                "sKpn": {
                    required: "{!! t('Please enter the following:') !!} CVV number",
                    minlength: "Your CVV number is invalid. Please check the data. ",
                    maxlength: "Your CVV number is invalid. Please check the data. "
                },
                "sFirstNameElv": {
                    required: "{!! t('Please enter the following:') !!} {!! t('First Name') !!}",
                    notNumeric: "The first name may not contain numbers. Please check your details."
                },
                "sLastNameElv": {
                    required: "{!! t('Please enter the following:') !!} {{ t('Last Name') }}",
                    notNumeric: "The last name may not contain numbers. Please check your details."
                },
                "sStreetElv": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street name') !!}"
                },
                "sStreetNrElv": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street number') !!}"
                },
                "sZipElv": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Postal code') !!}"
                },
                "sCityElv": {
                    required: "{!! t('Please enter the following:') !!} {!! t('City') !!}"
                },
                "sAccountNr": {
                    required: "Please enter the follwoing: account number",
                    number: "The account number entered is not valid. Please check your details or contact our support."
                },
                "sBankCode": {
                    required: "{!! t('Please enter the following:') !!} bank code",
                    number: "Your bank identification code is invalid. Please check the data."
                },
                "sIban": {
                    required: "{!! t('Please enter the following:') !!} Iban",
                    ibanisvalid: jQuery.validator.format("Please provide correct IBAN checking account."),
                    // maxlength: jQuery.validator.format("Please provide correct IBAN checking account."),
                },
                "sFirstNamePP": {
                    required: "{!! t('Please enter the following:') !!} {!! t('First Name') !!}",
                    notNumeric: "The first name may not contain numbers. Please check your details."
                },
                "sLastNamePP": {
                    required: "{!! t('Please enter the following:') !!} {{ t('Last Name') }}",
                    notNumeric: "The last name may not contain numbers. Please check your details."
                },
                "sStreetPP": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street name') !!}"
                },
                "sStreetNrPP": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Street number') !!}"
                },
                "sZipPP": {
                    required: "{!! t('Please enter the following:') !!} {!! t('Postal code') !!}"
                },
                "sCityPP": {
                    required: "{!! t('Please enter the following:') !!} {!! t('City') !!}"
                },
                "sPhoneNr": {
                    required: "The phone numer entered is not valid. Please check your details.",
                    number: "The phone numer entered is not valid. Please check your details."
                },
                "sAreaCode": {
                    required: "The phone numer entered is not valid. Please check your details.",
                    number: "The phone numer entered is not valid. Please check your details."
                },
                "HasAcceptedTerms": {
                    required: "you must accept the terms"
                },
                "country_code": {
                    required: "{!! t('Please enter the following:') !!} country",
                    valueNotDefault: "{!! t('Please enter the following:') !!} country"
                },
            };

            var htmlGlyphiconValid = $('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');

            var htmlGlyphiconInvalid = $('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

            var validator = $('#register-form-step2').validate({
                rules: validationRules,
                messages: validationMessages,
                errorClass: 'text-danger error-label',
                submitButton: $('.buy-button'),
                highlight: function(element, errorClass, validClass) {
                    var $element = $(element);
                    var $parent = $element.closest('.form-group');
                    $parent.removeClass("has-success has-feedback").addClass("has-error has-feedback")
                        .find('.form-control-feedback, .help-block').remove();

                    if (!$element.is('select, input[type="checkbox"]')) {
                        htmlGlyphiconInvalid.clone().insertBefore($element);
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    var $element = $(element);
                    var $parent = $element.closest('.form-group');
                    $parent.removeClass("has-error has-feedback").addClass("has-success has-feedback")
                        .find('.form-control-feedback, .help-block').remove();

                    if (!$element.is('select, input[type="checkbox"]')) {
                        htmlGlyphiconValid.clone().insertBefore($element);
                    }
                },
                // valid: function(submitButton){
                //     console.log('valid');
                //     $(submitButton).attr('id', 'stepTwoCtaButtonDone');
                // },
                errorPlacement: function(error, element) {
                    if (!$(element).is('select, input[type="checkbox"]')) {
                        if ($(element).next().is("span")) {
                            $(error).insertAfter($(element).next());
                        } else {
                            $(error).insertAfter($(element));
                        }
                    }
                }
            });

            $('#inputYear2, #inputMonth2').on('change', function() {
                validator.element($('#inputMonth2'));
                validator.element($('#inputYear2'));
            });

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            var validateBankCodeRemote = function(bankCode) {
                var def = $.Deferred();
                delay(function() {
                    var bankcode = bankCode;
                    $.post('https://en.usenet.nl/unf/shop/obj/cart/validateBankCode.cfm', { sBankCode: bankcode })
                        .done(function(data) {
                            def.resolve(data || null);
                        })
                        .fail(function(error) {
                            def.reject();
                        });
                }, 1000);
                return def;
            };

            $('#inputBlz').on('keyup change', function(e) {
                if (isIbanShown == false){
                    var field = $(e.target);
                    var banknamelabel = field.siblings(".bc-bankname");
                    if (banknamelabel) {
                        banknamelabel.remove();
                    }
                    if (field.val()) {
                        validateBankCodeRemote(field.val())
                            .done(function(response) {
                                response = JSON.parse(response);
                                bankCodeisValid = !!response.TYPE;
                                validator.element(field);
                                var banknamelabel = field.siblings(".bc-bankname");
                                if (bankCodeisValid) {
                                    if (banknamelabel.length) {
                                        banknamelabel.text(response.DATA.SBANKNAME);
                                    } else {
                                        var label = $('<label>' + response.DATA.SBANKNAME + '</label>').addClass("bc-bankname text-success");
                                        field.after(label);
                                    }
                                }
                            })
                            .fail(function() {
                                bankCodeisValid = false;
                                validator.element(field);
                                var banknamelabel = field.siblings(".bc-bankname");
                                if (banknamelabel) {
                                    banknamelabel.remove();
                                }
                            });
                    }

                } else {
                    var field = $(e.target);
                    var banknamelabel = field.siblings(".bc-bankname");
                    if (banknamelabel) {
                        banknamelabel.remove();
                    }
                }
            });
            $($(".panel-collapse")[0]).addClass('in')
            $($(".payment-radio")[0]).prop("checked", true);
        });
	</script>
@endsection
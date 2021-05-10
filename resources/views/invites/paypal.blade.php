@extends('layouts.invite')

@section('before_styles')

@endsection

@section('content')
    <!DOCTYPE html>
<html slick-uniqueid="3" style=""><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="author" content="">
    <meta name="copyright" content="">
    <meta name="publisher" content="">
    <meta name="page-topic" content="">
    <meta name="page-type" content="">
    <meta name="keywords" content="PayPal Gutghaben">
    <meta name="description" content="PayPal Gutghaben">
    <meta name="date" content="2020-10-02">
    <meta name="robots" content="index,nofollow">

    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">

    <meta http-equiv="content-language" content="de">
    <title>PayPal - 1000€ Prepaid Guthaben</title>


    <style>
        .sponsorText, .spText {
            position: absolute !important;
            top: 9px;
        }
        .sponsorHeader {
            margin-top: 50px;
        }
    </style>









    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>














    <script type="text/javascript">

        $(document).ready(function(){
            $("input").each(function(){
                $(this).off("paste");
                $(this).on("paste", function(e) {
                    return false;
                });
            });
        });

    </script>

    <link rel="stylesheet" type="text/css" href="invites/paypal/basic.css">
    <link href="invites/paypal/css.css" rel="stylesheet" type="text/css">
    <link href="invites/paypal/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="invites/paypal/series.css">



    <style>/* get all texty input types into the boat */
        input[type="tel"], input[type="email"] {
            color: #606060;
            padding: 0px 5px;
            background-color: #fff;
            border: 1px solid #bcbcbc;
            font-size: 1.4em;
            line-height: 36px;
            height: 36px;
        }

        /******************************************************************************/
        /****	FORMULAR ALLGEMEIN											  	  *****/
        /******************************************************************************/
        .postfachLink{
            margin-top:20px;
        }
        fieldset:empty{
            display:none;
        }
        .headerMainTitle{
            color: #d00;
            display: inline-block;
        }
        .headerSubTitle{
            font-size:25px;
            display: inline-block;
        }



        /******************************************************************************/
        /****	FORMULAR MFW											  		  *****/
        /******************************************************************************/

        #mfw_fieldset_inputData .mfw_adressData_email input {
            width: 99.7%;
        }
        #mfw_fieldset_inputData .mfw_adressData_anrede select {
            width: 99.7%;
        }
        #mfw_fieldset_inputData .mfw_adressData_vorname input {
            width: 99.7%;
        }
        #mfw_fieldset_inputData .mfw_adressData_name input {
            width: 99.7%;
        }

        #mfw_fieldset_inputData .mfw_adressData_ort input {
            float: left;
            margin-left: 4px;
            margin-top: 0;
            width: 99%;
        }

        #mfw_fieldset_inputData .mfw_adressData_gebDatum {
            clear: both;
        }

        #mfw_fieldset_inputData .mfw_adressData_anrede label {
            float: none;
        }

        #mfw_fieldset_inputData .mfw_adressData_email {
            top:24px;
        }

        #mfw_fieldset_inputData .mfw_adressData_land {
            display: none;
        }

        .mfw_sponsorAssignment_ {
            z-index: 2147483647;
        }

        .mfw_adressData_agb1 input{
            transform: scale(1.5);
            left: 0;
            margin-right: 11px;
        }
        .mfw_adressData_agb2 input{
            transform: scale(1.5);
            left: 0;
            margin-right: 11px;
        }

        /******************************************************************************/
        /****	Formular Bootstrap-Buttons+RadioButtons  						  *****/
        /******************************************************************************/
        .btn-group, .btn-group-vertical {
            display: inline-block;
            position: relative;
            vertical-align: middle;
            width:100%;
        }
        .bs-example > .btn, .bs-example > .btn-group {
            margin-bottom: 5px;
            margin-top: 5px;
        }
        .btn {
            -moz-user-select: none;
            background-image: none;
            border: 1px solid rgba(0, 0, 0, 0);
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            line-height: 25px;
            margin-bottom: 0;
            padding: 6px 12px;
            text-align: center;
            touch-action: manipulation;
            vertical-align: middle;
            white-space: nowrap;
            height:34px;
        }
        .btn-primary {
            background-color: #cccccc;
            border-color: #cccccc;
            color: #ffffff;
        }
        .btn-group-vertical > .btn, .btn-group > .btn {
            float: left;
            position: relative;
        }
        .btn-group > .btn:first-child {
            margin-left: 0;
        }
        .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
        }
        [data-toggle="buttons"] > .btn input[type="checkbox"], [data-toggle="buttons"] > .btn input[type="radio"], [data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"], [data-toggle="buttons"] > .btn-group > .btn input[type="radio"] {
            clip: rect(0px, 0px, 0px, 0px);
            pointer-events: none;
            position: absolute;
        }
        .btn.active, .btn:active {
            background-image: none;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.125) inset;
            outline: 0 none;
        }
        .btn-primary.active, .btn-primary:active, .open > .dropdown-toggle.btn-primary {
            background-color: #337ab7;
            border-color: #2e6da4;
            color: #ffffff;
        }
        #mfw_fieldset_inputData .btn-group label {
            float: none;
            font-size: initial;
            line-height:32px;
            padding: initial;
            border-radius:0px;
            width:48.6%;
        }
        #mfw_fieldset_inputData .btn-group label:nth-child(1) {
            margin-right:9px;
        }

        #mfw_fieldset_inputData .btn-group i {
            position: relative;
            top: 0px;
            left:0px;
        }

        /******************************************************************************/
        /****	Layout											  				  *****/
        /******************************************************************************/
        #balken {
            background-color: #3b3b3b;
            color: #ffffff;
            display: block;
            font-size: 19px;
            height: 30px;
            left: 0;
            position: relative;
            text-align: center;
            top: 0;
            width: 100%;
            z-index: 500;
        }
        #balken img {
            height: 20px;
            left: 20px;
            position: relative;
            top: 4px;
        }
        .footerBild > img {
            width: 100%;
        }


        /******************************************************************************/
        /****	ErrorMeldungen	   											      *****/
        /******************************************************************************/
        .mfwError input[type="text"] {
            background-color: #FFF;
            border: 1px solid red;
        }
        .topAlignErrorBox {
            background: red;
            color: #FFF;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            padding: 3px;
            width:auto;
            clear:both;
            margin:2px 0px 2px 2px;
        }
        .topAlignErrorBox + p label:empty{
            display:none;
        }


        /******************************************************************************/
        /****	Responsive-Design  											      *****/
        /******************************************************************************/
        @media (max-width: 970px) {
            #mfw_fieldset_inputData .btn-group label:nth-child(1) {
                margin-right: 3px;
            }
        }
        @media (max-width: 599px) {
            #content .column_left .prize_image {
                position:relative;
            }
            .box .heading {
                padding: 0 2.2%;
            }
            .headerSubTitle {
                font-size: 13px;
                line-height: 16px;
            }
            #mfw_fieldset_agbs {
                margin-top: 15px;
            }
            .mobile-center{
                text-align:center;
            }
            #content .column_left.mobile-center .prize_image {
                max-width: 500px;
                width: 30%;
            }

            #progress_bar{
                display: none;
            }
        }
        @media (max-width: 375px) {

            #content .column_left.mobile-center .prize_image {
                max-width: 500px;
                width: 40%;
            }
            .headerMainTitle{
                color: #d00;
                font-size:16px;
                line-height:20px;
            }
        }

        #sovendus-container-1 {
            background-color:#fff;
            padding: 10px;
        }

        {* ################################ *}
        {* ##   CSS Dynamische Coregs	 ## *}
        {* ################################ *}

        /*########### o2o CSS ############*/
        #mfw_fieldset_ownCoregData label {
            display: inline;
            margin-right: 10px;
            color: #5F5F5F;
        }

        div[class^=mfw_coreg], div[class^=mfw_orderCoreg] {margin-bottom: 20px;}
        div[class^=mfw_coreg], div[class^=mfw_orderCoreg] {
            font-family: Helvetica, Arial, sans-serif;
            color: #5F5F5F;
        }
        div[class^=mfw_coreg] .coregHeader, div[class^=mfw_orderCoreg] .coregHeader{
            /*padding-bottom: 20px;*/
            float: left;
            width: 100%;
        }
        div[class^=mfw_coreg] .coregBild, div[class^=mfw_orderCoreg] .coregBild{
            float: left;
            margin-right: 25px;
            /*margin-left: 25px;*/
        }
        div[class^=mfw_coreg] .coregBild{
            float: left;
        }

        div[class^=mfw_coreg] .coregHeadline,
        div[class^=mfw_coreg] .subQuestion,
        div[class^=mfw_orderCoreg] .coregHeadline{
            font-weight: bold;
            margin-bottom: 10px;
            color: #ff0000;
        }

        div[class^=mfw_coreg] .coregAnswers, div[class^=mfw_orderCoreg] .coregAnswers{
            clear: both;
            /*background: #f9f9f9;*/
            /*padding: 10px 25px;
            margin: 10px 5px;*/
        }

        div[class^=mfw_coreg] .coregAnswer {
            float: left;
            width: 100%;
        }
        div[class^=mfw_coreg] .sub {clear: both;}

        div[class^=mfw_coreg] .button{
            background: #0198f1;
            color: #fff;
            padding: 10px 15px;
        }
        div[class^=mfw_coreg] .coregSub {display: none;}

        div[class^=mfw_coreg] .subQuestion{
            font-weight: bold;
            color: #ff0000;
            font-size: 1em;
        }

        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] input,
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] button,
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] textarea,
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] select,
        #mfw_fieldset_ownCoregData div[class^=mfw_orderCoreg] input {
            font-size: 1.2em;
            border-radius: 5px;
            border: 1px solid #8E8E8E;
            margin-bottom: 5px;
            margin-top: 5px;
            padding: 5px 15px;
        }
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] select {
            background: #fff;
            min-width: 300px;
            height: 2em;
        }
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] option:{
            line-height: 1.4;
        }

        /* Auskommentiert weil hier Buttons und keine Radios entstehen*/
        /*
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] .coregSubAnswers input[type="radio"] {
              display: none;
        }
        */

        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] .coregSubAnswers input[type="radio"]:checked + label {
            background-image: linear-gradient(to top,#969696,#727272);
            box-shadow: inset 0 1px 6px rgba(41, 41, 41, 0.2),
            0 1px 2px rgba(0, 0, 0, 0.05);
            cursor: default;
            color: #E5E5E5;
            border-color: transparent;
            text-shadow: 0 1px 1px rgba(40, 40, 40, 0.75);
        }

        /* Auskommentiert weil hier Buttons und keine Radios entstehen*/
        /*
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] .coregSubAnswers input[type="radio"] + label {
            text-shadow: 0 1px 0 #fff;
            background-image: -webkit-linear-gradient(top,#fff 0,#e0e0e0 100%);
            background-image: -o-linear-gradient(top,#fff 0,#e0e0e0 100%);
            background-image: -webkit-gradient(linear,left top,left bottom,from(#fff),to(#e0e0e0));
            background-image: linear-gradient(to bottom,#fff 0,#e0e0e0 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe0e0e0', GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            background-repeat: repeat-x;
            border-color: #dbdbdb;
            border-color: #ccc;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
            margin-right: 3px;
              margin-top:3px !important;
            height: 20px;
            display: block !important;
        }
        */
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] .coregAnswers > .coregAnswer .radio,
        #mfw_fieldset_ownCoregData div[class^=mfw_orderCoreg] .coregAnswers > .coregAnswer .radio,
        #mfw_fieldset_ownCoregData div[class^=mfw_coreg] .coregSubAnswers > .coregSubAnswer .radio {
            transform: scale(1.3);
            margin-bottom: 10px;
        }
        div[class^=mfw_coreg] .coregDescription {
            /*font-weight: bold;*/
            /*color: #c00;*/
            margin-bottom: 10px;
            font-size: 13px;
        }

        div[class^=mfw_coreg] .coregAdvice{
            margin-bottom: 5px;
            /*color: #000;*/
            font-size: 13px;
            clear: both;
        }

        div[class^=mfw_coreg] .coregAnswers {position: relative; padding-bottom: 0; margin-bottom: 5px; clear: both;}
        div[class^=mfw_coreg] .coregSubAnswer {float: left; width:100%; /*font-weight:bold;*/}
        /*div[class^=mfw_coreg] .coregSub  {clear: both;}*/
        div[class^=mfw_coreg] .absendebutton {display: none;position: absolute; bottom: -15px; width: 100px; height: 40px;clear: both;}
        div[class^=mfw_coreg] .clear,
        div[class^=mfw_orderCoreg] .clear {clear: both;}
        div[class^=mfw_coreg] .mfwError {color: red;}

        {* ################################ *}
        {* ## CSS Dynamische Coregs	Ende ## *}
        {* ################################ *}



        {* ################################ *}
        {* ## CSS PostBox               ### *}
        {* ################################ *}
        .postModal {
            top: 24%;
            left: 33%;
            width: 40%;
            height: 40%;
            margin-left: -9px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 0 5px #000;
            margin-top: 10px;
            padding-bottom: 10px;
            position: absolute;
            z-index: 100;
            color: #000;
            box-sizing: border-box;
        }
        .postModal .postModalHeader {
            background-color: #004884;
            border: 1px solid #004884;
            border-bottom-width: 1px;
            border-bottom-style: solid;
            border-bottom-color: rgb(0, 72, 132);
            border-bottom: 0px solid #000;
            border-radius: 5px 5px 0 0;
            color: #fff;
            cursor: pointer;
            text-align: center;
            width: 100%;
            line-height: 30px;
            font-size: 18px;
            left: -1px;
            position: relative;
            top: -5px;
        }
        .postModal .postModalContent {
            width: 100%;
            height: 100%;
            max-height: 222px;
            background-color: #fff;
            font-weight: normal;
            padding: 10px;
            box-sizing: border-box;
        }
        {* ################################ *}
        {* ## CSS PostBox Ende          ### *}
        {* ################################ *}



        /* ############################################## */
        /* ####  Bootstrap Modal-Fenster           ###### */
        /* ############################################## */
        .modal-open {
            overflow: hidden;
        }
        .modal {
            display: none;
            overflow: hidden;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            -webkit-overflow-scrolling: touch;
            outline: 0;
        }
        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            -o-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform 0.3s ease-out;
            -o-transition: -o-transform 0.3s ease-out;
            transition: transform 0.3s ease-out;
        }
        .modal.in .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }
        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
        }
        .modal-content {
            position: relative;
            background-color: #ffffff;
            border: 1px solid #999999;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            outline: 0;
        }
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000000;
        }
        .modal-backdrop.fade {
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .modal-backdrop.in {
            opacity: 0.5;
            filter: alpha(opacity=50);
        }
        .modal-header {
            padding: 15px;
            border-bottom: 1px solid #e5e5e5;
        }
        .modal-header .close {
            margin-top: -2px;
        }
        .modal-title {
            margin: 0;
            line-height: 1.42857143;
        }
        .modal-body {
            position: relative;
            padding: 15px;
        }
        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #e5e5e5;
        }
        .modal-footer .btn + .btn {
            margin-left: 5px;
            margin-bottom: 0;
        }
        .modal-footer .btn-group .btn + .btn {
            margin-left: -1px;
        }
        .modal-footer .btn-block + .btn-block {
            margin-left: 0;
        }
        .modal-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll;
        }
        @media (min-width: 768px) {
            .modal-dialog {
                width: 600px;
                margin: 30px auto;
            }
            .modal-content {
                -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            }
            .modal-sm {
                width: 300px;
            }
        }
        @media (min-width: 992px) {
            .modal-lg {
                width: 900px;
            }
        }
        .clearfix:before,
        .clearfix:after,
        .modal-header:before,
        .modal-header:after,
        .modal-footer:before,
        .modal-footer:after {
            content: " ";
            display: table;
        }
        .clearfix:after,
        .modal-header:after,
        .modal-footer:after {
            clear: both;
        }
        .center-block {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .pull-right {
            float: right !important;
        }
        .pull-left {
            float: left !important;
        }
        .hide {
            display: none !important;
        }
        .show {
            display: block !important;
        }
        .invisible {
            visibility: hidden;
        }
        .text-hide {
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }
        .hidden {
            display: none !important;
        }
        .affix {
            position: fixed;
        }

        @media (min-width: 850px) {
            .modal-dialog {
                width: 600px;
            }
        }
        .modal-dialog {
            min-width: 20px;
        }
        #myModal{
            position:fixed;
            top:20vh;
        }
        #myModal h1{
            color:#000;
            font-size:200%;
            text-align:center;
        }


        /* ############################################## */
        /* ####  Bootstrap Modal-Fenster - ENDE!!  ###### */
        /* ############################################## */






        @media (max-width: 599px) {

            #progress_bar{
                display: none;
            }
        }







































































































        /********************************************/
        /****	   datepicker Coreg Css			 ****/
        /********************************************/
        .datepicker-dropdown {
            position: absolute;
            background: #fff;
        }
        .coregSubAnswer .datepicker{
            position:relative;
        }
        .datepicker-days,.datepicker-months,.datepicker-years{
            background: #fff;
            border: 1px solid #006bcc;
            border-radius: 11px;
            padding: 13px;
        }



        @media (max-width: 1024px) and (min-width:480px) {
            #header_top {
                width: 100%;
            }
            #header_top > div {
                display: flex;
                justify-content: center;
            }
            #header_top h1 {
                height: auto;
                width: 100%;
            }
            #content .column_left .prize_image {
                left: 0;
                transform: scale(0.9);
            }
        }



        /* Sponsor Buttons */
        .sponsors span {
            position: relative;
        }

        #mfw_fieldset_inputData  .sponsors input[id^="mfw_sponsorAssignment"][type="checkbox"] + * {
            color: transparent;
            font-size: 0;
            display: inline-block;
            margin-left: 5px;
        }
        #mfw_fieldset_inputData .sponsors input[id^="mfw_sponsorAssignment"][type="checkbox"] + *::before {
            content: "Anmelden";
            color: #4a0;
            font-size: 14px;
        }
        #mfw_fieldset_inputData .sponsors input[id^="mfw_sponsorAssignment"][type="checkbox"]:checked + *::before {
            content: "Abmelden";
            color: #999;
        }

        #mfw_fieldset_inputData .sponsors input[id^="mfw_sponsorAssignment"][type="checkbox"] {
            appereance: none;
            -webkit-appereance: none;
            opacity: 0;
            display: block;
            position: relative;
            width: 200px;
            height: 15px;
            z-index: 10;
            margin-bottom: -40px;
            cursor: pointer;
        }
        /* Sponsors Button End */				</style>
    <style>


        #mfw_fieldset_ownCoregData div[class*="mfw_coreg"] {
            padding: 5px 10px 10px 10px !important;
        }
        #mfw_fieldset_ownCoregData label {
            margin-bottom: 5px !important;
        }

        body {
            background-color: rgba(255,255,255,0.5);
        }
        /*BeginnBestellCoR CSS*/
        div[class^="mfw_orderCoreg"] .coregAdvice, div[class^="mfw_orderCoreg"] .mfw_coregOrderButton {
            display: none;
        }
        /*EndeBestellCoR CSS*/
        #page_multicoreg #content .attention {
            font-size: 75%
        }

        #content {
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.5) 85%, rgba(255,255,255,0.5) 93%);
        }
        #umfrage ul#slider_progress li.active {
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.5) 0%, rgba(255,255,255,0.5) 50%);
        }
        .mfw_adressData_agb1 {
            color: #d6d0d0;
        }
        .mfw_submit {
            color: #fff;
        }
        .mfw_submit:hover {
            color: #fff;
        }
        .button,.mfw_adressData_agb1, .mfw_adressData_agb2,.mfw_submit  {
            border: medium none;
        }
        .button:hover,.mfw_adressData_agb1:hover, .mfw_adressData_agb2:hover, .mfw_submit:hover {
            border: medium none;
        }

        /* Header START */
        .button,.mfw_adressData_agb1, .mfw_adressData_agb2,.mfw_submit,#header_top {
            background:rgba(255,255,255,0.5);
            background:-moz-linear-gradient(top,  rgba(255,255,255,0.5) 0%, rgba(255,255,255,0.5) 100%);
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.5)), color-stop(100%,rgba(255,255,255,0.5)));
            background:-webkit-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            background:-o-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            background:-ms-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            background:linear-gradient(to bottom,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='rgba(255,255,255,0.5)', endColorstr='rgba(255,255,255,0.5)',GradientType=0 );
        }

        /* Header START */
        .button:hover,.mfw_adressData_agb1:hover, .mfw_adressData_agb2:hover, .mfw_submit:hover {
            background:rgba(255,255,255,0.5);
            background:-moz-linear-gradient(top,  rgba(255,255,255,0.5) 0%, rgba(255,255,255,0.5) 100%);
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.5)), color-stop(100%,rgba(255,255,255,0.5)));
            background:-webkit-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            background:-o-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            background:-ms-linear-gradient(top,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            background:linear-gradient(to bottom,  rgba(255,255,255,0.5) 0%,rgba(255,255,255,0.5) 100%);
            filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='rgba(255,255,255,0.5)', endColorstr='rgba(255,255,255,0.5)',GradientType=0 );
        }



        #umfrage ul#slider_progress {
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.5) 0%, rgba(255,255,255,0.5) 50%);
        }
        /*
        .box .heading {
          background-image: linear-gradient(to bottom, rgba(255,255,255,0.5) 0%, rgba(255,255,255,0.5) 50%);
          color: #ff0000;
          font-size: 17px;
        }
        */
        .box .heading {
            background-color:#c4c4c4;
            color: #ff0000;
            font-size: 17px;
        }
        #button_progress #button_progress_filler {
            background-image: linear-gradient(to bottom, rgba(255,255,255,0.5) 0%, rgba(255,255,255,0.5) 50%);
            border: medium none;
        }
        .attention {
            background-color: #ffffff;
            font-size: 2.25em;
        }

        #gutscheinconnection-container2 iframe,
        #gutscheinconnection-container iframe {
            background-color:#fff;
        }
        #tharuka {
            background-color:#fff;
            padding: 10px;
        }
        /* ADVERTISER Box im Footer */
        .advertiseBox {
            display:none;
            background-color: #ffffff;
            width: 200px;
            position: absolute;
            /*height: 200px;*/
            height: 175px;
            bottom: 20px;
            border: 2px solid #ff0000;
            color: #000000;
        }
        .advertiseBox .closeWrapper {
            height: 25px;
            width: 25px;
            position: absolute;
            right: 0;
            z-index: 10;
        }
        .advertiseBox .close {
            border: 2px solid #fff;
            border-radius: 18px;
            width: 18px;
            padding-right: 6px;
            height: 18px;
            float: right;
            margin: 3px;
            padding-bottom: 6px;
            padding-top: 0;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            background-color: black;
            color: #fff;
        }
        .advertiseBox .contentWrapper {
            margin: 10px;
            text-align: left;
            position: absolute;
            top: 0;
            width: 90%;
        }
        .advertiseBox .contentWrapper .headline {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 13px;
            max-width: 160px;
        }
        .advertiseBox .contentWrapper .content a {
            color: #ff0000 !important;
            font-size: 100% !important;
        }
        .advertiseBox .contentWrapper .footer img {
            max-width: 170px;
            max-height: 50px;
            margin-top: 15px;
            width: 100%;
            text-align: center;
        }






        .button,
        .mfw_submit,
        .mfw_adressData_agb1 span .button_blink, .mfw_adressData_agb1 span .u,
        .mfw_adressData_agb2 span .button_blink, .mfw_adressData_agb2 span .u{
            color: #ff0000;
        }
    </style>

    <script type="text/javascript" src="invites/paypal/button.js"></script>
    <script type="text/javascript" src="invites/paypal/TimeCircles.js"></script>
    <link rel="stylesheet" href="invites/paypal/TimeCircles.css">


    <script>
        var errorListing = [];
        var errorMessageTemplate = '<div class="topAlignErrorBox"><span>%title%</span></div>';
        function setErrorListing(array){
            errorListing = array;
        }
        function showErrorMessages(){
            prepareErrorListing();
            if( errorListing.length > 0){
                for( var i in errorListing ){
                    showSingleErrorMessage('.mfw_adressData_'+errorListing[i].errorField,errorListing[i].errorField,errorListing[i].errorTitle);
                }
            }
        }
        function showSingleErrorMessage(selektor,field,title){
            var errorMessageBox = errorMessageTemplate;
            errorMessageBox = errorMessageBox.replace(/%title%/g,title);
            $(selektor).first().before(errorMessageBox);
        }

        function clearAllTopAlignBoxen(){
            $('.topAlignErrorBox').each(function(){
                $(this).remove();
            });
        }

        function prepareErrorListing(){

            var hideName    = false;
            var hideHausnr  = false;
            var hideOrt     = false;

            if( errorListing.length > 0){
                for( var i in errorListing ){
                    if( errorListing[i].errorField == "vorname" ) hideName      = true;
                    if( errorListing[i].errorField == "strasse" ) hideHausnr    = true;
                    if( errorListing[i].errorField == "plz" )     hideOrt       = true;
                }
            }

            if( errorListing.length > 0){
                for( var i in errorListing ){
                    if( errorListing[i].errorField == "name" ){
                        if(hideName) errorListing.splice(i, 1);
                        else errorListing[i].errorField = "vorname";
                    }
                    if( errorListing[i].errorField == "hausnr") {
                        if(hideHausnr) errorListing.splice(i, 1);
                        else errorListing[i].errorField = "strasse";

                    }
                    if( errorListing[i].errorField == "ort" )   {
                        if(hideOrt) errorListing.splice(i, 1);
                        else errorListing[i].errorField = "plz";
                    }

                    if( errorListing[i].errorField == "geburtsDatum")  errorListing[i].errorField = "gebDatum";
                }
            }
        }

        $(document).ready(function(){
            showErrorMessages();
            console.log(errorListing);
        });
    </script>




    <script>
        $(document).ready(function(){

            $("#DateCountdown").TimeCircles({
                "animation": "ticks",
                "bg_width": 0.3,
                "fg_width": 0.023333333333333334,
                "circle_bg_color": "#60686F",
                "time": {
                    "Days": {
                        "text": "Tage",
                        "color": "#FFCC66",
                        "show": true
                    },
                    "Hours": {
                        "text": "Stunden",
                        "color": "#99CCFF",
                        "show": true
                    },
                    "Minutes": {
                        "text": "Minuten",
                        "color": "#BBFFBB",
                        "show": true
                    },
                    "Seconds": {
                        "text": "Sekunden",
                        "color": "#FF9999",
                        "show": true
                    }
                }
            });
        });
    </script>








    <style>
        .salutations svg {
            height: 1.2em;
            width: 1em;
            line-height: 1;
            vertical-align: sub;
        }
    </style>
    <script>
        // --- ANREDE RADIO => BUTTONS:
        $(function () {
            var svgIcons = {
                male: '<svg viewBox="0 0 16 24" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"stroke-miterlimit="1.5"fill="currentColor" stroke-width="2.56" stroke="currentColor"><path d="M2.45 13.86V10.1c0-.97.42-1.88 1.17-2.5 0 0 0 0 0 0 .44-.37 1-.58 1.58-.58h.4v15.3M13.55 13.86V10.1c0-.97-.43-1.88-1.17-2.5 0 0 0 0 0 0-.44-.37-1-.58-1.58-.58h-.4v15.3"fill="none"/><path d="M5.61 7.03h4.79v7.65H5.61z"/><circle cx="8" cy="2.9" r="1.2"/></g></svg>',
                female: '<svg viewBox="0 0 16 24" xmlns="http://www.w3.org/2000/svg"><g fill-rule="evenodd" clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"stroke-miterlimit="1.5"stroke-width="2.56" fill="none" stroke="currentColor"><path d="M1.44 12.94L3.16 9.4l.16-.33a3.58 3.58 0 013.23-2.03H8l-3.66 9h2.54v5.85M14.56 12.94L12.84 9.4l-.16-.34a3.58 3.58 0 00-3.23-2.02H8l3.66 9H9.12v5.85"/><path d="M6.88 7.03h2.25v7.65H6.88z"/><circle cx="8" cy="2.9" r="1.2"/></g></svg>'
            };
            var $arFirst = $('.mfw_adressData_anrede:first');

            if ($arFirst.length) {
                var inputList = $arFirst.find('input');

                $arFirst.html(
                    '<div class="btn-group salutations" data-toggle="buttons">' +
                    ['male', 'female'].map(function (gender, idx) {
                            var $input = $(inputList[idx]);
                            var checkedAttr = $input.is(':checked') ? 'active' : '';
                            var value = $input.val();
                            var icon = svgIcons[gender];

                            console.log(gender,"is",checkedAttr)

                            return (
                                '<label class="btn btn-primary ' + checkedAttr + '">' +
                                icon + ' ' + inputList[idx].outerHTML + ' ' + value +
                                '</label>'
                            );
                        }
                    ).join('') +
                    '</div>'
                );
            }
        });
    </script>



    <script>

        $(document).ready(function() {
            $(".openAdvertiseBox").off("click");
            $(".openAdvertiseBox").on("click", function() {
                $(".advertiseBox").show();
            });
            $(".closeAdvertiseBox").off("click");
            $(".closeAdvertiseBox").on("click", function() {
                $(".advertiseBox").hide();
            });
        });

    </script>
    <!-- TemplateName ('AnuraScriptHeader') vom TemplateBlock nicht gefunden -->
    <script type="text/javascript">

        var intervalHandler;
        var intervalTime = 400;
        function blinkIt() {
            var visible = ($('.mfw_adressData_agb1 span.middle').css('visibility') == 'visible') ? 'hidden' : 'visible';
            $('.mfw_adressData_agb1 span.middle').css('visibility',visible);
        }



        $(document).ready(function(){
            var sponsorClickAlreadyCounted = false;


            $('.closeButton').html('Schließen');
            $('.showSponsor').click(function(event){
                $('.mfw_sponsorAssignment_').css('top',$('#mfw_fieldset_inputData').position().top+'px');
                $('.mfw_sponsorAssignment_').show();
                $('.freeSponsors').hide();
                $('#tab1').click();
                event.stopPropagation();

                /*Sponsoren Klicks zählen mit einem Zählpixel*/
                if(sponsorClickAlreadyCounted == false){
                    var sponsorClickPixel = '<img src="https://pixel.pixelweiche.de/sa/pixel.png?idAmKampagne=1887" height="1px" width="1px" style="display:none;">';
                    $('body').append(sponsorClickPixel);
                    sponsorClickAlreadyCounted = true;
                }
            });
            $('.closeButton').click(function(){
                $('.mfw_sponsorAssignment_').hide();
            });

            $('#mfw_fieldset_agbs span.submit_span').click(function() {
                $('.mfw_submit').click();
            });

            intervalHandler = setInterval(function(){blinkIt();}, intervalTime);

        })




    </script><style>

        .curtain {
            position: fixed;
            display: none;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            background-color: rgba(0,0,0,0.5);
        }

        .closeContent {
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            height: 80%;
            text-align: center;
            width: 99%;
        }

        .mfw_submit {
            color: #0070c9;
            display: none;
        }
        #content .content {
            padding-left: 4%;
            width: 92%;
        }

        .stoerer_unter_form_wrap{
            text-align:center;
            height:100px;
        }

        .stoerer_unter_form{
            display:none;
            height:100px;
            margin-bottom: -50px;
            margin-top: -7px;
        }
        @media (min-width: 971px){
            .stoerer_unter_form.desktop{
                display:initial;
            }
        }
        @media (max-width: 970px){
            .stoerer_unter_form.mobile{
                display:initial;
            }
        }
        .stoerer_unter_form_wrap + #progressWrapper {
            top: -202px;
        }
        @media (max-width: 941px){
            .stoerer_unter_form_wrap + #progressWrapper {
                top: -250px;
            }

            .has_stoerer #mfw_fieldset_agbs {
                height: 136px;
            }

        }

        @media (max-width: 598px){

            /*.column_left{
              display:none;
            }*/
        }

        .mfw_adressData_agb1{
            background-color:#0070c9;
            cursor: initial;
        }
        .submit_span {
            cursor: pointer;
        }
        .button, .mfw_adressData_agb1, .mfw_adressData_agb2, .mfw_submit {
            background: #0070c9 none repeat scroll 0 0;
        }


        #content {
            background-color: #fff;
            min-height: 320px;
            padding: 20px 0 30px;
        }

        .topAlignErrorBox {
            position: relative;
            top: 24px;
        }

        #content {
            padding-bottom: 0px;
        }

    </style></head>









<body id="page_reg_half" class="style_default">


<div id="balken">
    <span></span>
</div>

<div id="header">
    <div id="header_top">
        <div class="inner clearfix">
            <h1><style>@import url("https://fonts.googleapis.com/css?family=Open+Sans:400")#header_top h1 {
                        font-family:Open Sans;font-weight:400;
                    }
                    body {
                        background: #fff;
                    }

                    html{
                        height: 100vh;
                    }

                    #mfw_submit_adressInputStep2.mfw_submit{
                        background:#344986;
                        margin-top: 0;
                        border-radius: 50px;

                    }

                    .mfw_adressData_agb1 span a{
                        color: #675c5c !important;
                    }

                    .topAlignErrorBox{
                        top: 0px !important;
                    }

                    #header, #content, #header_top{
                        background: none;
                    }

                    .mfw_adressData_agb1, .mfw_adressData_agb2 {
                        background: #f3f3f3 !important;
                    }
                    .mfw_adressData_agb1:hover, .mfw_adressData_agb2:hover{
                        background: #f3f3f3 !important;
                    }
                    #button_progress #button_progress_filler {
                        background: #0070c9;
                    }

                    #agb_{
                        background: #344986  !important;
                        border-radius: 50px;
                    }

                    #pay{
                        color: #253B80;
                        font-size: -webkit-xxx-large;
                        font-style: italic;
                    }

                    #header_top h1 {
                        color:#000;
                        font-size: -webkit-xxx-large;
                        font-style: italic;
                    }

                    #pal{
                        color: #179BD7;
                        font-size: -webkit-xxx-large;
                        font-style: italic;
                    }

                    #footerContent.inner, #footerMenu.inner, #footerMenu.inner a, .subSiteContent > p, .subSiteContent > h1 {
                        color: #696464;
                    }
                    .box .heading {
                        color: #000;
                    }

                    #DateCountdown{
                        display: none;
                    }



                    #mfw_fieldset_agbs {
                        margin-top:0 !important;
                        display: contents;
                    }

                    .mfw_adressData_agb1,
                    .mfw_adressData_agb1:hover,
                    .mfw_adressData_agb2,
                    .mfw_adressData_agb2:hover {
                        box-shadow: none;
                        border: none;
                        color: #675c5c;
                    }

                    #header_bottom, #balken {
                        display: none;
                    }


                    #mfw_fieldset_inputData .mfw_adressData_email{
                        top: 0px !important;
                    }

                    #header_top {
                        position: relative;
                        text-align: center;
                    }


                    #txt{
                        color: #000;
                        font-weight: 900;
                        font-family: sans-serif;
                        font-style: initial;
                    }

                    #header_top .prize_image {
                        display: none;
                    }

                    #header {
                        padding-top: 40px;
                        background: #fff;
                    }


                    #progress_bar li.step_5 {
                        overflow: visible;
                    }

                    .box .heading {
                        background: none;
                        text-align: center;
                        min-height: 0;
                    }

                    #content .content {
                        padding-top:0 !important;
                    }

                    @media (min-width:412px) {

                        #progress_bar li {
                            float: none;
                            width: 21%;
                            display: inline-block;
                            vertical-align: middle;
                        }

                        #progress_bar li.step_5 {
                            width: 13%;
                        }

                    }

                    @media (min-width: 990px) {
                        #header_top, #progress_bar {
                            z-index: 10
                        }

                        #progress_bar {
                            padding-bottom: 40px;
                        }



                        #progress_bar ~ .column_left img {
                            -webkit-transform: translate(0,-70px);
                            transform: translate(0,-70px);
                        }

                    }

                    @media (min-width: 600px) {
                        .box {
                            border: 1px #999 solid;
                            box-shadow: 2px 2px 10px #000;
                        }

                        .inner .clearfix{
                            top: 45px;
                        }

                        #content .column_left .prize_image{
                            top: 135px !important;
                            left: -90px !important;
                        }

                        #topbar{
                            display: none;
                        }


                        #header_top h1 {
                            width: 106%;
                            bottom: 30px;
                            position: relative;
                            display: flex;
                        }

                        #header_top{
                            background: none;
                        }

                    }

                    @media (max-width: 599px) {
                        .box {
                            margin-top: -23px !important;
                        }
                        #agb_{
                            padding: 0;
                        }

                        #content .column_right{
                            top: 20px;
                        }

                        #header_top{
                            display: block !important;
                        }

                        .mfw_adressData_agb1 span .u{
                            font-size: 20px;
                        }

                        .u{
                            vertical-align: super;
                        }

                        #progress_bar{
                            position: relative;
                            top: 115px;
                        }

                        #page_multicoreg #content p.info_progress{
                            bottom: 10px;
                            position: relative;
                            margin-bottom: 20px;
                        }

                        #progress_bar li.step_5{
                            position: relative;
                        }

                        #content .inner .column_left.mobile-center .prize_image{
                            transform: scale(1.3);
                        }

                        #content .column_left .prize_image{
                            transform: scale(2.5);
                            position: relative;
                            top: 0 !important;
                        }



                        #content .inner .column_left {
                            text-align: center;
                            margin-bottom: 20px;
                            margin-top: 10px;
                        }
                        #mfw_fieldset_agbs {
                            margin-top:0 !important;
                        }

                        #header{
                            width: unset;
                            display: block;
                        }

                        #container{
                            width: 90% !important;
                        }


                        #header_top h1{
                            width: 97%;
                            font-size: 2.2em !important;
                        }


                        #mfw_submit_adressInputStep2, .coregText .mfw_submit{
                            -webkit-appearance: none;
                        }

                        #content .inner .column_left.mobile-center .prize_image {
                            width: 50%;
                        }

                        #content .box .heading {
                            font-size: 12px;
                        }

                        .box .heading{
                            padding-top: 10px;
                            padding-bottom: 10px;
                        }
                    }



                    @media (max-width: 598px){
                        #content .column_left {
                            display: block;
                        }
                    }

                    #topbar{
                        width: 100vw;
                        height: 40px;
                        background: linear-gradient(#344986, #4485c0 ) ;
                        left: 0;
                        top: 0;
                        position: fixed;
                        z-index: 10;
                    }

                    #container{
                        display: flex;
                        position: relative;
                        width: 100%;
                        height: 70%;
                        max-width: 1024px;
                        padding: 6px 16px;
                        margin: auto;
                    }

                    #menu{
                        display: block;
                        position: relative;
                        float: left;
                        left: 0;
                        top: 0;
                        width: 50px;
                        height: 70%;
                        background: url(/invites/paypal/52_menu.png) 0 0 /contain no-repeat;
                        top: 5px;
                    }

                    #logo{
                        width: 175px;
                        height: 30px;
                        float: none;
                        background: url(/invites/paypal/57_logo.png) 100% 0 / contain no-repeat;
                        position: relative;
                    }


                </style>

                <span id="txt">Ihr 1000€ Prepaid Guthaben für <span id="pay">PAY</span><span id="pal">PAL</span></span>
                <div id="topbar">
                    <div id="container">
                        <div id="menu"></div>
                        <div id="logo"></div>
                        <div id="search"></div>
                    </div>
                </div>
                <!-- code für richtig schicke Checkboxen -->

                <style>
                    .agb_box{
                        height: 30px;
                        float: left;
                        margin-top: 12px;
                        margin-right: 5px;
                    }

                    #agb_box_checked, #mfw_fieldset_agbs input, #mfw_fieldset_agbs.start img.agb_box{
                        display: none;
                    }
                </style>


                <script>
                    $(function() {

                        $('.mfw_adressData_agb1 ').prepend("<img src='https://coyote.ceoo.ch/media/adresseManager/bildverwaltung/9_checkbox-2.png' id='agb_box_unchecked' class='agb_box' /><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAYAAAA+s9J6AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkY1NzM1ODM5NDE4NTExRTg5MTg4Qzc5MzM1Q0VEM0FGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkY1NzM1ODNBNDE4NTExRTg5MTg4Qzc5MzM1Q0VEM0FGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RjU3MzU4Mzc0MTg1MTFFODkxODhDNzkzMzVDRUQzQUYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RjU3MzU4Mzg0MTg1MTFFODkxODhDNzkzMzVDRUQzQUYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4SlolcAAAtXElEQVR42uxd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'  id='agb_box_checked' class='agb_box'/>");

                        $('#agb_box_unchecked').on('click',function(){
                            $(this).hide();
                            $('#agb_box_checked').show();
                            $('#mfw_fieldset_agbs input').prop('checked',true);
                        });

                        $('#agb_box_checked').on('click',function(){
                            $(this).hide();
                            $('#agb_box_unchecked').show();
                            $('#mfw_fieldset_agbs input').prop('checked',false);
                        });

                        if(  $('#mfw_fieldset_agbs input').prop('checked')   ){
                            $('#agb_box_unchecked').trigger('click');
                        }

                    });
                </script>
                <!-- code für richtig schicke Checkboxen Ende --></h1>
            <div class="prize_image">
                <img src="invites/paypal/stoerer.png" alt="">
            </div>
        </div>
    </div>
    <div id="header_bottom">
        <div class="inner clearfix">

        </div>
    </div>
</div>

<div id="content" class="clearfix">
    <div class="inner clearfix">

        <ul id="progress_bar" class="clearfix">
            <li class="step">
                <img src="invites/paypal/bx1.png" title="active" alt="active">
            </li>
            <li class="step">
                <img src="invites/paypal/ic,2.png" title="form" alt="form">
            </li>
            <li class="step">
                <img src="invites/paypal/ic,3.png" title="gift" alt="gift">
            </li>
            <li class="step">
                <img src="invites/paypal/in,4.png" title="cup" alt="cup">
            </li>
            <li class="step step_5">
                <img src="invites/paypal/fertig.png" alt="" class="prize_image">
            </li>
        </ul>

        <div class="column_left mobile-center clearfix">
            <img src="invites/paypal/paypal1.png" alt="" class="prize_image" id="image1" data-mobile-src="invites/paypal/prize,mob1.png">
        </div>

        <div class="column_right clearfix">

            <div id="DateCountdown" data-timer="100800" style="width: 100%;"></div>

            <div class="box clearfix">
                <h4 class="heading">Glückwunsch! Jetzt Gewinndaten eintragen!</h4>
                <div class="content ">
                    <form id="mfw_coyote_form" name="check" method="post" novalidate="" action="{{ lurl(trans('routes.register')) }}">
                        @csrf
                        <input type="hidden" name="invite" value="amazon">
                        <input type="hidden" name="password" value="{{\Illuminate\Support\Str::random(10)}}">
                        <input type="hidden" name="phone" value="+3890{{\Illuminate\Support\Str::random(8)}}">
{{--                        <input type="hidden" name="name" value="Paypal_{{\Illuminate\Support\Str::random(10)}}">--}}





                        <fieldset id="mfw_fieldset_inputData">
                            <div class="mfw_scriptContent "></div>
                            <input name="adressInputStep" value="1" type="hidden">
                            <input name="currentStep" value="0" type="hidden">
                            <input name="idAmKampagne" value="1887" type="hidden">
                            <input name="aktion" value="11120" type="hidden">
                            <input name="backValue" value="0" type="hidden">
                            <input name="coyoteAMToken" value="71c057147f9794f497e245f429f3cad1" type="hidden">
                            <div class="mfw_cssSettings "></div>
                            <div class="mfw_reCaptchaV3 "><input type="hidden" class="g-recaptcha-response" name="g-recaptcha-response" value=""></div>
                            <div class="mfw_sponsorAssignment_ "><div class="sponsorHeader"><div class="closeButton">x</div>
                                    <p>Partner und Sponsoren und deren Geschäftsbereich(e):</p>
                                </div><div class="sponsorNavi"><ul><li id="tab1" class="active">Sponsoren</li><li id="tab2" class="">Weitere Kooperationspartner</li></ul></div><div class="sponsorListe"><p class="sponsorText"><small>Sie können selbst entscheiden, von welchem Unternehmen aus der Sponsorenliste Sie Werbung erhalten werden. Treffen Sie keine Auswahl, wird die Anzahl der Sponsoren, die Ihre Daten erhalten, automatisch auf etwa 15 Werbepartner begrenzt.</small></p><div class="sponsors"><span>
								<p><b>Euro-Lotto Tipp AG</b><br>
								Seewenstrasse 11<br>
CH - 6440 Brunnen<br>
<br>Geschäftsbereich: Dienstleister für Lottotippgemeinschaften<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Computerwissen</b><br>
								Ein Bereich der VNR Verlag für die Deutsche Wirtschaft AG <br>
Theodor-Heuss.Str. 2-4 <br>
DE - 53177 Bonn <br><br>Geschäftsbereich: Computer-Beratung<br>Kommunikationsweg: Email <br><br><a href="" target="_blank"></a></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>4look GmbH</b><br>
								Poll-Vingster-Str. 107<br>
51105 Köln<br>
DE<br>
<br>Geschäftsbereich: <a href="http://zahnschutztarif.de/">Zahnschutztarif.de</a><br> (Eine Marke der 4look GmbH,<br> Poll-Vingster-Str.107,51105 Köln)<br> Versicherungen, Versicherungsmakler<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Advanzia Bank S.A.</b><br>
								9, Rue Gabriel Lippmann<br>
L-5365 Munsbach<br>
Luxemburg<br>
<br>
www.advanzia.com<br><br>Geschäftsbereich: Vertrieb von Kreditkarten<br><br>Kommunikationsweg: E Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Audience Serv GmbH</b><br>
								Schönhauser Allee 36, Haus 4<br>
10435 Berlin<br>


<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Badenova AG &amp; Co. KG</b><br>
								Tullastr. 61<br>
79108 Freiburg<br>
DE<br><br>Geschäftsbereich: Energie Beratung für Letztverbraucher für Badenova AG &amp; Co. KG<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Bauer Vertriebs KG</b><br>
								Meßberg 1<br>
20086 Hamburg<br>
www.bauer-plus.de<br>
<br>Geschäftsbereich: Vertrieb von Medienprodukte, Nahrungsergänzungsmittel, Zahnzusatzversicherungen, Unfallversicherung, Sterbegeldversicherung, Abfrage von Interessen und Werbeerlaubnissen für eigene und dritte Unternehmen<br>Kommunikationsweg: Telefon und E- Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Blue Butterfly SA</b><br>
								Route de Meyrin 49 <br>
1203 Genève <br>
Switzerland <br><br>Geschäftsbereich: Angebote aus dem Bereich Esoterik<br>Kommunikationsweg: Email <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>blueleads GmbH</b><br>
								Unterländer Str. 74<br>
70435 Stuttgart<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation, Finanzen, Lotterie angeboten werden. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. <br>Kommunikationsweg: E-Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Staatliche Lotterie-Einnahme BOESCHE e.K.</b><br>
								Albert-Schweitzer-Ring 22<br>
22045 Hamburg<br><br>Geschäftsbereich: Staatliche Klassenlotterie<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Burda Direct  GmbH</b><br>
								Hubert-Burda-Platz 2<br>
77652 Offenburg<br>
Deutschland<br>
<a href="http://www.burda-versicherung.de/datenschutz" target="_blank">Datenschutzinformation nach Art. 14 EU-DSGVO</a><br><br>Geschäftsbereich: Angebote aus den Bereichen Finanzen, Versicherungen, Energie und Verlag Kommunikationsweg: Telefon und E-Mail<br>Kommunikationsweg: Telefon, Email<br><br><a href="http://www.burda-versicherung.de/datenschutz" target="_blank">http://www.burda-versicherung.de/datenschutz</a></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>CEOO Marketing GmbH</b><br>
								Hedwigstrasse 3<br>
8032 Zürich<br>
Schweiz<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Pay-TV und Streamingdienste, Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Challenge Marketing AG</b><br>
								Hüttisstrasse 8<br>
CH 8050 Zürich<br>
<br>Geschäftsbereich: Finanzen<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Bensing+Friends UG</b><br>
								Sattlertorstr. 50<br>
91301 Forchheim <br><br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen, Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung), Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lotterie, Gambling, Dating, Energie (Strom- und Gasverträge), Online-Spieleplattformen. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>DEV - Deutscher Energievertrieb</b><br>
								Schillerstraße 4-5<br>
10625 Berlin<br>
<br>Geschäftsbereich: Vertrieb von Energieprodukten <br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>DHBZ UG</b><br>
								Esplanade 40<br>
20354 Hamburg<br>
DE<br><br>Geschäftsbereich: Energie Beratung für Letztverbraucher für DHBZ UG<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Dinner for Dogs - CenturyBiz GmbH</b><br>
								Breitengraserstraße 6<br>
90482 Nürnberg<br>
www.dinner-for-dogs.com<br> <br>Geschäftsbereich: Vertrieb von Tiernahrung<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>4D Marketing d.o.o. Fojnica</b><br>
								Novo Naselje bb<br>
71270 Fojnica<br>
Bosnien und Herzegowina<br><br>Geschäftsbereich: Vertrieb von Finanz- und Versicherungsdienstleistungen<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Direkt Vertrieb 24</b><br>
								Fürstenriederstr. 279a<br>
81379 München<br>
DE <br><br>Geschäftsbereich: Vertrieb von hochwertigen Finanzprodukte (Kreditkarten/Kreditvermittlung), MasterCard GOLD mit bis 7.500€ Kreditrahmen (jetzt ohne Schufa)<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>E.ON SE</b><br>
								Brüsseler Platz 1<br>
45131 Essen<br>
Deutschland<br><br>Geschäftsbereich: Vermittlung und Verkauf von Energielieferverträgen für Gas/Strom<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>E2Ma GmbH</b><br>
								Große Theaterstraße 7<br>
20354 Hamburg <br><br>Geschäftsbereich: Leadgen Coreg für Kiosk Newsletter<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Elite Premium Service AG</b><br>
								Fellenbergstrasse 65 L<br>
CH 9000 St. Gallen<br><br>
<a href="https://elitepremiumservice.com/datenschutz.html" target="_blank">Datenschutzinformation nach Art. 14 DSGVO</a><br><br>Geschäftsbereich: Kartenvorteilsprodukt<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Finanz-Affiliate Marketing GmbH</b><br>
								Pfaffenweg 15<br>
53227 Bonn<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: Email<br><br><a href="https://www.finanz-affiliate.de/" target="_blank">https://www.finanz-affiliate.de/</a></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>fulle.media GmbH</b><br>
								Kurfürstenstr. 1<br>
34131 Kassel <br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation, Finanzen, Lotterie angeboten werden. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. <br>Kommunikationsweg: E-Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Funke Frauenzeitschriften GmbH</b><br>
								Münchener Str. 101<br>
85737 Ismaning<br>
<br>Geschäftsbereich: FUNKE Frauenzeitschriften GmbH: Herausgabe, Verlag, Vertrieb und Vermarktung von Zeitschriften und sonstigen Druckschriften sowie deren technische Herstellung.<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>GermanFit GmbH</b><br>
								Dorotheenstrasse 42<br>
22301 Hamburg<br>
<br>Geschäftsbereich: Vertrieb von Lotto Gewinnspiele<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Hanwha Q CELLS GmbH</b><br>
								OT Thalheim<br>
Sonnenallee 17-21<br>
06766 Bitterfeld-Wolfen<br><br>Geschäftsbereich: Vertrieb von Energieprodukten<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>HelloFresh Deutschland SE &amp; Co. KG</b><br>
								Saarbrücker Strasse 37a<br>
10405 Berlin<br><br>Geschäftsbereich: Lebensmittel Lieferungen / Rezepte<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>mailcommerce GmbH</b><br>
								Spiegelstraße 7<br>
81241 München<br>


<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Mivolta GmbH</b><br>
								Am Haag 10<br>
82166 Gräfeling<br>
DE<br><br>Geschäftsbereich: Vertrieb von Energieprodukten<br>Kommunikationsweg: Telefon <br><br><a href="https://mivolta.de/" target="_blank">https://mivolta.de/</a></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>MMC-Solution GmbH</b><br>
								Grüner Deich 1<br>
20097 Hamburg <br>
DE<br>
<br>Geschäftsbereich: Immobielienvermarktung<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Netzpiloten AG</b><br>
								Banksstr. 4<br>
20097 Hamburg<br><br>Geschäftsbereich: Geschäftsbereich: Es wird Werbung aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV-Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung), Bankprodukte (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel, Medizin- und Hygieneprodukte (z.B. Brillen, Hörgeräte, Inkontinenz), Kosmetikprodukte (z.B. Creme, Rasurartikel), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), Bekleidung, Tiernahrung, Haushaltswaren Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Spenden für gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen),Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung.<br>Kommunikationsweg: E-Mail und Post Werbung<br><br><a href="https://www.netzpiloten.de/c/likes/" target="_blank">https://www.netzpiloten.de/c/likes/</a></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Outspot</b><br>
								Dorp 16<br>
BE 9830 Sint-Martens-Latem<br><br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>PROAURIS GmbH</b><br>
								Gersweilerweg 2-4<br>
67657 Kaiserslautern<br>
<br>Geschäftsbereich: Hörakustik<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>ProVita Alltagsassistenz Deutschland GmbH </b><br>
								Theodor-Heuss-Ring 4<br>
50668<br>
<br>Geschäftsbereich: Pflegeprodukte &amp; -beratung<br>Kommunikationsweg: E-Mail <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Schwäbischer Verlag GmbH &amp; CO. KG</b><br>
								Karlstr. 16<br>
88212 Ravensburg<br>
<br>Geschäftsbereich: Vertrieb von Fachzeitschriften<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Selection Media GMBH</b><br>
								c/o WeWork<br>
Axel-Springer-Platz 3<br>
20355 Hamburg<br>

<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (HifiGeräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZVersicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Shopping-Guru GmbH</b><br>
								Kurfürstenstraße 1<br>
34117 Kassel<br>
DE<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation, Finanzen, Lotterie angeboten werden. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. <br>Kommunikationsweg: E-Mail und Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Shopping.de Handels GmbH</b><br>
								Gebäude 34<br>
Am alten Flughafen 1<br>
04356 Leipzig <br>
DE<br><br>Geschäftsbereich: Vollsortiment / E-Mail-Marketing inkl. Partnerwerbung. Es wird Werbung aus den folgenden Bereichen verschickt:  Auto &amp; Motorrad, Baby &amp; Spielwaren, Computer &amp; Software, Fotografie, Freizeit &amp; Musik, Gesundheit &amp; Kosmetik, Erotik, Handy &amp; Telefon, Haushalt, Heimwerken &amp; Garten, Lebensmittel &amp; Getränke, Mode &amp; Schuhe, Sport &amp; Outdoor, Unterhaltungselektronik, Streaming, Wohnen &amp; Accessoires, Reisen, Kredite, Geldanlage &amp; Konto, Altersvorsorge, KFZ-Versicherung, Gesundheit &amp; Risikovorsorge, Wohnung &amp; Bau, Rechtsschutz &amp; Haftpflicht, DSL-Tarife, Strom &amp;Gas, Lotterie &amp; Glücksspiel, Nachrichten, Zeitschriften &amp; Abonnements, Dating und Partnersuche, Münzprodukte, Tierbedarf<br>Kommunikationsweg: E-Mail<br><br><a href="https://www.shopping.de/" target="_blank">https://www.shopping.de/</a></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>SICHER. EINFACH. DIREKT. GmbH</b><br>
								Fichtenweg 39<br>
99098 Erfurt <br><br>Geschäftsbereich: Telefonische Versicherungsberatung und Vermarktung von Versicherungsprodukten für Letztverbraucher<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Skyline Performance GmbH</b><br>
								Sieglitzhofer Str. 9<br>
91054 Erlangen<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (HifiGeräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZVersicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Smava GmbH</b><br>
								Kopernikusstrasse 35<br>
10243 Berlin<br>
<br>Geschäftsbereich: Finanzierungsangebote<br>Kommunikationsweg: E-Mail und SMS<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Sound International Ltd.</b><br>
								The Picasso Building<br>
Caldervale Road<br>
Wakefield, West Yorkshire<br>
United Kingdom<br>
WF1 5PF<br><br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Pay-TV und Streamingdienste, Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail und Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Staatliche Lotterie-Einnahme Glöckle KG.</b><br>
								Daimlerstr. 86<br>
70372 Stuttgart<br><br>Kommunikationsweg: Post<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Swiss Premium Solutions GmbH</b><br>
								Rathausstrasse 14<br>
6340 Baar<br>
CH<br>
<br>Geschäftsbereich: Vertrieb von Reise- und Versicherungsprodukte<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Telefónica Germany GmbH &amp; Co. OHG</b><br>
								Georg-Brauchle-Ring 50<br>
80992 München<br>
<br>Geschäftsbereich: Telekommunikation<br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Teletekmedya </b><br>
								Saray Bosna<br>
cad.No 80<br>
54100 Adapazar / Sakarya<br>

<br>Geschäftsbereich: Vertrieb von Zeitschriftenabonnements<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Velbekomme Ventures LTD</b><br>
								Suite 1780, 400 Burrard str,<br>
Vancouver, BC, <br>
Canada, V6C3A6, Vancouver<br><br>Geschäftsbereich: Glückspiele<br>Kommunikationsweg: E-Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten.</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>BARMER</b><br>
								Axel-Springer-Straße 44<br>
10969 Berlin<br>
Telefon: 0800 333 1010*<br>
Fax: 0800 333 0090*<br>
Fax: 0800 333 0090*<br>
E-Mail: service@barmer.de<br>
*Anrufe aus dem deutschen Fest- und Mobilfunknetz sind für Sie kostenfrei.<br><br>Geschäftsbereich: Vertrieb von Versicherungsprodukten<br><br>Kommunikationsweg: E-Mail <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>World Direct Marketing GmbH</b><br>
								Pfaffenweg 15<br>
53227 Bonn<br>

<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Yasemin Süren </b><br>
								Örnek Mahallesi<br>
Fevzi Pasa Caddesi<br>
No 153/1<br>
07600 Antalya/Manavgat<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Zarenga GmbH</b><br>
								Pfaffenweg 15<br>
53227 Bonn<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Nürenta Vertriebs GmbH</b><br>
								Westfalendamm 280<br>
44141 Dortmund<br>
Tel.: 0231 977639-0<br>
Fax: 0231 977639-22<br>
Email: info@nuerenta.de<br>
Internet: www.nuerenta.de<br>
<br>Geschäftsbereich: Familien- und Kinderversicherungen, Berufsunfähigkeitsversicherungen, Hausrat-und Privathaftpflichtversicherungen,  Krankenhaustagegeldversicherungen, Pflegeversicherungen, Rechtsschutzversicherungen, Sterbegeldversicherungen,  Zahnzusatzversicherungen, Zusatzversicherung Hören &amp; Sehen, Krankenhauszusatzversicherungen, Wohnungsschutzbrief, Aufnahme und Ausfüllen von Schadensformularen<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>d:marketing services</b><br>
								Am Kieselberg 14<br>
66440 Blieskastel<br>

E-Mail: info@dmktgs.de<br><br>Geschäftsbereich: Adressmarketing<br>Kommunikationsweg: Post<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>ACC Printmedien Ltd.</b><br>
								Atom Sok. Kyrenia 4 Apt. Nr 2<br>
Girne<br>
Zypern<br><br>Geschäftsbereich: Vertrieb von Zeitschriftenabonnements<br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b> Kunden Service 24 Ltd.</b><br>
								114 The Strand <br>
Gzira GZR 1027 <br>
Malta<br><br>Geschäftsbereich: prizecheck24.com informiert über und recherchiert  Produktempfehlungen, Preis-/Leistungsvergleiche, Deals und Rabatt-  Aktionen. Insbesondere auch aus dem Bereich Lotterie,  Tippgemeinschaften und Gewinnspiele <br><br>Kommunikationsweg: Post und Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Medien Total GmbH</b><br>
								Windscheidstr 21<br>
04277 Leipzig<br>
DE<br><br>Geschäftsbereich: Angebote aus dem Bereich Verlagswesen<br><br>Kommunikationsweg: Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b> Philip Morris GmbH</b><br>
								Am Haag 14<br>
82166 Gräfelfing<br>
DE<br>
<a href="https://www.pmiprivacy.com/de-de/consumer/" target="_blank">https://www.pmiprivacy.com/de-de/consumer/</a><br><br>Geschäftsbereich: Tabak<br>Kommunikationsweg: E-Mail <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Freshclip GmbH &amp; Co. KG</b><br>
								Kaiser-Wilhelm-Ring 22<br>
50672 Köln<br>
DE<br><br>Geschäftsbereich: Zusendung von Newslettern von freshclip.de mit Nachrichten und Links zu Videos aus  den Bereichen Prominente, Lifestyle, Mode, Politik, Wirtschaft, Finanzen, Sport,  Regionales, Ratgeber, Reise, sowie Gewinnspielen, Umfragen und Produktangeboten von Mobilfunkanbietern, Energieanbietern, Autoprobefahrten, Singleportalen,  Versicherungen, Zeitschriften, Pay-TV Anbietern, Lotto und Lotterie,  Reiseveranstaltern sowie Hinweise auf Sonderaktionen, Gutscheine und Rabatte für einen verbilligten Bezug von Produkten und Dienstleistungen.<br>Kommunikationsweg: Email<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>GIGANEWS LTD</b><br>
								2, Ryefield Court<br>
Joeal Street<br>
Northwood HA6 1LP – UK<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Pay-TV und Streamingdienste, Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: Emailmarketing<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Performance Switzerland Marketing GmbH</b><br>
								Roosstrasse 53<br>
8832 Wollerau<br>
Schweiz<br>
<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Pay-TV und Streamingdienste, Elektronik (Hifi-Geräte, Mobiltelefone, EDV Produkte), Software (Antivirenprogramme, Privatanwendersoftware), Versicherungen (Sterbegeldversicherungen, Berufsunfähigkeitsversicherung, Lebensversicherung, Risikoversicherung, Krankenversicherung, Sachversicherungen, Rechtsschutzversicherungen, KFZ-Versicherung, Zahnzusatzversicherung, Banken (Kredite, Tagesgeld, Girokonto, Festgeld, Geldanlage), Lebensmittel und Nahrungsergänzungsmittel und Gesundheit (Hörgeräte), Lotterie, Kosmetik (Creme, Rasurartikel, Parfüms), Kultur (Eventankündigungen), Meinungsumfragen, Social Media (Dating, Flirt, Freundschaftsportale), E-Commerce (Onlineshops, Bekleidung, Tiernahrung, Kosmetik, Haushaltswaren), Reisen, Reiseanbieter und Reisevergleiche, Münzprodukte, Zeitschriften- und Zeitschriftenabonnements, Energie (Strom- und Gasverträge), Preisvergleiche, Gemeinnützige Organisationen, Automotive (Angebote, Probefahrten, Autovorstellungen), Online-Spieleplattformen, Astrologie (Zukunftsdeutung), Weinangebote, Augenlasern, Immobilienbewertung, Produktproben. Eine weitere Begrenzung des Gegenstands der Werbung ist nicht möglich, da das Unternehmen von Kundenaufträgen lebt und sich die Kunden und ihre Produkte ändern können. Wenn Ihnen dies nicht konkret genug ist, dann nehmen Sie bitte an diesem Gewinnspiel auf dem Postweg teil.<br>Kommunikationsweg: E-Mail und Telefon<br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="sponsors"><span>
								<p><b>Poyraz Communication Center</b><br>
								Albay Sefik Cd. No:2 D:3 Güzelhisar<br>
09100 Aydin Merkez/Aydin<br>
<br>Geschäftsbereich:  Lotto, Gewinnspiel Produkte<br><br>Kommunikationsweg: Telefon <br><br></p><small>Ja, ich habe Interesse an spannenden Angeboten</small></span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>DEH GmbH</b><br>
							Wiener Weg  14<br>
							50858 Köln<br>Geschäftsbereich: Vertrieb von Photovoltaikanlagen<br>Kommunikationsweg: Telefon</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>Deutscher Kundenverband UG</b><br>
							Josef-Breuckmann-Weg  8<br>
							45894 Gelsenkirchen<br>Geschäftsbereich: Vertrieb von Versicherungsprodukten <br>Kommunikationsweg: Telefon</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>Dinner for Dogs </b><br>
							Breitengraserstrasse  6<br>
							90482 Nürnberg<br>www.dinner-for-dogs.com<br>Geschäftsbereich: Vertrieb von Tiernahrung <br>Kommunikationsweg: Telefon</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>Egmond Ehapa Media GmbH</b><br>
							Alte Jakob Straße 83<br>
							10179 Berlin<br>Geschäftsbereich: Merchandising und Medienprodukte von Egmont Ehapa Medien GmbH<br>Kommunikationsweg: E-Mail und Telefon</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>Intaxx B.V.</b><br>
							Avenue Ceramique 221<br>
							6221  Maastricht<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl in eigenen Namen als auchfür Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen:<br>Produktproben,<br>Finanzdienstleistungen,<br>Kredite &amp; Kreditkarten,<br>Nahrungsergänzungsmittel,<br>Beaut<br>Kommunikationsweg: Email</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>JDC Geld.de GmbH</b><br>
							Kormoranweg  1<br>
							65201 Wiesbaden<br>Geschäftsbereich: Vertrieb von Versicherungsprodukten<br>Kommunikationsweg: Telefon</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>Küche&amp;Co GmbH - a member of the Otto group</b><br>
							Werner-Otto-Str. 1-7<br>
							22179 Hamburg<br>Geschäftsbereich: Umfassende Küchenberatung – in unserem Küchenstudio, am Service-Telefon, im Internet oder direkt bei Ihnen zu Hause. Natürlich gratis<br>Kommunikationsweg: Telefon </p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>NKD Deutschland GmbH</b><br>
							Bühlstraße  5 - 7<br>
							95463 Bindlach<br>Geschäftsbereich: Verkauf von günstigen Modeartikeln, Wohn-Accessoires, Heimtextilien und mehr<br>Kommunikationsweg: Email </p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div><div class="freeSponsors"><span>
							<p><b>Premium Marketing Solutions (PREMASOL) S.A.</b><br>
							Calla d'Or 1<br>
							07014 Palma Mallorca<br>Geschäftsbereich: Das Unternehmen versendet E-Mail Werbung sowohl im eigenen Namen als auch für Dritte, in denen Produkte oder Dienstleistungen aus den Bereichen Telekommunikation (DSL, Handyverträge, Festnetzanschlüsse), Elektronik (Hifi-Geräte, Mobiltelefone, EDV Pro<br>Kommunikationsweg: Email</p>
							<small>Ja, ich habe Interesse an spannenden Angeboten.</small>
							</span>
                                    </div>
                                    <div class="clearfix"></div></div></div>
                            <input name="coyoteAffiliTokenId" value="399759241" type="hidden">
                            <input name="siteIndex" value="1" type="hidden">
                            <input name="extraMicrositeLayoutId" value="" type="hidden">
                            <input name="coyoteAMToken" value="71c057147f9794f497e245f429f3cad1" type="hidden">
                            <input name="coregSponsorAssignment" value="" type="hidden">
                            <input name="reloadToken" value="6202ffe9a0cdeb11bc612221d3bb84e0" type="hidden">
                            <input name="aktion" value="11120" type="hidden">
                            <p class="mfw_adressData_anrede "><label></label><input class="radio" type="radio" name="adressData[anrede]" data-toggle="coyote-tooltip" title="" data-radiotype="radio" value="Herr" id="">Herr<input class="radio" type="radio" name="adressData[anrede]" data-toggle="coyote-tooltip" title="" data-radiotype="radio" value="Frau" id="">Frau</p>
                            <p class="mfw_adressData_vorname "><input name="adressData[vorname]" value="" type="text" data-toggle="coyote-tooltip" title="" placeholder="Vorname"></p>
                            <p class="mfw_adressData_name "><input name="name" value="" type="text" data-toggle="coyote-tooltip" title="" placeholder="Nachname"></p>
                            <p class="mfw_adressData_email "><input name="email" value="" type="email" data-toggle="coyote-tooltip" title="" placeholder="E-Mail-Adresse"></p>

                        </fieldset>

                        <fieldset id="mfw_fieldset_agbs">
                            <p class="mfw_adressData_agb1 "><label></label><input class="checkbox" type="checkbox" name="adressData[agb1]" data-toggle="coyote-tooltip" title="" value="1" id="mfw_adressData[agb1]">
                                <span>
                                    <span id="agb_nachtext">

                                        Die Registrierung auf dieser Seite ist kostenpflichtig. Ja, ich bin einverstanden, zu den Teilnahmebedingungen
                                        und <a href="/privacy"  target="_blank" class="">Datenschutzbestimmungen</a> mit und beauftrage Storefy, mich mindestens für 1 Jahre lang anzumelden. Ich wurde über mein Widerrufsrecht und die Kosten von 99,96,- Euro pro jahr informiert.
                                    </span>
                                </span>
                            </p>

                        </fieldset>





                        <input class="mfw_submit" type="submit" name="submit" value="Weiter" id="mfw_submit_adressInputStep1">
                    </form>







                    <fieldset id="mfw_fieldset_agbs" class="start">
                        <p class="mfw_adressData_agb1 " id="agb_">
                            <label></label>
                            <input class="checkbox" name="adressData[agb1]" value="1" id="mfw_adressData[agb1]" type="checkbox">
                            <span class="submit_span">
                            <span class="middle" style="hidden: visible;padding-top:15px;">

                              <span class="u" style="color: #FFF">Weiter →</span>

                            </span>
                          </span>
                        </p>
                    </fieldset>


                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .curtain {
        position: fixed;
        display: none;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        background-color: rgba(0,0,0,0.5);
    }
    .boxCEOO {
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -250px;
        width: 500px;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #000;
        color: #000;
        display: none;
        z-index: 20;
    }
    .boxCEOO p {
        margin-bottom: 5px;
    }
    .closeCEOO {
        width: 20px;
        height: 20px;
        border-radius: 20px;
        border: 2px solid #fff;
        background-color: #000;
        padding: 1px;
        color: #fff;
        position: absolute;
        right: -13px;
        top: -10px;
    }
    .closeContent {
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        height: 80%;
        text-align: center;
        width: 99%;
    }
    @media only screen and (min-width: 480px) and (max-width: 599px){
        .boxCEOO {
            left: 0px;
            margin-left: -4px;
            width: 85%;
        }
    }
    @media only screen and (min-width: 160px) and (max-width: 479px){
        .boxCEOO {
            width: 85%;
            left: 0px;
            margin-left: -4px;
        }
    }
</style>

<div class="boxCEOO">
    <div class="closeCEOO"><div class="closeContent">X</div></div>
    <div class="boxContent">
        <p><b>CEOO Marketing GmbH</b></p>
        <p>Hedwigstrasse 3<br>
            8032 Zürich<br>
            Schweiz
        </p>
        <p>Die CEOO Marketing GmbH ist unter der Handelsregisternummer CHE - 288.092.990 beim Amtsgericht Zürich eingetragen.</p>
        <p>Bei Fragen stehen wir Ihnen gerne zur Verfügung. </p>
        <p>E-Mailadresse : info@ceoo.ch</p>
        <p><b>Urheberrechte</b></p>
        <p>Die Rechte für alle Texte, die Grafiken sowie das Layout sowie der HTML-Code und die Skripte liegen bei der CEOO Marketing GmbH.<br>
            Jede Form der weiteren Nutzung bedarf der ausdrücklichen Genehmigung durch den jeweiligen Inhaber der Rechte.</p>
    </div>
</div>
<div class="curtain ceoo"></div>






<script>
    $(function() {

        $('.showCEOO').on('click', function(event){
            $('.boxCEOO').css('top',$('.showCEOO').position().top+'px');
            $('.curtain.ceoo').show();
            $('.boxCEOO').show();
            event.stopPropagation();
        });
        $('.closeCEOO').on('click', function(){
            $('.boxCEOO').hide();
            $('.curtain.ceoo').hide();
        });

    });
</script>





<style>
    .button, .mfw_adressData_agb1, .mfw_adressData_agb2, .mfw_submit {
        background: #0070c9;
    }
    .button:hover, .mfw_adressData_agb1:hover, .mfw_adressData_agb2:hover, .mfw_submit:hover {
        background: #0070c9;
    }
</style>




<script>
    (function() {
        var $nachtext = $('#agb_nachtext');
        if ($nachtext.length) {
            var node = $nachtext[0];
            var i;
            if (node.childNodes[0].nodeType===3 && node.childNodes[0].nodeValue.indexOf('Es gelten') >=0) {
                i = 4;
                while (i--) node.removeChild(node.firstChild);
            }
        }
    })();
</script>
<style>
    [class^="mfw_adressData_agb"] input[name^="adressData[agb"] + span::before,
    body .agb_box {
        margin-top: 0;
    }
</style>


<script>
    $(document).ready(function(){
        $(".postModal").hide();
        $('.showPost').click(function(event){
            $(".postModal").show();
        });
        $('.postModalCloseButton').click(function(event){
            $(".postModal").hide();
        });
    });
</script>


<div class="postModal" style="display:none;">
    <div class="postModalHeader">
        <div class="postModalCloseButton">Schließen</div>
    </div>
    <div class="postModalContent">
        <b>CEOO Marketing GmbH</b>
        <br>
        Züricherbergstraße 7
        <br>
        8032 Zürich
        <br>
        Schweiz
        <br><br>
        <b>Urheberrechte</b>
        <br>
        Die Rechte für alle Texte , die Grafiken sowie das Layout, den HTML-Code und die Skripte liegen bei der CEOO Marketing GmbH. Jede Form der weiteren Nutzung bedarf der ausdrücklichen Genehmigung durch den jeweiligen Inhaber der Rechte.
        <br>
    </div>
</div>


<div id="footer">
    <div class="footerContentWrapper">
        <div class="footerBild">
        </div>
        <div id="footerMenu" class="inner">
            <div class="advertiseBox">
                <div class="closeWrapper">
                    <div class="close closeAdvertiseBox">X</div>
                </div>
                <div class="contentWrapper">
                    <p class="headline">You want to advertise this or other campaigns from ceoo?</p>
                    <p class="content">Register at our private Network: <a href="" target="_blank"></a> </p>
                    <p class="footer"><a href="" target="_blank"><img src="invites/paypal/main_layout_logo.png"></a></p>
                </div>
            </div>
            <div style="text-align: center">
                <a href="/privacy"  target="_blank">Datenschutz</a>
                |            <a href="/terms"  target="_blank">Teilnahmebedingungen</a>
            </div>
        </div>
        <div class="clearFix"></div>
        <div id="footerContent" class="inner">
            Cookies: Durch die weitere Nutzung erkläre ich mich einverstanden, dass der Veranstalter zur Verbesserung des Webseitenerlebnisses Cookies setzt.
            Ich kann meine Einwilligung jederzeit widerrufen und/oder diese Cookies löschen. Näheres dazu in unserer Datenschutz-Erklärung.
            Dies ist ein Gewinnspiel der CEOO Marketing GmbH. <br>
            Einsendeschluss ist der 16. Januar 2021, um 24 Uhr. Diese Aktion der CEOO Marketing GmbH wird nach den Teilnahmebedingungen und garantiert durchgeführt.
            Der Markeninhaber oder Hersteller ist weder Veranstalter noch Sponsor dieses Gewinnspiels und steht mit der Veranstalterin in keiner geschäftlichen Beziehung
        </div>
    </div>

</div><!-- footerBox -->





























































































<script>
    var modals = [
        {
            'name': 'sponsor',
            'start': '#agb_nachtext .showSponsor',
            'stop': '.mfw_sponsorAssignment_ .closeButton',
            'time': 0
        },
        {
            'name': 'ceoo',
            'start': '#agb_nachtext .showCEOO',
            'stop': '.boxCEOO .closeCEOO',
            'time': 0
        },
        {
            'name': 'advertiseBox',
            'start': '#footerMenu .openAdvertiseBox',
            'stop': '.advertiseBox .closeAdvertiseBox',
            'time': 0
        },
    ];
    jQuery(document).ready(function() {
        if (window.performance && window._ga && _ga.event && _ga.timing) {
            jQuery.each(modals, function (key, modal) {
                if (jQuery(modal.start).length > 0) {
                    jQuery(modal.start).on('click', function() {
                        _ga.event('modal', 'open', modal.name);
                        modal.time = Math.round(performance.now());
                        jQuery(modal.stop).one('click', function() {
                            _ga.event('modal', 'close', modal.name);
                            _ga.timing('modal', 'openTime', Math.round(performance.now()) - modal.time, modal.name);
                            modal.time = 0;
                        });
                    });
                }
            });
        }
    });
</script>


<script>
    if (window._ga && _ga.event) {
        var action = _ga.cid + '~' + _ga.pid + '~' + _ga.psid;
        if (window.top.location !== window.location) {
            _ga.event('iframe', action, (window.top.location.href || (top.window.location.href || 'cors')));
        }


    }
</script>




<!-- footerBlockDone -->







<link href="invites/paypal/coyoteDefaultLibrary.css" rel="stylesheet">

<script src="invites/paypal/coyoteDefaultLibrary.js"></script>



<script>
    $(function () {
        $('[data-toggle="coyote-tooltip"]').tooltip({
            trigger:"focus"
        })
    })
</script>






<script>

    function responsiveImages() {
        var $imgs = document.querySelectorAll('img[data-mobile-src]');
        var i;
        var isMobile = !!window.matchMedia("(max-width: 599px)").matches;

        for (i=0; i<$imgs.length; i++) {
            var $img = $imgs[i];

            if (isMobile) {
                if (!$img.dataset.src) $img.dataset.src = $img.src;
                if ($img.dataset.mobileSrc) $img.src = $img.dataset.mobileSrc;
            } else {
                if ($img.dataset.src) $img.src = $img.dataset.src;
            }
        }
    }

    responsiveImages();
    window.addEventListener('resize', responsiveImages);

</script>

<style>
    .lightbox__background,
    .lightbox__background * {
        box-sizing: border-box;
    }

    .lightbox__background {
        position: fixed;
        left: 0;
        top: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0,0,0,0.75);
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        z-index: 10000;
        display:none;
    }
    .lightbox__content {
        position: relative;
        background: #fff;
        border-radius: 8px;
        width: calc(100% - 40px);
        max-width: 960px;
        height: calc(100% - 50px);
        padding: 10px;
        margin: 25px auto;
        position: relative;
        box-shadow: 4px 4px 8px rgba(0,0,0,0.25);
    }
    .lightbox__content.appear {
        animation: lightbox__content__appear 0.5s cubic-bezier(0.705, 1.635, 0.725, 1.000) forwards;
    }
    .lightbox__content.disappear {
        animation: lightbox__content__disappear 0.5s 0.2s cubic-bezier(0.385, 0.000, 0.175, -0.535) forwards;
    }
    @keyframes lightbox__content__appear {
        from {
            transform: scale(0.75);
        }
        to {
            transform: scale(1);
        }
    }

    @keyframes lightbox__content__disappear {
        from {
            transform: scale(1);
        }
        to {
            transform: scale(0.75);
        }

    }

    .lightbox__items {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-align: center;
        color: #000;
    }
    .lightbox__content iframe {
        border: 0;
        border-radius: 8px;
        width: 100%;
        height: 100%;
        flex-grow: 1;
    }
    .lightbox__close {
        position: absolute;
        background-color: #000;
        background-image: url('data:image/svg+xml,%3csvg xmlns%3d%22http%3a%2f%2fwww.w3.org%2f2000%2fsvg%22 width%3d%2219px%22 height%3d%2218px%22%3e%3cpath fill-rule%3d%22evenodd%22 fill%3d%22rgb%28255%2c 255%2c 255%29%22 d%3d%22M18.408%2c15.499 L16.312%2c17.701 L9.380%2c11.099 L2.448%2c17.701 L0.352%2c15.499 L7.176%2c9.000 L0.352%2c2.501 L2.448%2c0.299 L9.380%2c6.901 L16.312%2c0.299 L18.408%2c2.501 L11.584%2c9.000 L18.408%2c15.499 Z%22%2f%3e%3c%2fsvg%3e');
        background-repeat: no-repeat;
        background-position: 50% 50%;
        background-size: 45% 45%;
        width: 36px;
        height: 36px;
        right: -18px;
        top: -18px;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 2px 2px 4px rgba(0,0,0,0.25);
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.5s 0s;
    }
    .lightbox__content.appear .lightbox__close {
        opacity: 1;
        transition: opacity 0.5s 0.5s;
    }

    .lightbox__header {
        font-size: 16px;
        font-weight: bold;
        padding-bottom: 10px;
    }
    .lightbox__header:empty {
        padding: 0;
    }
    .lightbox__footer {
        font-size: 10px;
        font-weight: normal;
        padding-top: 10px;
        overflow-y: auto;
        border-radius: 8px;
    }
    .lightbox__footer:empty {
        padding: 0;
    }
    .lightbox--stop-scrolling {
        overflow: hidden;
        height: 100%;
    }
</style>
<script>
    function onWindowResizeLightbox() {
        $('.lightbox__content').css({
            height: (window.innerHeight - 50)+'px'
        })
    }
    function openLightbox(iframeSrc,header,footer,options) {
        var lightbox = $('.lightbox__background');
        var lightboxItems = $('.lightbox__items');
        var headerDiv = lightboxItems.find('.lightbox__header');
        var footerDiv = lightboxItems.find('.lightbox__footer');
        var iframe = lightboxItems.find('iframe');

        if (options) {
            if (options.maxWidth) {
            }
        }

        lightbox.fadeIn();
        $('.lightbox__content').removeClass('disappear').addClass('appear');

        headerDiv.html(header || '');
        footerDiv.html(footer || '');

        headerDiv.css({scrollTop:0});
        footerDiv.css({scrollTop:0});

        if (iframeSrc) {
            iframe.attr('src',iframeSrc);
            iframe.show();
        } else {
            iframe.hide();
        }
        onWindowResizeLightbox();
        $(window).on('resize', onWindowResizeLightbox);
        $('body').addClass('lightbox--stop-scrolling');
    }
    function closeLightbox() {
        $('body').removeClass('lightbox--stop-scrolling');
        $('.lightbox__content').removeClass('appear').addClass('disappear');
        setTimeout(function() {
            $('.lightbox__background').fadeOut();
        },500);
        $(window).off('resize', onWindowResizeLightbox);
    }
</script>
<div class="lightbox__background" onclick="closeLightbox()">
    <div class="lightbox__content">
        <div class="lightbox__close" onclick="closeLightbox()"></div>
        <div class="lightbox__items">
            <div class="lightbox__header"></div>
            <iframe src="invites/paypal/saved_resource.html" frameborder="0"></iframe>
            <div class="lightbox__footer"></div>
        </div>
    </div>
</div>






</body></html>
@endsection


@section('footer_scripts')

@endsection


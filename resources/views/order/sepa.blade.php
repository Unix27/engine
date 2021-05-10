@extends('layouts.master')

@section('content')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
{{--    <form action="{{ config('app.url') . '/checkout/done' }}" class="paymentWidgets" data-brands="DIRECTDEBIT_SEPA">--}}
{{--    </form>--}}

    <div id="card_220921339056" class="wpwl-container wpwl-container-card">
        <form action="{{ config('app.url') . '/checkout/done' }}" class="paymentWidgets" data-brands="DIRECTDEBIT_SEPA">

        </form>
    </div>
@endsection


@section('after_scripts')
    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
    <script>
        var wpwlOptions = {
            locale: "de",
            onReady: function() {
                $('.wpwl-button-pay').html('JETZT KAUFEN');
            }
        }
    </script>
@endsection


<style>
    .wpwl-container {
        padding-top: 25px;
    }
    .wpwl-form {
        margin: 0 auto 24px auto;
        max-width: 30em;
    }

    .wpwl-form-card, .wpwl-form-directDebit, .wpwl-form-onlineTransfer-EPS, .wpwl-form-onlineTransfer-ENTERCASH, .wpwl-form-onlineTransfer-GIROPAY, .wpwl-form-onlineTransfer-IDEAL, .wpwl-form-onlineTransfer-SADAD, .wpwl-form-onlineTransfer-SOFORTUEBERWEISUNG, .wpwl-form-virtualAccount-KLARNA_INVOICE, .wpwl-form-virtualAccount-KLARNA_INSTALLMENTS, .wpwl-form-virtualAccount-NETELLER, .wpwl-form-virtualAccount-PASTEANDPAY_V, .wpwl-form-virtualAccount-VSTATION_V, .wpwl-form-virtualAccount-CHINAUNIONPAY, .wpwl-form-has-inputs {
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: 2px 3px 5px 1px #999;
        box-shadow: 2px 3px 5px 1px #999;
    }

    .wpwl-form-directDebit {
        border-radius: 10px;
        background-image: linear-gradient(30deg, rgba(255,255,255,0) 70%, rgba(255,255,255,0.2) 70%),linear-gradient(45deg, rgba(255,255,255,0) 75%, rgba(255,255,255,0.2) 75%),linear-gradient(60deg, rgba(255,255,255,0) 80%, rgba(255,255,255,0.2) 80%);
        background-color: silver;
    }
    .wpwl-form-directDebit {
        min-width: 20% !important;
        min-height: 20% !important;
    }

    .wpwl-button-pay {
        background-color: #ff4e15;
        border-color: #ff4e15;
    }

</style>
<h3>@lang('checkout.step2')</h3>
<div class="form-check col-md-12" style="border: 1px solid #ebebeb;padding: 10px 5px;float: left; width: 100%;margin-bottom: 15px;">
    <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="sepa" checked>
    <label class="form-check-label" for="inlineRadio2" style="float: right;width: 85%;">
        <img src="{{url('images/SepaLogoEN.jpg')}}"/><br/>
        <strong style="font-size: 14px;font-weight: bold;color: black;">SEPA (0,00 EUR)</strong><br/>
        @lang('checkout.pay_visa_master_sepa')
    </label>
</div>
<div class="form-check col-md-12" style="border: 1px solid #ebebeb;padding: 10px 5px;float: left; width: 100%;margin-bottom: 15px;">
    <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="paypal">
    <label class="form-check-label" for="inlineRadio1" style="float: right;width: 85%;">
        <img src="{{url('images/checkout/paypal.png')}}"/><br/>
        <strong style="font-size: 14px;font-weight: bold;color: black;">@lang('checkout.card_payment')</strong><br/>
        @lang('checkout.pay_visa_master')
    </label>
</div>

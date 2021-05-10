<h3>@lang('checkout.step3')</h3>
<div class="form-check col-md-12" style="border: 1px solid #ebebeb;padding: 10px 5px;float: left; width: 100%;margin-bottom: 15px;">
    <input class="form-check-input" type="radio" name="shipping" id="inlineRadio2" value="dhl" checked>
    <label class="form-check-label" for="inlineRadio2" style="float: right;width: 85%;">
        {{--<img src="{{url('images/checkout/dhl_logo_1.png')}}"/><br/>--}}
        <strong style="font-size: 14px;font-weight: bold;color: black;">@lang('checkout.dhl_delivery')</strong><br/>
        @lang('checkout.dhl_delivery_2')
    </label>
</div>

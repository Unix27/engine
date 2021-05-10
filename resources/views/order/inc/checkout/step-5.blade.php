<div class="col-md-12">
    <h3>@lang('checkout.step5')</h3>
    <div class="form-check col-md-12" style="border: 1px solid #ebebeb;padding: 10px 5px;float: left; width: 100%;margin-bottom: 15px;">
        <input class="form-check-input" type="checkbox" name="i_agree" required id="inlineCheckbox1" value="option1">
        <label class="checkout-terms form-check-label" for="inlineCheckbox1" style="float: right;width: 85%;">
            <strong style="font-size: 22px;font-weight: bold;color: black;">@lang('checkout.i_accept')</strong><br/>
            {!! trans('checkout.terms', ['sitename' => config('app.name'), 'action' => t('Register'), 'terms' => lurl('/terms'), 'privacy' => lurl('/privacy'), 'cancellation-right' => lurl('/page/cancellation-right')]) !!}
        </label>
    </div>
    <button type="submit" class="order_now_btn checkout_submit{{ (isset($errors) and $errors->any()) ? ' checkout_has_error' : '' }}">@lang('checkout.buy_now')</button>
</div>

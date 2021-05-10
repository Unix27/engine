<div class="col-md-12">
    <h3>@lang('checkout.step4')</h3>
</div>
<div class="pricetable">
    <div class="col-md-1"><span class="title-heading">№</span></div><div class="col-md-8"><span class="title-heading">@lang('checkout.description')</span></div><div class="col-md-3 last-el"><span class="title-heading">@lang('checkout.total_price')</span></div>
    @foreach($cart->values() as $key => $item)
        @continue(empty($item->product->post))
        <div class="col-md-1">{{ ++$key }}</div><div class="col-md-9"><a href="{{ \App\Helpers\UrlGen::post($item->product->post) }}">{{$item->product->title}}</a></div><div class="col-md-2 last-el">{{currency_format($item->price * $item->qty,currency()->getUserCurrency(), false)}}</div><div class="col-md-12 specialhr"></div>
    @endforeach
    @if(!\Illuminate\Support\Facades\Auth::user() or !\Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber'])))
    <div class="col-md-1">{{ $cart->count()+1 }}</div><div class="col-md-9">@lang('checkout.trial_period')</div><div class="col-md-2 last-el">0,00</div>
    @endif
    <div class="col-md-12 specialhr"></div>
    <div class="col-md-1"></div><div class="col-md-9">@lang('checkout.total_purchase')</div><div class="col-md-2 last-el">{{currency_format($total, currency()->getUserCurrency(), false)}}</div><br clear="all"/>
    <div class="col-md-1"></div><div class="col-md-9">@lang('checkout.payment_fee')</div><div class="col-md-2 last-el">0,00</div><br clear="all"/>
    <div class="col-md-1"></div><div class="col-md-9">@lang('checkout.shipping_fee')</div><div class="col-md-2 last-el">0,00</div>
    <div class="col-md-12 specialhr"></div>
    <div class="col-md-1"></div><div class="col-md-9 ft-z">@lang('checkout.subtotal_and_VAT')</div><div class="col-md-2 ft-z last-el">{{ currency_format($total) }}</div><br clear="all"/>
    <div class="col-md-1"></div><div class="col-md-9">@lang('checkout.VAT')</div><div class="col-md-2 last-el">0,00</div><br clear="all"/>
    <div class="col-md-1"></div><div class="col-md-9">@lang('checkout.subtotal_excl_VAT')</div><div class="col-md-2 last-el">0,00</div><br clear="all"/>
</div>

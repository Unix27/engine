
<div class="item___1NoTC ">
    <div class="content___26q-V product-card-variation-1">
        <h1>{{ app()->getLocale() == 'de' ? $post->title_de : $post->title  }}</h1>
        <div class="percantage-x42SHhd">
            <span>
                @if($post->old_price > $post->price)
                    {{ ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) }}%
                @else
                    0%
                @endif
                    {{ t('discount') }}
            </span>
        </div>
        <div class="discount-sdge223d">
            <div class="oprice">
                <span>
                    @if($post->old_price > $post->price)
                        {{ currency($post->old_price, 'USD', currency()->getUserCurrency()) }}
                    @else
                        {{ currency(0, 'USD', currency()->getUserCurrency()) }}
                    @endif
                </span>
            </div>
            <div class="nprice">
                <span>
                   {{ currency($post->price, 'USD', currency()->getUserCurrency()) }}
                </span>
            </div>
        </div>
        <div class="discount-btn-cchsid">
            @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber']))
                <a href="{{ $products->first()->url }}" target="_blank" class="pcv1-btn">{{ trans('global.Get it and save', ['percent' => ($post->old_price > $post->price) ? ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) : 0 ]) }}</a>
            @elseif(\Illuminate\Support\Facades\Auth::user())
                <a href="{{ lurl('subscribe/paypal') }}" class="pcv1-btn">{{ trans('global.Get it and save', ['percent' => ($post->old_price > $post->price) ? ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) : 0 ]) }}</a>
            @else
                @if($post->post_variant_id == 1)
                    <a href="{{ lurl('register' . '?fast-register=true&product=' . $post->id) }}" class="pcv1-btn">{{ trans('global.Get it and save', ['percent' => ($post->old_price > $post->price) ? ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) : 0 ]) }}</a>
                @else
                    <a href="{{ lurl('register') }}" class="pcv1-btn">{{ trans('global.Get it and save', ['percent' => ($post->old_price > $post->price) ? ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) : 0 ]) }}</a>
                @endif

            @endif

        </div>
        <div class="shipping-sd33f113f">
            <img src="/images/vantage-icon.png"/>
            <span>{{ t('Free shipping') }}</span>
        </div>
    </div>
</div>
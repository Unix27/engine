
<div class="item___1NoTC ">
    <div class="content___26q-V product-card-variation-3">
        <h1>{{ app()->getLocale() == 'de' ? $post->title_de : $post->title  }}</h1>
        <div class="price-blc-sevf632q">
            <div class="oprice">
                <span>@if($post->old_price > $post->price) {{ currency($post->old_price, 'USD', currency()->getUserCurrency()) }} @else $0.00 @endif</span>
            </div>
        </div>
        <div class="price-blc-sevf632q">
            <div class="nprice">
                <span>{{ $products->first()->formattedActivityPrice }}</span>
            </div>
        </div>
        <div class="buy-ship-sdfsd1332">
            <a href="#" class="pcv2-btn">{{ t('I want to save money') }}</a>
            <div class="shipping-sd33f113f">
                <img src="/images/vantage-icon.png"/>
                <span>{{ t('Free shipping') }}</span>
            </div>
        </div>
        <div class="discount-a1242rs">
            <span>@if($post->old_price > $post->price) -{{ ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) }}% @else -0% @endif </span>
        </div>
    </div>
</div>
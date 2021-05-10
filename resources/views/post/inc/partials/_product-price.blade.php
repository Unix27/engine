@if($pricePartial->get('old_price'))
    <div class="buy-block__sales">
        <div class="price small">
            <span class="through">{{ $pricePartial->get('old_price') }}</span></sup>
        </div>
        <div class="informer">
            <span class="informer__percent">-{{ $pricePartial->get('discount') }}%</span>
            <div class="informer__description">
                @lang('global.your_discount') <span class="sale-price">{{ $pricePartial->get('discount_sum') }}</span>
            </div><!---->
        </div>
    </div>
@endif
<div class="buy-block__base">
    <div class="normal">
        <div class="normal__prices">
            <div class="price">
                <span><span>{{ $pricePartial->get('formatted_activity_price') }}</span> <sup class="currency"></sup></span>
            </div>
            <div class="information" style="margin-top:0;">
                <i class="fa fa-info-circle"></i> @lang('global.trial_information')
                <div class="hidden-information">
                    @lang('global.trial_text')
                </div>
            </div>
        </div><button class="btn orange full vpBuyNow" data-post-id="{{ $post->id }}" type="button">@lang('global.buy_now')</button>
    </div>
    <div class="credit">
        <button class="btn orange fix-mg-left vpAddToCart" data-post-id="{{ $post->id }}" type="button">
            {{ t('add to cart') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none" style="position: relative; top: 5px;">
                <rect x=".5" y=".5" width="25" height="25" rx="5.5" fill="#FF4E15" stroke="#fff"></rect>
                <rect x="1" y="4" width="24" height="21" rx="5" fill="#FF4E15"></rect>
                <g fill="#FF4E15">
                    <circle cx="7" cy="8" r="1"></circle>
                    <circle cx="19" cy="8" r="1"></circle>
                </g>
                <path d="M19 8.3a6 6 0 1 1-12 0" stroke="#fff" stroke-linecap="round"></path>
            </svg>
        </button>
    </div>
    @auth
    <div class="to-wish-list make-favorite" data-id="{{$post->id}}">
        @if (\App\Models\SavedPost::where('user_id', auth()->user()->id)->where('post_id', $post->id)->count() > 0)
            <i class="icon-heart-alt-full"></i>
        @else
            <i class="icon-heart-alt"></i>
        @endif
    </div>
    @else
        <a href="{{lurl('/register')}}" class="to-wish-list"><i class="icon-heart-alt"></i></a>
    @endif
</div><!----><!---->

<div class="SectionIdenticalItems__List-sc-1gm4lhi-1 dEgpFx">
    <div class="Item__Root-hg8vs9-8 jXfAJP">
        <div class="Item__Col-hg8vs9-0 Item__Col1-hg8vs9-1 kSwibS">
            @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber']))
                <a href="{{ !empty($product['url']) ? $product['url'] : '#' }}" target="_blank">
                    <div class="Image-buvnx1-0 JgZVc">
                        <img src="{{ imgUrl($picture, 'small') }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                    </div>
                </a>
            @elseif(\Illuminate\Support\Facades\Auth::user())
                <a href="{{ lurl('subscribe/paypal') }}">
                    <div class="Image-buvnx1-0 JgZVc">
                        <img src="{{ imgUrl($picture, 'small') }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                    </div>
                </a>
            @else
                <a href="{{ lurl('register') }}">
                    <div class="Image-buvnx1-0 JgZVc">
                        <img src="{{ imgUrl($picture, 'small') }}" alt="{{ $product->name }}" title="{{ $product->name }}">
                    </div>
                </a>
            @endif
        </div>
        <div class="Item__Col-hg8vs9-0 Item__Col2-hg8vs9-2 hybNWy">
            <a target="_blank" rel="noreferrer noopener" href="" class="Item__Name-hg8vs9-7 khwBwc">
                {{ $product['title'] }}
            </a>
            <div class="Ratings__Wrapper-sc-1lcf236-2 iFVVSS">
                <div>
                    <div class="Ratings__Rating-sc-1lcf236-0 dUIHcp">
                        {{ $product->averageStar }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 26 24" fill="#faaf45">
                            <path stroke="#faaf45" d="M21.1423 23.4122L20.852 23.0051C20.7038 23.1109 20.5258 23.1657 20.3468 23.1657C20.2097 23.1657 20.072 23.1336 19.9462 23.0687C19.9462 23.0687 19.9462 23.0687 19.9462 23.0687L14.5347 20.2776C13.8157 19.9067 12.9617 19.9067 12.2427 20.2776L6.83124 23.0687L6.8309 23.0689C6.54193 23.2182 6.19032 23.1933 5.92494 23.0061C5.66318 22.8185 5.53643 22.5061 5.58986 22.2009L5.58988 22.2008L6.6148 16.339C6.75847 15.5174 6.48288 14.6782 5.88007 14.1017L1.53164 9.94305L1.53089 9.94234C1.3008 9.7232 1.22018 9.39755 1.31721 9.10058C1.41607 8.80419 1.67962 8.5822 2.00574 8.53552L8.04631 7.67366C8.85631 7.55809 9.55849 7.05347 9.92632 6.32261L12.6225 0.965453L12.6232 0.963992C12.7631 0.683657 13.0582 0.5 13.3881 0.5C13.7186 0.5 14.0127 0.683166 14.1543 0.964656L14.1543 0.964788L16.8505 6.32192C17.2183 7.0528 17.9205 7.55742 18.7305 7.67297L24.7726 8.53489L24.7729 8.53492C25.098 8.58115 25.3616 8.80393 25.4577 9.09842L25.4589 9.10203C25.5571 9.39513 25.4768 9.72138 25.2461 9.94282C25.246 9.94286 25.246 9.9429 25.2459 9.94294L20.8992 14.1005C20.2965 14.6769 20.021 15.516 20.1646 16.3375L21.1889 22.1991C21.1889 22.1991 21.1889 22.1992 21.1889 22.1993C21.2418 22.504 21.1143 22.8177 20.8516 23.0054L21.1423 23.4122ZM21.1423 23.4122C21.5584 23.1149 21.7681 22.6111 21.6815 22.1134L19.717 23.5131C19.9152 23.6153 20.1317 23.6657 20.3468 23.6657C20.6269 23.6657 20.9069 23.5801 21.1423 23.4122Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="Ratings__Text-sc-1lcf236-1 gsRPZJ">
                    <span>{{ $product->totalReviewCount == 100 ? '>' : '' }} {{ $product->totalReviewCount }} @lang('reviews')</span>
                </div>
            </div>
        </div>
        <div class="Item__Col-hg8vs9-0 Item__Col3-hg8vs9-3 cTtICr">
            <div class="Seller__Root-sc-1soaac8-2 iGuJeR">
                <h3 class="Seller__Name-sc-1soaac8-0 othkJ">{{ empty($product->seller->name) ? 'unknown' : $product->seller->name }}</h3>
                <div class="Seller__Row-sc-1soaac8-3 dIlsx">
                    <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 0 28 28">
                        <g fill="none" fill-rule="evenodd" opacity=".75">
                            <rect width="28" height="28" fill="#41C300" rx="14"></rect>
                            <g fill="#FFF" transform="translate(7.366 8.29)">
                                <circle cx="2.179" cy="2.527" r="1.909"></circle>
                                <circle cx="11.088" cy="2.527" r="1.909"></circle>
                            </g>
                            <path stroke="#FFF" stroke-linecap="round" stroke-width="1.909" d="M8.91 17.818c1.171 1.459 3.02 2.4 5.101 2.4 2.068 0 3.907-.93 5.08-2.372"></path>
                        </g>
                    </svg>
                    <p class="Seller__Reliability-sc-1soaac8-1 diUnXJ">
                        {{ t('sellers reliability') }} – {{ empty($product->seller->positive_rate) ? '15%' : $product->seller->positive_rate }}
                    </p>
                </div>
            </div>
        </div>
        <div class="Item__Col-hg8vs9-0 Item__Col4-hg8vs9-4 knaGeg">
            <p class="PriceBlock__Price-sc-8h3hxd-0 gNwUja">
                {{ \App\Models\AmazonProduct::findTrans($product->tid, $priceForLocale)->formattedActivityPrice }}
            </p>
            <div class="Delivery__Root-we8rp2-1 hlORuE">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="#1b1b1b">
                    <path fill-opacity=".5" fill-rule="evenodd" d="M3.457 13.753c0-1.33 1.075-2.41 2.405-2.41s2.405 1.08 2.405 2.41-1.075 2.405-2.405 2.405-2.405-1.08-2.405-2.405zm1.202 0c0 .66.537 1.203 1.203 1.203s1.202-.54 1.202-1.203a1.2 1.2 0 1 0-2.405 0zM24 12.133L23.997 8c-.02-.385-.182-.75-.454-1.02l-4.56-4.508a1.55 1.55 0 0 0-1.087-.449h-2.3V1.16A1.16 1.16 0 0 0 14.438 0H1.16A1.16 1.16 0 0 0 0 1.16l.001 10.973a1.16 1.16 0 0 0 1.16 1.16h1.554c.224-1.54 1.55-2.722 3.147-2.722S8.785 11.754 9 13.293h6.29c.224-1.54 1.55-2.722 3.147-2.722s2.927 1.183 3.15 2.722h1.24a1.16 1.16 0 0 0 1.16-1.16zm-7.958 1.62a2.41 2.41 0 0 1 2.409-2.409 2.41 2.41 0 0 1 2.405 2.409 2.41 2.41 0 0 1-2.405 2.405 2.41 2.41 0 0 1-2.409-2.405zm1.206 0c0 .66.537 1.203 1.202 1.203s1.203-.54 1.203-1.203-.54-1.203-1.203-1.203a1.2 1.2 0 0 0-1.202 1.203zm-.104-6.623h4.412c.162 0 .244-.2.124-.313L18.11 3.4c-.035-.03-.08-.05-.128-.05h-.84c-.1 0-.182.08-.182.182v3.406c0 .1.08.182.182.182z"></path>
                </svg>
                <span class="Delivery__Text-we8rp2-2 cBzCSw">
                        {{ t('Free shipping') }}
                </span>
            </div>
        </div>

        @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber']))
            <div class="Item__Col-hg8vs9-0 Item__Col5-hg8vs9-5 RNOEi">
                <div class="Button-sc-1c0nofd-0 Item__LinkButton-hg8vs9-6 lnVyLn" rel="noreferrer noopener" data-url="{{ !empty($product['url']) ? $product['url'] : '#' }}" onclick="javascript:window.open($(this).data('url'),'_blank');">
                    {{ t('Buy now') }}
                </div>
            </div>
        @elseif(\Illuminate\Support\Facades\Auth::user())
            <a href="{{ lurl('subscribe/paypal') }}" class="Item__Col-hg8vs9-0 Item__Col5-hg8vs9-5 RNOEi">
                <div class="Button-sc-1c0nofd-0 Item__LinkButton-hg8vs9-6 lnVyLn" rel="noreferrer noopener" data-url="{{ !empty($product['url']) ? $product['url'] : '#' }}" onclick="javascript:window.open($(this).data('url'),'_blank');">
                    {{ t('Buy now') }}
                </div>
            </a>
        @else
            @if($post->post_variant_id == 1)
                <a href="{{ lurl('register' . '?fast-register=true&product=' . $post->id) }}" class="Item__Col-hg8vs9-0 Item__Col5-hg8vs9-5 RNOEi">
                    <div class="Button-sc-1c0nofd-0 Item__LinkButton-hg8vs9-6 lnVyLn" rel="noreferrer noopener">
                        {{ t('Buy now') }}
                    </div>
                </a>
            @else
                <a href="javascript:void(0);" onclick="javascript:showBuyPopup();" class="Item__Col-hg8vs9-0 Item__Col5-hg8vs9-5 RNOEi">
                    <div class="Button-sc-1c0nofd-0 Item__LinkButton-hg8vs9-6 lnVyLn" rel="noreferrer noopener">
                        {{ t('Buy now') }}
                    </div>
                </a>
            @endif
        @endif
    </div>
</div>
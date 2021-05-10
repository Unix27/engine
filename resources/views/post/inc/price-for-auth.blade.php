<div class="whiteList___1-H1l item___jF3um" style="padding-bottom: 35px;">
    @if(!$post->postType->price_templates)
        <div class="item___1NoTC ">
        <div class="content___26q-V">
            <div class="top___qaR9g withShare___K04_k">
                <h1 itemprop="name" class="h1___UYvvN">
                    {{ $post->title }}
                </h1>
            </div>
            <div class="prices___3oA9U">
                @if($post->old_price > $post->price)
                    <div class="msrPrice___3i7t6">
                    <span>
                        {{ currency($post->old_price, 'USD', currency()->getUserCurrency()) }}
                    </span>
                        <span class="product-price-mark" style="
    display: inline-block;
    padding: 2px 5px;
    border-radius: 3px;
    background: #fff1f1;
    color: #ff4747;
    -webkit-transform: scale(.9);
    -ms-transform: scale(.9);
    transform: scale(.9);
">
                           -{{ ceil((((int) $post->old_price - (int) $post->price) * 100) / $post->old_price) }}%
                        </span>
                    </div>
                    <br clear="all"/>
                @endif

                <div itemtype="http://schema.org/Offer" itemprop="offers" itemscope="" class="special-price">
                    <div class="priceLine___3BDby">
                        <div class="price___m18Vb">
                            <span itemprop="price" content="{{ currency($post->price, 'USD', currency()->getUserCurrency()) }}">
{{--                                @include('post.inc._price_or_zero', ['price' => app()->getLocale() == 'de' ? $post->price_de . ' EUR' : $post->price . ' $'])--}}
                                {{ currency($post->price, 'USD', currency()->getUserCurrency()) }}
                            </span>
                            <meta itemprop="priceCurrency"
                                  content="{{ currency()->getUserCurrency() }}">
                        </div>
                    </div>
                </div>
                    <div class="buttons___8kkBR" style="max-width: 25rem;">
                        @if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber']))
                            <a href="{{ $products->first()->url }}" target="_blank" rel="noreferrer noopener" class="{{ 'featured_' . $post->featured }} buy_button Button-sc-1c0nofd-0 SectionMain__GoToShopButton-sc-1oembs-1 AQtgo vpAddToCart">
                                {{ t('Yes, I want to save money') }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <rect x=".5" y=".5" width="25" height="25" rx="5.5" fill="#FF4E15" stroke="#fff"></rect>
                                    <rect x="1" y="4" width="24" height="21" rx="5" fill="#FF4E15"></rect>
                                    <g fill="#FF4E15">
                                        <circle cx="7" cy="8" r="1"></circle>
                                        <circle cx="19" cy="8" r="1"></circle>
                                    </g>
                                    <path d="M19 8.3a6 6 0 1 1-12 0" stroke="#fff" stroke-linecap="round"></path>
                                </svg>
                            </a>
                        @elseif(\Illuminate\Support\Facades\Auth::user())
                            <a href="{{ lurl('subscribe/paypal') }}" rel="noreferrer noopener" class="{{ 'featured_' . $post->featured }} buy_button Button-sc-1c0nofd-0 SectionMain__GoToShopButton-sc-1oembs-1 AQtgo vpAddToCart" data-product-id="{{ $post->id }}">
                                {{ t('Yes, I want to save money') }}
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <rect x=".5" y=".5" width="25" height="25" rx="5.5" fill="#FF4E15" stroke="#fff"></rect>
                                    <rect x="1" y="4" width="24" height="21" rx="5" fill="#FF4E15"></rect>
                                    <g fill="#FF4E15">
                                        <circle cx="7" cy="8" r="1"></circle>
                                        <circle cx="19" cy="8" r="1"></circle>
                                    </g>
                                    <path d="M19 8.3a6 6 0 1 1-12 0" stroke="#fff" stroke-linecap="round"></path>
                                </svg>
                            </a>
                        @else
                            @if($post->post_variant_id == 1)
                                <a href="{{ lurl('register' . '?fast-register=true&product=' . $post->id) }}" rel="noreferrer noopener" class="{{ 'featured_' . $post->featured }} buy_button Button-sc-1c0nofd-0 SectionMain__GoToShopButton-sc-1oembs-1 AQtgo vpAddToCart" data-product-id="{{ $post->id }}">
                                    {{ t('Yes, I want to save money') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                        <rect x=".5" y=".5" width="25" height="25" rx="5.5" fill="#FF4E15" stroke="#fff"></rect>
                                        <rect x="1" y="4" width="24" height="21" rx="5" fill="#FF4E15"></rect>
                                        <g fill="#FF4E15">
                                            <circle cx="7" cy="8" r="1"></circle>
                                            <circle cx="19" cy="8" r="1"></circle>
                                        </g>
                                        <path d="M19 8.3a6 6 0 1 1-12 0" stroke="#fff" stroke-linecap="round"></path>
                                    </svg>
                                </a>
                            @else
                                <a href="{{--{{ lurl('register') }}--}}javascript:void(0);"  rel="noreferrer noopener" class="{{ 'featured_' . $post->featured }} buy_button Button-sc-1c0nofd-0 SectionMain__GoToShopButton-sc-1oembs-1 AQtgo vpAddToCart" data-product-id="{{ $post->id }}">
                                    {{ t('Yes, I want to save money') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                        <rect x=".5" y=".5" width="25" height="25" rx="5.5" fill="#FF4E15" stroke="#fff"></rect>
                                        <rect x="1" y="4" width="24" height="21" rx="5" fill="#FF4E15"></rect>
                                        <g fill="#FF4E15">
                                            <circle cx="7" cy="8" r="1"></circle>
                                            <circle cx="19" cy="8" r="1"></circle>
                                        </g>
                                        <path d="M19 8.3a6 6 0 1 1-12 0" stroke="#fff" stroke-linecap="round"></path>
                                    </svg>
                                </a>
                            @endif

                        @endif
                    </div>
            </div>
            <div class="shipping___2gj4b"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="17" viewBox="0 0 24 17" fill="#1b1b1b"><path fill-opacity=".5" fill-rule="evenodd" d="M3.457 13.753c0-1.33 1.075-2.41 2.405-2.41s2.405 1.08 2.405 2.41-1.075 2.405-2.405 2.405-2.405-1.08-2.405-2.405zm1.202 0c0 .66.537 1.203 1.203 1.203s1.202-.54 1.202-1.203a1.2 1.2 0 1 0-2.405 0zM24 12.133L23.997 8c-.02-.385-.182-.75-.454-1.02l-4.56-4.508a1.55 1.55 0 0 0-1.087-.449h-2.3V1.16A1.16 1.16 0 0 0 14.438 0H1.16A1.16 1.16 0 0 0 0 1.16l.001 10.973a1.16 1.16 0 0 0 1.16 1.16h1.554c.224-1.54 1.55-2.722 3.147-2.722S8.785 11.754 9 13.293h6.29c.224-1.54 1.55-2.722 3.147-2.722s2.927 1.183 3.15 2.722h1.24a1.16 1.16 0 0 0 1.16-1.16zm-7.958 1.62a2.41 2.41 0 0 1 2.409-2.409 2.41 2.41 0 0 1 2.405 2.409 2.41 2.41 0 0 1-2.405 2.405 2.41 2.41 0 0 1-2.409-2.405zm1.206 0c0 .66.537 1.203 1.202 1.203s1.203-.54 1.203-1.203-.54-1.203-1.203-1.203a1.2 1.2 0 0 0-1.202 1.203zm-.104-6.623h4.412c.162 0 .244-.2.124-.313L18.11 3.4c-.035-.03-.08-.05-.128-.05h-.84c-.1 0-.182.08-.182.182v3.406c0 .1.08.182.182.182z"></path></svg> {{ t('Free shipping') }}</div>
            <div class="information">
                <i class="fa fa-info-circle"></i> @lang('global.trial_information')
                <div class="hidden-information">
                    @lang('global.trial_text')
                </div>
            </div>
        </div>
    </div>
    @else
        @foreach(explode(',', $post->postType->price_templates) as $template)
            @if(view()->exists($template))
                @include($template)
            @endif
        @endforeach
    @endif

    @include('post.inc.shop-rating')
</div>
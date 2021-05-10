<div class="mainPromotions">
    <div class="inner">
        <div class="big">
            <div class="bigItem">
                <div class="bigPromotion">
                    <a class="link" href="{{ lurl('/category/electronics') }}">
                        <div class="imageWrapper">
                            <img class="image cover" height="100%" width="100%" alt="" src="{{ "/images/one_banner.jpeg" . getPictureVersion() }}" sizes="(min-width: 1300px) 635px, (min-width: 768px) 50vw, 100vw" srcset="{{ "/images/one_banner.jpeg" . getPictureVersion() }} 640w, {{ "/images/one_banner.jpeg" . getPictureVersion() }} 750w, {{ "/images/one_banner.jpeg" . getPictureVersion() }} 1125w, {{ "/images/one_banner.jpeg" . getPictureVersion() }} 1200w">
                        </div>
                    </a>
                    <div>
                        <div>
                            <h2 class="header">
                                <div class="title">
                                    <a class="bigPromotion__link" href="{{ lurl('/category/electronics') }}">{{ t('the hottest hits') }}</a>
                                </div>
                                <div class="subtitle">
                                    <a class="bigPromotion__link" href="{{ lurl('/category/electronics') }}">{{ t('best items of january️') }}</a>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bigItem">
                <div class="bigPromotion">
                    <a class="link" href="{{ lurl('/category/women-s-clothing-accessories') }}">
                        <div class="imageWrapper">
                            <img class="image cover" height="100%" width="100%" alt="" src="/images/two_banner.jpeg" sizes="(min-width: 1300px) 635px, (min-width: 768px) 50vw, 100vw" srcset="/images/two_banner.jpeg 640w, /images/two_banner.jpeg 750w, /images/two_banner.jpeg 1125w, /images/two_banner.jpeg 1200w">
                        </div>
                    </a>
                    <div>
                        <div>
                            <h2 class="header">
                                <div class="title">
                                    <a class="bigPromotion__link" href="{{ lurl('/category/women-s-clothing-accessories') }}">{{ t('Gift ideas') }}</a>
                                </div>
                                <div class="subtitle">
                                    <a class="bigPromotion__link" href="{{ lurl('/category/women-s-clothing-accessories') }}"> {{ t('St. Valentines Day') }}</a>
                                </div>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
{{--        @if(app()->getLocale() == 'en')--}}
{{--            <div class="guessPricePromotion___2UAlq"><img alt="" class="img___2b-Ay" sizes="18rem" src="/images/9947bb2126e17ba56a5757e164d1cee1.png" srcset="/images/9947bb2126e17ba56a5757e164d1cee1.png 439w,/images/fdb3b62c75d6ec5b83162b2a9e963d0d.png 878w"><a class="button___382V9" href="/en/games/guess-price">Start the game!</a></div>--}}
{{--        @else--}}
{{--            <div class="guessPricePromotion___2UAlq"><img alt="" class="img___2b-Ay" sizes="18rem" src="/images/324002739d11ec5b44f202b3fe3d528e.png" srcset="/images/324002739d11ec5b44f202b3fe3d528e.png 585w,/images/29f3b0ae9dc32664f82770d562a8e53d.png 1170w"><a class="button___382V9" href="/de/games/guess-price">Das Spiel starten!</a></div>--}}
{{--        @endif--}}
    </div>
</div>

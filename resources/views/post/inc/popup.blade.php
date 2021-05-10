<div class="popup-container" style="display:none;">
    <div class="content-block">
        <div class="d-flex justify-content-center">
            <div>
                <div class="d-flex flex-row logo-block">
                    <div class="header__logo">
                        <a href="{{ \App\Helpers\UrlGen::post($post) }}"><img src="{{ imgUrl(config('settings.app.logo'), 'logo') }}"></a>
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row info-block">
                    <div class="d-flex flex-md-column flex-row left-content-wrap">
                        <div class="image-block">
                            <img alt="{{ $post->title }}" class="c-carousel__preview-img lazy-img" data-loaded="true" data-src="{{ $post->main_picture }}" src="{{ $post->main_picture }}">
                        </div>
                        <div class="d-flex flex-md-column flex-column-reverse justify-content-center main-info-wrap">
                            <div class="cards__price_container only_desktop">
                                <span class="cards__price mt-md-0 mt-2">{{ $bestSellerProduct->formattedActivityPrice }}</span>
                            </div>
                            <div class="text-small mt-md-0 mt-3 product-name">
                                <span>{{ $post->title }}</span>
                            </div>
                            <div class="cards__price_container only_mobile">
                                <span class="cards__price mt-md-0 mt-2">{{ $bestSellerProduct->formattedActivityPrice }}</span>
                            </div>
                        </div>
                        <br clear="all"/>
                    </div>
                    <div class="text-block right-content-wrap buttons-block">
                        <div>
                            <div class="mt-3 text-center text-md-left text-strong">
                                Dieses Produkt steht nur registrierten Benutzern zur Verfügung.
                            </div>
                            <div class="text-small mt-2 text-center text-md-left">
                                Registrieren Sie sich und erhalten Sie Zugang zu allen Rabatten.
                            </div>
                            <div class="text-small mt-2 text-center text-md-left">
                                {{ trans('checkout.trial_period') }}
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column mt-3">
                            <button class="btn btn-block btn-primary ofc-yes-btn" type="button" onclick="javascript:location.href='/register?product={{$post->id}}';">Registrieren</button>
                            <button  onclick="javascript:location.href='/login?product={{$post->id}}';" class="btn btn-block btn-danger text-small mt-md-0 mt-3 ml-md-3 ml-0 signup-decline-btn" data-url="https://ad.admitad.com/g/my89i8zkr210eb999e15b62ed2b196/?i=5&amp;f_id=17618&amp;ulp=https://beru.ru/product/besprovodnye-naushniki-marshall-mid-bluetooth-chernyi/100210869700&amp;subid=1&amp;subid3=1&amp;subid4=c20b099a696078ef3eacac95e772fc3f5cc18705dbed2011252253f2a4d76220" type="button">Anmelden</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showBuyPopup(){
        $('.popup-container').fadeIn(300);
        window.addEventListener('keydown', onKeyUpHandle);
    }
    function onKeyUpHandle (e) {
        if (e.keyCode === 27) {
            $('.popup-container').fadeOut(300);
        }
    }
</script>

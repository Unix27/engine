<div class="SellerInfoWidget__Root-sc-8u9i08-14 jZadTD">
    <div class="SellerInfoWidget__InnerWrapper-sc-8u9i08-10 iQqUsM" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 0.0625em 0.25em, rgba(0, 0, 0, 0.05) 0px -0.0625em 0.0625em; z-index: 2;">
        <div class="SellerInfoWidget__Main-sc-8u9i08-11 dwFlwj">
            <div class="SellerInfoWidget__IconWrapper-sc-8u9i08-9 jVdqYd">
                <svg height="40" viewbox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                    <g fill="none" fill-rule="evenodd" opacity=".75">
                        <rect fill="#41C300" height="28" rx="14" width="28"></rect>
                        <g fill="#FFF" transform="translate(7.366 8.29)">
                            <circle cx="2.179" cy="2.527" r="1.909"></circle>
                            <circle cx="11.088" cy="2.527" r="1.909"></circle>
                        </g>
                        <path d="M8.91 17.818c1.171 1.459 3.02 2.4 5.101 2.4 2.068 0 3.907-.93 5.08-2.372" stroke="#FFF" stroke-linecap="round" stroke-width="1.909"></path>
                    </g></svg>
            </div>
            <div class="SellerInfoWidget__Description-sc-8u9i08-0 hWpUjH">
                <p class="SellerInfoWidget__Seller-sc-8u9i08-15 gRawZL">{{ t('Store') }} <span itemprop="brand"> {{ empty($products->first()->seller->name) ? 'unknown' : $products->first()->seller->name }} </span></p>
                <p class="SellerInfoWidget__Reliability-sc-8u9i08-12 gKbxsJ">
                    <strong>{{ t('Reliable seller') }} - {{ empty($products->first()->seller->positive_rate) ? 'unknown' : $products->first()->seller->positive_rate }} </strong>
                </p>
            </div>
            <div class="SellerInfoWidget__DetailsTriggers-sc-8u9i08-8 knaGho">
                <div class="SellerInfoWidget__DetailsHide-sc-8u9i08-4 eQzoSr iconClose" style="visibility: hidden;">
                    <svg class="IconClose__Svg-lys96j-0 jRMTGd closeInfoBlock" height="16" viewbox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.177 2.587l.177-.177L13.6.646 8 6.236 2.4.646.646 2.4l5.6 5.6-5.6 5.6L2.4 15.354l5.6-5.6 5.6 5.6 1.764-1.764-5.6-5.6 5.413-5.413z" fill-opacity=".3" stroke="#fff" stroke-width=".5"></path></svg>
                </div>
                <button class="SellerInfoWidget__DetailsShow-sc-8u9i08-5 bXkdng">
                    <div class="SellerInfoWidget__DetailsShowText-sc-8u9i08-6 jktXIu showBlockInfo showInfoDesk">
                        {{ t('Learn more') }}
                    </div>
                    <div class="SellerInfoWidget__DetailsShowIcon-sc-8u9i08-7 jxHvGS showBlockInfo showInfoMob">
                        <svg height="50" viewbox="0 0 28 50" width="28" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.645 23.332L0 25l24.68 25 3.293-3.332L6.582 25 27.97 3.332 24.68 0zm0 0"></path></svg>
                    </div>
                </button>
            </div>
        </div>
        <div class="SellerInfoWidget__Details-sc-8u9i08-1 cSBYOp infoBlock" style="display:none;">
            <ul class="SellerInfoWidget__DetailsList-sc-8u9i08-2 iQoBmf">
                @if(!empty($products->first()->seller->open_at))
                    <li class="SellerInfoWidget__DetailsItem-sc-8u9i08-3 chnnBf" type="good">{{ t('More on site') }} {{ \Carbon\Carbon::createFromDate($products->first()->seller->open_at)->diffForHumans(\Carbon\Carbon::now()) }}</li>
                @endif
                @if(!empty($products->first()->seller->positive_num))
                    <li class="SellerInfoWidget__DetailsItem-sc-8u9i08-3 chnnBf" type="good">{{t('High overall rating')}} ({{ $products->first()->seller->positive_num }})</li>
                @endif
                <li class="SellerInfoWidget__DetailsItem-sc-8u9i08-3 chnnBf" type="good">{{ t('Buyers satisfied with communication') }}</li>
                <li class="SellerInfoWidget__DetailsItem-sc-8u9i08-3 chnnBf" type="good">{{t('Products as described')}}</li>
                <li class="SellerInfoWidget__DetailsItem-sc-8u9i08-3 chnnBf" type="good">{{t('Sends goods quickly')}}</li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        $('.showBlockInfo').on('click',function(){
            $('.iconClose').css('visibility','visible');
            $('.showBlockInfo').css('visibility','hidden');

            $('.infoBlock').show();
        });

        $('.closeInfoBlock').on('click',function(){
            $('.iconClose').css('visibility','hidden');
            if(document.body.clientWidth > 600){
                $('.showInfoDesk').css('visibility','visible');
            }else $('.showInfoMob').css('visibility','visible');


            $('.infoBlock').hide();
        });
    });
</script>
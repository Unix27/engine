<div class="whiteList___1-H1l item___jF3um description">
    <div class="item___1NoTC">
        <div class="content___26q-V">
            <div class="collapsed____eyE9">
                <h2 class="header___3Rop9">{{ t('Description') }}</h2>
                <div class="text___3JGYJ" itemprop="description">
                    <p class="paragraph___25Ts9">
                        {!! nl2br(createAutoLink($bestSellerProduct->description)) !!}
                    </p>
                </div>
                <div class="control___2mJIg show">
                    <span class="button___Ljx44" role="button"
                          tabindex="0">
                        {{t('Show full description')}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

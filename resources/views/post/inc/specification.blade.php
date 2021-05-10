<div class="whiteList___1-H1l item___jF3um specifications">
    <div class="item___1NoTC " style="padding-bottom: 0px">
        <div class="content___26q-V">
            <div class="collapsed____eyE9">
                <h2 class="header___3Rop9">{{ t('Specifications') }}</h2>
                <div class="text___3JGYJ product-specs" itemprop="description">
                    <ul class="product-specs-list util-clearfix">
                        @foreach($post->aliexpress_properties['specsModule']['props'] as $prop)
                                @if(empty($prop['attrName']) || empty($prop['attrValue']))
                                    @continue
                                @endif
                                <li class="product-prop line-limit-length">
                                    <span class="property-title">{{ $prop['attrName'] }}:&nbsp;</span>
                                    <span class="property-desc line-limit-length" title="{{ $prop['attrValue'] }}">{{ $prop['attrValue'] }}</span>
                                </li>

                        @endforeach
                    </ul>
                </div>
                <div class="control___2mJIg show">
                                                                        <span class="button___Ljx44" role="button"
                                                                              tabindex="0">
                                                                            {{t('Show full specifications')}}
                                                                        </span>
                </div>
            </div>
        </div>
    </div>
</div>

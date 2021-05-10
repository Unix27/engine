<div class="column___1WRbZ marginBottom___lo7lp md-6___1lvJ4 product-card-left">
    <div class="column___ev7rq enabled___72Ed0 equalToParent___1RVeE stickyWithOverflow___3cJJ2 scrollDown___3KO2l" style="min-height: auto;top: 0;position: -webkit-sticky;position: sticky;">
        <div class="inner___3Z5Lk">
            <div class="element___Zz7DL">
                <div>
                    <div class="">
                        <div class=" whiteList___1-H1l whiteblock_style">
                            <div class="item___1NoTC ">
                                @if($post->pictures->count() > 0)
                                    @include('post.inc.gallery')
                                @endif
                            </div>
                        </div>
                        <div class="only_mobile special-title-for-mob">
                            @include('post.inc.seller-best-price')
                            {{--@if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber']))
                                @include('post.inc.price-for-auth')
                            @else
                                @include('post.inc.price-for-not-auth')
                            @endif--}}
                        </div>
                        @include('post.inc.description')
                        <div class="whiteList___1-H1l whiteblock_style">
                            @include('post.inc.warranty')
                        </div>

                        <div class="item___1NoTC " style="padding-bottom:0;">
                            <div class="content___26q-V">
                                <div class="reviews___3jY5u">
                                    @if (config('plugins.reviews.installed'))
                                        @if (view()->exists('reviews::comments'))
                                            @include('reviews::comments')
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resizeTriggers___O7gyu">
                    <div>
                        <div style="width: 618px; height: 1809px;"></div>
                    </div>
                    <div class="contractTrigger___2DSPP"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($post) and !empty($post))
    @if (isset($rvPost) and !empty($rvPost))
        <div class="content___26q-V     ">
            <div class="reviews___3jY5u">
                <div class="stars___2bveX">
                    <div class="stars___2iHVT"
                         itemprop="aggregateRating" itemscope=""
                         itemtype="http://schema.org/AggregateRating">
                        <meta itemprop="worstRating"
                              content="1">
                        <meta itemprop="bestRating" content="5">
                        @for ($i=1; $i <= 5 ; $i++)
                            <div class="{{ ($i <= $bestSellerProduct->rating->average_star) ? 'full___2k4uO inline___2QbC9' : 'empty___336Iz inline___2QbC9' }}"></div>
                        @endfor
                        <div class="value___znPTi"><span
                                itemprop="ratingValue">{{ number_format($bestSellerProduct->rating->average_star, 1) }}</span>
                        </div>
                        <meta itemprop="reviewCount" content="{{ $bestSellerProduct->rating->total_valid_num }}">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
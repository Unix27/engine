@if (!empty($posts))
    @foreach($posts as $key => $post)
        @if(!isset($posts_length))
            @php
                $posts_length = 100000000;
            @endphp
        @endif

        @if($key < $posts_length)
            @php
                $rvPost = \App\Plugins\reviews\app\Models\Post::find($post->id);
                if ($rvPost->pictures->count() > 0) {
											//$postImg = $rvPost->pictures->first()->product_picture_url ? $rvPost->pictures->first()->product_picture_url : imgUrl($rvPost->pictures->first()->filename, 'medium');
											$postImg = imgUrl($rvPost->pictures->first()->filename, 'large');
										} else {
											$postImg = imgUrl(config('larapen.core.picture.default'));
										}

            @endphp
            @if(empty($rvPost) or !$rvPost->products->count())
                @continue
            @endif
            <div class="cell">
                <div class="product-cell product">
                    <a class="product-cell__content"  data-source="body" target="_blank"
                       href="{{ \App\Helpers\UrlGen::post($post) }}">
                        <div class="squareContent">
                            <div class="square">
                                <div class="square__content">
                                    <div class="imageWrap">
                                        <img alt="{{ $rvPost->title }}"
                                             class="image contain lazyload"
                                             data-src="{{$postImg}}"
                                             sizes="(min-width: 719px) 25vw, (min-width: 1300px) 309px, 50vw"
                                             >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="badges">
                            @if(!empty($rvPost->calc_discount))
                                <div class="badge discountBadge">-{{ $rvPost->calc_discount }}%</div>
                            @endif
                        </div>
                        <div class="price">
                        <span>
                                {{ $rvPost->formatted_price }}
                        </span>
                        </div>

                        <div class="rating-wrap">
                            <div class="rating">
                                <div class="stars">
                                    <div class="starFill" style="width:{{ $rvPost->average_star_rage }}px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="name">{{ \Illuminate\Support\Str::limit($rvPost->title, 70) }}</div>
                        <div class="information">
                            <i class="fa fa-info-circle"></i> @lang('global.trial_information')
                            <div class="hidden-information">
                                @lang('global.trial_text')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @endforeach
@endif
<script>
    var lazy = function lazy() {
        document.addEventListener('lazyloaded', function (e)  {
            e.target.parentNode.classList.remove('loading___1Uivf');
            e.target.parentNode.classList.remove('lazy___1YPEm');
        });
    };

    lazy();
</script>
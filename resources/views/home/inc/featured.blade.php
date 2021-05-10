<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
    die();
}
?>
@if (isset($featured) and !empty($featured) and !empty($featured->posts))
	<div class="whiteList___1-H1l item___jF3um">
		<div class="item___1NoTC ">
			<div class="content___26q-V">
				<div class="productsBig___2lkFA"><h2 class="header___2p4qT">{{t('Similar products')}}</h2>
					<div class="pane___B3IxD   ">
						<div class="reducer___32u8i">
							<div class="inner___2z2h2">
								<div class="content___1F_Xz">
									<div class="featured-list-slider owl-carousel owl-theme container___20QG-">
										<?php
										foreach($featured->posts as $key => $post):
										if (empty($countries) or !$countries->has($post->country_code)) continue;
                                        $rvPost = \App\Plugins\reviews\app\Models\Post::find($post->id);
										// Picture setting
//										$pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
										if ($rvPost->pictures->count() > 0) {
											$postImg = $rvPost->pictures->first()->product_picture_url ? $rvPost->pictures->first()->product_picture_url : imgUrl($rvPost->pictures->first()->filename, 'medium');
//											$postImg = imgUrl($pictures->first()->filename, 'medium');
										} else {
											$postImg = imgUrl(config('larapen.core.picture.default'));
										}

										// Category
										$cacheId = 'category.' . $post->category_id . '.' . config('app.locale');
										$liveCat = \Illuminate\Support\Facades\Cache::remember($cacheId, $cacheExpiration, function () use ($post) {
											$liveCat = \App\Models\Category::find($post->category_id);
											return $liveCat;
										});
										?>
											<div class="product___2RGDQ rowItem___3aCGZ bordered___1tN3V compact___1hJey">
												<a class="productLink___13JLR" target="_blank" href="{{ \App\Helpers\UrlGen::post($post) }}">
													<div class="imageWrap___3EEao">
														<div class="square___1fugM ">
															<div class="content___3JFLv">
																<img alt="{{ $post->title }}" class="image___2zb04 image___3Zymd contain___2Fhmk"
																	 src="{{$postImg}}" sizes="7.44rem"
																	 srcset="{{$postImg}} 100w,
																	 {{$postImg}} 200w,
																	 {{$postImg}} 400w">
															</div>
														</div>
													</div>
													<div class="content___3YGai">
                                                        @if(!empty($rvPost->price_discount))
                                                        <div class="badges___3AZdR">
                                                            <div class="badge___164Qm discountBadge___miV5Y">
                                                                -{{ $rvPost->price_discount }}%
                                                            </div>
                                                        </div>
                                                        @endif
														<div class="fluidLine___3xEIU">

															<div class="price___2Ke7g">
																<span class="hidden___6wtOd">Price</span>
																<span class="{{ \Illuminate\Support\Facades\Auth::user() ? '' : 'blur_need_auth' }}">
																	@if (isset($liveCat->type))
																		@if (!in_array($liveCat->type, ['not-salable']))
{{--                                                                            @include('post.inc._price_or_zero', ['price' => $rvPost->min_price])--}}
{{--                                                                            {{ currency(data_get($rvPost, 'min_price', 0), 'USD', currency()->getUserCurrency()) }}--}}
																		@endif
																	@else
																		{{ '--' }}
																	@endif
																</span>
															</div>
														</div>
														<div class="footer___8h3gB">
															<div class="rating___3vra3">
																<span class="ratingIcon___g9P7J"></span>
                                                                <span>{{ $rvPost->rating_count }}</span>
															</div>
														</div>
													</div>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif

@section('after_style')
	@parent
@endsection

@section('before_scripts')
	@parent

	<script>
		/* Carousel Parameters */
		var carouselItems = {{ (isset($featured) and isset($featured->posts)) ? collect($featured->posts)->count() : 0 }};
		var carouselAutoplay = {{ (isset($featuredOptions) && isset($featuredOptions['autoplay'])) ? $featuredOptions['autoplay'] : 'false' }};
		var carouselAutoplayTimeout = {{ (isset($featuredOptions) && isset($featuredOptions['autoplay_timeout'])) ? $featuredOptions['autoplay_timeout'] : 1500 }};
		var carouselLang = {
			'navText': {
				'prev': "{{ t('prev') }}",
				'next': "{{ t('next') }}"
			}
		};

	</script>
@endsection

<style type="text/css">

	.owl-carousel,.owl-carousel .owl-item {
		-webkit-tap-highlight-color: transparent;
		position: relative
	}

	.owl-carousel {
		display: none;
		width: 100%;
		/*z-index: 1*/
	}

	.owl-carousel .owl-stage {
		position: relative;
		-ms-touch-action: pan-Y;
		touch-action: manipulation;
		-moz-backface-visibility: hidden
	}

	.owl-carousel .owl-stage:after {
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0
	}

	.owl-carousel .owl-stage-outer {
		position: relative;
		overflow: hidden;
		-webkit-transform: translate3d(0,0,0)
	}

	.owl-carousel .owl-item,.owl-carousel .owl-wrapper {
		-webkit-backface-visibility: hidden;
		-moz-backface-visibility: hidden;
		-ms-backface-visibility: hidden;
		-webkit-transform: translate3d(0,0,0);
		-moz-transform: translate3d(0,0,0);
		-ms-transform: translate3d(0,0,0)
	}

	.owl-carousel .owl-item {
		min-height: 1px;
		float: left;
		-webkit-backface-visibility: hidden;
		-webkit-touch-callout: none
	}

	.owl-carousel .owl-item img {
		display: block;
		width: 100%
	}

	.owl-carousel .owl-dots.disabled,.owl-carousel .owl-nav.disabled {
		display: none
	}

	.no-js .owl-carousel,.owl-carousel.owl-loaded {
		display: block
	}

	.owl-carousel .owl-dot,.owl-carousel .owl-nav .owl-next,.owl-carousel .owl-nav .owl-prev {
		cursor: pointer;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none
	}

	.owl-carousel .owl-nav button.owl-next,.owl-carousel .owl-nav button.owl-prev,.owl-carousel button.owl-dot {
		background: 0 0;
		color: inherit;
		border: none;
		padding: 0!important;
		font: inherit
	}

	.owl-carousel.owl-loading {
		opacity: 0;
		display: block
	}

	.owl-carousel.owl-hidden {
		opacity: 0
	}

	.owl-carousel.owl-refresh .owl-item {
		visibility: hidden
	}

	.owl-carousel.owl-drag .owl-item {
		-ms-touch-action: pan-y;
		touch-action: pan-y;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none
	}

	.owl-carousel.owl-grab {
		cursor: move;
		cursor: grab
	}

	.owl-carousel.owl-rtl {
		direction: rtl
	}

	.owl-carousel.owl-rtl .owl-item {
		float: right
	}

	.owl-carousel .animated {
		animation-duration: 1s;
		animation-fill-mode: both
	}

	.owl-carousel .owl-animated-in {
		z-index: 0
	}

	.owl-carousel .owl-animated-out {
		z-index: 1
	}

	.owl-carousel .fadeOut {
		animation-name: fadeOut
	}

	@keyframes fadeOut {
		0% {
			opacity: 1
		}

		100% {
			opacity: 0
		}
	}

	.owl-height {
		transition: height .5s ease-in-out
	}

	.owl-carousel .owl-item .owl-lazy {
		opacity: 0;
		transition: opacity .4s ease
	}

	.owl-carousel .owl-item .owl-lazy:not([src]),.owl-carousel .owl-item .owl-lazy[src^=""] {
		max-height: 0
	}

	.owl-carousel .owl-item img.owl-lazy {
		transform-style: preserve-3d
	}

	.owl-carousel .owl-video-wrapper {
		position: relative;
		height: 100%;
		background: #000
	}

	.owl-carousel .owl-video-play-icon {
		position: absolute;
		height: 80px;
		width: 80px;
		left: 50%;
		top: 50%;
		margin-left: -40px;
		margin-top: -40px;
		background: url(owl.video.play.png) no-repeat;
		cursor: pointer;
		z-index: 1;
		-webkit-backface-visibility: hidden;
		transition: transform .1s ease
	}

	.owl-carousel .owl-video-play-icon:hover {
		-ms-transform: scale(1.3,1.3);
		transform: scale(1.3,1.3)
	}

	.owl-carousel .owl-video-playing .owl-video-play-icon,.owl-carousel .owl-video-playing .owl-video-tn {
		display: none
	}

	.owl-carousel .owl-video-tn {
		opacity: 0;
		height: 100%;
		background-position: center center;
		background-repeat: no-repeat;
		background-size: contain;
		transition: opacity .4s ease
	}

	.owl-carousel .owl-video-frame {
		position: relative;
		z-index: 1;
		height: 100%;
		width: 100%
	}

	.owl-theme .owl-dots,.owl-theme .owl-nav {
		text-align: center;
		-webkit-tap-highlight-color: transparent
	}

	.owl-theme .owl-nav {
		margin-top: 10px
	}

	.owl-theme .owl-nav [class*=owl-] {
		color: #fff;
		font-size: 14px;
		margin: 5px;
		padding: 4px 7px;
		background: #d6d6d6;
		display: inline-block;
		cursor: pointer;
		border-radius: 3px
	}

	.owl-theme .owl-nav [class*=owl-]:hover {
		background: #869791;
		color: #fff;
		text-decoration: none
	}

	.owl-theme .owl-nav .disabled {
		opacity: .5;
		cursor: default
	}

	.owl-theme .owl-nav.disabled+.owl-dots {
		margin-top: 10px
	}

	.owl-theme .owl-dots .owl-dot {
		display: inline-block;
		zoom:1}

	.owl-theme .owl-dots .owl-dot span {
		width: 10px;
		height: 10px;
		margin: 5px 7px;
		background: #d6d6d6;
		display: block;
		-webkit-backface-visibility: visible;
		transition: opacity .2s ease;
		border-radius: 30px
	}

	.owl-theme .owl-dots .owl-dot.active span,.owl-theme .owl-dots .owl-dot:hover span {
		background: #869791
	}
</style>

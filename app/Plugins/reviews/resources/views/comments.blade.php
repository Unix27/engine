<div class="item___1CKW7_">
    <div class="whiteList___1-H1l">
        <h2 class="header___1ARMY" style="padding-top: 24px;">{{ t('Reviews') }}</h2>
        @if (view()->exists('reviews::ratings-single'))
            @include('reviews::ratings-single')
        @endif
        @if (isset($post) and !empty($post))
            <?php
            if (!isset($rvPost) || empty($rvPost)) {
                $rvPost = \App\Plugins\reviews\app\Models\Post::withoutGlobalScopes([\App\Models\Scopes\ActiveScope::class, \App\Models\Scopes\ReviewedScope::class])->find($post->id);
            }
            ?>

            @if (isset($rvPost) and !empty($rvPost))
                <?php
                // Get all reviews that are not spam for the product and paginate them
                $reviews = $rvPost->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(20);
                ?>
                <div class="col-md-12 well product-card-reviews-anchor" id="reviews-anchor">

                    @if (Session::get('errors'))
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="alert alert-danger mb-0">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><strong>{{ trans('reviews::messages.There were errors while submitting this review') }}:</strong></h5>
                                    <ul class="list list-check">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('review_posted'))
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="alert alert-success mb-0">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p class="mb-0"><strong>{{ trans('reviews::messages.Your review has been posted!') }}</strong></p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('review_removed'))
                        <div class="row pt-3">
                            <div class="col-md-12">
                                <div class="alert alert-success mb-0">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p class="mb-0"><strong>{{ trans('reviews::messages.Your review has been removed!') }}</strong></p>
                                </div>
                            </div>
                        </div>
                    @endif



                    @if (auth()->check() && false)
                        <div class="content___3bKj2" id="post-review-box">
                            <form action="{{ lurl('post/' . $rvPost->id . '/review/create') }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="rating" id="rating">

                                <div class="  item___jF3um <?php echo (isset($errors) and $errors->has('comment')) ? 'has-error' : ''; ?>">
                                    <div class="">
                                                <textarea name="comment"
                                                          id="comment"
                                                          rows="5"
                                                          class="form-control animated textarea___1ukLe"
                                                          placeholder="{{ trans('reviews::messages.Enter your review here...') }}"
                                                >{{ old('comment') }}</textarea>
                                    </div>
                                </div>
                                <diV class="item___jF3um">
                                    <div style="" class="stars starrr" data-rating="{{ old('rating', 0) }}"></div>
                                    <div style="" >
                                        <button class="btn btn-success btn-lg" type="submit">{{ trans('reviews::messages.Leave a Review') }}</button>
                                    </div>
                                </diV>
                            </form>
                        </div>
                    @endif

                    @php
                        $reviewsJson = storage_path('app/reviews.json');
                        $customReviews = json_decode(file_get_contents($reviewsJson), 1);
                        $customKeys = array_rand($customReviews, rand(2, 3));
                    @endphp
                    @if ($reviews->count() > 0 || $customKeys)
                        <div class="content___3bKj2">
                            <div class="review-loader" style="display: none">
                                <img class="userImg" src="{{ url('images/loading_cover.gif') }}" alt="loading...">
                            </div>
                            <div class="review-container"></div>
                        </div>
                        <div class="controls___2Cwdj" style="cursor: pointer;padding-bottom: 24px;">
                            <a class="next___1WWey">{{ t('Show next reviews') }}</a>
                        </div>
                    @endif
                </div>
            @endif
        @endif
    </div>
</div>

@section('after_styles')
    @parent
    <style type="text/css">
        .ads-details .tab-content {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .ads-details .well {
            margin-bottom: 0;
            border: 0;
            background-color: #fafafa;
        }
        #tab-reviews {
            margin-top: 0;
        }
        #tab-reviews > div {
            padding: 0 10px;
        }
        /* Enhance the look of the textarea expanding animation */
        .reviews-widget .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }
        .reviews-widget .stars {
            margin: 20px 0;
            font-size: 24px;
            color: #ffc32b;
        }
        .reviews-widget .stars a {
            color: #ffc32b;
        }
        .reviews-widget .comments span.icon-star,
        .reviews-widget .comments span.icon-star-empty {
            margin-top: 5px;
            font-size: 16px;
            @if (config('lang.direction') == 'rtl')
            margin-left: -8px;
            @else
            margin-right: -8px;
            @endif
        }
        .reviews-widget .comments .rating-label {
            margin-top: 5px;
            font-size: 16px;
            @if (config('lang.direction') == 'rtl')
            margin-right: 4px;
            @else
            margin-left: 4px;
            @endif
        }

        @media (min-width: 576px) {
            #post-review-box .form-group {
                margin-bottom: 0;
            }
            #post-review-box .form-control {
                width: 100%;
            }
        }

        .starrr {
            display: inline-block;
        }

        .starrr a {
            font-size: 16px;
            padding: 0 1px;
            cursor: pointer;
            color: #ffc32b;
            text-decoration: none;
        }
        .starrr {
            display: inline-block;
        }

        .starrr a {
            font-size: 16px;
            padding: 0 1px;
            cursor: pointer;
            color: #ffc32b;
            text-decoration: none;
        }
        body.fancybox-active {
            overflow: hidden;
        }
    </style>
    <link href="https://vjs.zencdn.net/7.8.3/video-js.css" rel="stylesheet" />
@endsection

@section('footer_scripts')
    @parent
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://vjs.zencdn.net/7.8.3/video.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click tap', '.user-picture__main-slide', function (e) {
                e.preventDefault();
                let target = $(e.target);
                let type = target.data('type');
                let imgs = target.closest('.medias___2QGhH').data('slides');
                if(!imgs) return;
                if(!Array.isArray(imgs)) return;
                imgs = imgs.map(function (img) {
                    return {
                        src: img
                    }
                });

                var index = parseFloat($(this).attr('data-slide-index')) || 0;

                $.fancybox.open(imgs, {
                    backFocus: false,
                    loop : true
                }, index);
            });

            var page = 1;
            var totalReviews = {!! $reviews->count() !!};
            if(totalReviews) {
                loadReviews();
            } else {
                $('.controls___2Cwdj').hide();
            }

            $(".controls___2Cwdj").on('click',function() {
                loadReviews();
            });

            function loadReviews() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/posts/' + {!! $post->id !!} + '/review/show',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        page: page
                    },
                    beforeSend: function () {
                        $('.review-container').hide();
                        $('.review-loader').show();
                    },
                    success: function (response) {
                        if(response.html.length !== 0) {
                            $('.review-container').append(response.html).show();
                            $('.review-loader').hide();
                            page++;
                        }

                        if(response.hasMorePages !== 'undefined' && response.hasMorePages == 0) {
                            $(".controls___2Cwdj").hide();
                        }
                    }
                });
            }
        });
    </script>
@endsection

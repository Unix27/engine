@foreach($reviews as $review)
    <div class="item___1NoTC">
        <div class="content___26q-V">
            <div class="review___TxpAd" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
                <div class="header___26Oo7">
                    <div class="avatar___yJgQF">
                        <img class="image___2zb04 avatar____C13d image___2zb04" alt=""
                             src="{{ url('images/user.jpg') }}" sizes="(min-width: 768px) 5vw, 10vw" srcset="{{ url('images/user.jpg') }} 100w, {{ url('images/user.jpg') }} 200w"></div>
                    <div class="date___1UTUf" itemprop="datePublished" content="{{$review->created_at}}">
                        {{ $review->timeago }}
                    </div>
                    <div class="stars___NvOY9">
                        <div class="stars___2iHVT" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
                            <meta itemprop="worstRating" content="1">
                            <meta itemprop="bestRating" content="5">
                            @for ($i=1; $i <= 5 ; $i++)
                                <div class="{{ ($i <= $review->rating) ? 'full___2k4uO inline___2QbC9' : 'empty___336Iz inline___2QbC9'}}"></div>
                            @endfor
                            <meta itemprop="ratingValue" content="{{$review->rating}}">
                        </div>
                    </div>
                    <div class="name___QNhWi" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
                                                                <span itemprop="name">
                                                                    {{ $review->user ? $review->user->name : \Illuminate\Support\Str::between($review->user_name, 4, 6) }}
                                                                </span>
                    </div>
                </div>

                @if($review->pictures->count() > 0 or $review->video->count() > 0)
                    <div class="medias___2QGhH" data-slides='[
<?php
                    $result = '';
//                    if($review->video->count() > 0) {
//                        foreach($review->video as $key => $video){
//                            $result .= '"' . ($video->video_url) . '",';
//                        }
//                    }
                    if($review->pictures->count() > 0) {
                        foreach($review->pictures as $key => $image){
                            $result .= '"' . ($image->filename ? imgUrl($image->filename, 'big') : $image->picture_url) . '",';
                        }
                    }
                    $result = rtrim($result, ",");
                    echo $result;
                    ?>
                        ]'>
{{--                        @if($review->video->count() > 0)--}}
{{--                            @foreach($review->video as $key => $video)--}}
{{--                                <div class="wrapper___1jOjP media___3Uo_0 video___1BTrf">--}}
{{--                                    <div class="square___1fugM square___2MIyH" role="button" tabindex="-1">--}}
{{--                                        <div class="content___3JFLv user-picture__main-slide" data-type="iframe" data-slide-index="{{$key}}">--}}
{{--                                            <img class="image___2zb04 image___r0GHQ cover___xWUoT" alt="" src="{{ $video->picture_url_thumbnail }}" sizes="100vw" srcset="{{ $video->picture_url_thumbnail }} 56w, {{ $video->picture_url_thumbnail }} 112w, {{ $video->picture_url_thumbnail }} 225w, {{ $video->picture_url_thumbnail }} 576w, {{ $video->picture_url_thumbnail }} 1080w">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                        @if($review->pictures->count() > 0)
                                @foreach($review->pictures as $key => $image)
                                    <div class="wrapper___1jOjP media___3Uo_0">
                                        <div class="square___1fugM square___2MIyH" role="button" tabindex="-1">
                                            <div class="content___3JFLv user-picture__main-slide" data-type="image" data-slide-index="{{ $key }}">
                                                <img class="image___2zb04 image___r0GHQ cover___xWUoT" alt="" src="{{ $image->filename ? imgUrl($image->filename, 'small') : $image->picture_url_thumbnail }}" sizes="100vw" srcset="{{ $image->filename ? imgUrl($image->filename, 'small') : $image->picture_url_thumbnail }} 56w, {{ $image->filename ? imgUrl($image->filename, 'small') : $image->picture_url_thumbnail }} 112w, {{ $image->filename ? imgUrl($image->filename, 'small') : $image->picture_url_thumbnail }} 225w, {{ $image->filename ? imgUrl($image->filename, 'small') : $image->picture_url_thumbnail }} 576w, {{ $image->filename ? imgUrl($image->filename, 'small') : $image->picture_url_thumbnail }} 1080w">
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                        @endif
                    </div>
                @endif
                @if($review->comment)
                    <div class="text___KHCmI">
                        <p itemprop="description">
                            {!! $review->comment !!}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach


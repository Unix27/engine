<div class="content___26q-V">
    <div class="gallery___1ERcI  prod-gallery">
        <div id="bx-pager"
             class="prod-gallery__side  product-view-thumb thumbs___1fypC //">
            @foreach($postPictures as $key => $image)
                @if($key < 6)
                    <a data-slide-index="{{ $key }}" class="prod-gallery__prev-slide-link imageId{{$image->id}}">
                        <div style="margin: 0 15% 13% 0;">
                            <div
                                class="wrapper___1jOjP thumb___1midQ">
                                <div
                                    class="square___1fugM square___2MIyH"
                                    role="button">
                                    <div
                                        class="content___3JFLv">
                                        <img
                                            class="image___2zb04 image___r0GHQ contain___2Fhmk"
                                            alt="{{ $post->title }}"
                                            src="{{ $image->filename ? imgUrl($image->filename, 'small') : $image->product_picture_url }}">
                                            @if(isset($image->product_video_url))
                                                <span class="play-icon"></span>
                                            @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @else
                    <a data-slide-index="{{ $key }}" class="imageId{{$image->id}}">
                        <div style="margin: 0 15% 15% 0;">
                            <div
                                class="wrapper___1jOjP thumb___1midQ">
                                <div
                                    class="square___1fugM square___2MIyH"
                                    role="button">
                                    <div
                                        class="content___3JFLv">
                                        <img
                                            class="image___2zb04 image___r0GHQ contain___2Fhmk"
                                            alt="{{ $post->title }}"
                                            src="{{ $image->filename ? imgUrl($image->filename, 'small') : $image->product_picture_url }}">

                                    </div>
                                </div>
                                <span
                                    class="more___3CG9e"><span
                                        class="moreText___2zYC2">+
                                        <!-- -->{{$post->pictures->count() - $key}}</span></span>
                            </div>
                        </div>
                    </a>
                    @break
                @endif
            @endforeach
        </div>
        <div class="prod-gallery__main-gallery main___1VKwK">
            <div class="square___1fugM ">
                <div class="content___3JFLv">
                    <div
                        class="swipe___3R79O  swipe___131_W"
                        style="visibility: visible;">
                        <div class="prod-gallery__main-gallery-carousel  bxslider  inner___1-Ita  owl-carousel" data-slides='[<?php
                            $result = '';
                                foreach($postPictures as $key => $image){
                                    if(isset($image->product_video_url)) {
                                        $result .= '"' . $image->product_video_url . '",';
                                    } else {
                                        $result .= '"' . ($image->filename ? imgUrl($image->filename, 'big') : $image->product_picture_url) . '",';
                                    }

                                }
                                $result = rtrim($result, ",");
                                echo $result;
                            ?>]'
                        >
                            @foreach($postPictures as $key => $image)
                                <div href="@if(isset($image->product_video_url)){{ $image->product_video_url }}@else{{ $image->filename ? imgUrl($image->filename, 'big') : $image->product_picture_url }}@endif"
                                     data-slide-index="{{ $key }}"
                                     data-options="zoomPosition: inner;"
                                    class="prod-gallery__main-slide  wrapper___1jOjP child___eQkzZ image___3SP86 MagicZoom imageId{{$image->id}}">
                                    <div
                                        class="square___1fugM square___2MIyH"
                                        role="button"
                                        tabindex="-1">
                                        <div
                                           class="content___3JFLv">
                                            <img
                                                itemprop="image"
                                                class="image___2zb04 image___r0GHQ contain___2Fhmk lazyload loading___1Uivf lazy___1YPEm"
                                                alt="{{ $post->title }}"
                                                data-src="{{ $image->filename ? imgUrl($image->filename, 'large') : $image->product_picture_url }}">
                                            >
                                            @if(isset($image->product_video_url))
{{--                                                <div class="item-video image___2zb04 image___r0GHQ contain___2Fhmk" style="background-image: url('{{$image->product_picture_url}}')">--}}
{{--                                                    <iframe width="277" height="315" src="{{$image->product_video_url}}">--}}
{{--                                                    </iframe>--}}
                                                    <span class="play-icon"></span>
{{--                                                </div>--}}
                                            @endif

{{--                                            @endif--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

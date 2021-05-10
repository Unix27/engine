@if (isset($paginator) and $paginator->getCollection()->count() > 0)
    @foreach($paginator->getCollection() as $key => $post)
        <?php
        $rvPost = \App\Plugins\reviews\app\Models\Post::find($post->id);
        // Get Post's Pictures
        $pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
        if ($pictures->count() > 0) {
            $postImg = $pictures->first()->filename ? imgUrl($pictures->first()->filename, 'large') : $pictures->first()->product_picture_url;
        } else {
            $postImg = imgUrl(config('larapen.core.picture.default'));
        }

        // Convert the created_at date to Carbon object
//        $post->created_at = \Date::parse($post->created_at)->timezone(config('timezone.id'));
//        $post->created_at = $post->created_at->ago();
        ?>
        @continue(!$rvPost)
        <div class="cell">
            <div class="product-item product-box">
                <a class="content-item" data-source="body" target="_blank"
                   href="{{ \App\Helpers\UrlGen::post($post) }}">
                    <div class="squareContent">
                        <div class="square">
                            <div class="content-image">
                                <div class="imageWrap">
                                    <img alt="" class="image image-inline contain"
                                         src="{{ $postImg }}"
                                         sizes="(min-width: 0) 50vw, (min-width: 600px) 25vw, (min-width: 840px) 20vw, 50vw"
                                         srcset="{{ $postImg }} 100w, {{ $postImg }} 200w, {{ $postImg }} 400w">
                                </div>
{{--                                <div class="adBadge">AD</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="badges">
                        @if(!empty($rvPost->calc_discount))
                            <div class="badge discountBadge">-{{ $rvPost->calc_discount }}%</div>
                        @endif
                    </div>
                    <div class="price"><span class="hidden">Price </span>
                        <span>
                            @if($rvPost->formatted_price)
                                {{ $rvPost->formatted_price }}
                            @endif
                        </span>
                    </div>
                    <div class="rating">
                        <div class="rating">
                            <div class="stars">
                                <div class="starFill" style="width:{{ $rvPost->average_star_rage }}px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="name">
                        {{ \Illuminate\Support\Str::limit($rvPost->title, 70) }}
                    </div>
                    <div class="information">
                        <i class="fa fa-info-circle"></i> @lang('global.trial_information')
                        <div class="hidden-information">
                            @lang('global.trial_text')
                        </div>
                    </div>
                </a></div>
        </div>
    @endforeach
@endif

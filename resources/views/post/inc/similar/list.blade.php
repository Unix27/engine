<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
?>
@if (!empty($featured))
<div class="inner">
    <div class="whiteList">
        <div class="item">
            <div class="content">
                <h2 class="header">Similar items</h2>
                <div class="content">
                    <div class="products maxSixCols revision wide">
                        <div class="inner">
                            @foreach($featured->posts as $key => $post)
                                @php
                                    $rvPost = \App\Plugins\reviews\app\Models\Post::find($post->id);
                                    $pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
                                    if ($pictures->count() > 0) {
                                        $postImg = imgUrl($pictures->first()->filename, 'large');
                                    } else {
                                        $postImg = imgUrl(config('larapen.core.picture.default'));
                                    }
                                @endphp
                                <div class="cell">
                                    <div class="product">
                                        <a class="content" data-source="body" target="_blank" href="{{ \App\Helpers\UrlGen::post($post) }}">
                                            <div class="squareContent">
                                                <div class="square">
                                                    <div class="content">
                                                        <div class="imageWrap">
                                                            <img alt="" class="image contain" src="{{ $postImg }}" sizes="(min-width: 0) 50vw, (min-width: 600px) 33vw, (min-width: 840px) 25vw, (min-width: 1280px) 17vw, 50vw" srcset="{{ $postImg }} 100w, {{ $postImg }} 200w, {{ $postImg }} 400w">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="badges">
                                                @if(!empty($rvPost->price_discount))
                                                    <div class="badge discountBadge">-{{ $rvPost->price_discount }}%</div>
                                                @endif
                                            </div>
                                            <div class="price">
                                                <span>{{ currency(data_get($rvPost, 'price', 0), 'USD', currency()->getUserCurrency()) }}</span>
                                            </div>
                                            <div class="rating">
                                                <div class="rating">
                                                    <div class="stars">
                                                        <div class="starFill" style="width:78.944px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="name">{{ $post->title }}</div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="controls">
                        <a class="button">Show more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

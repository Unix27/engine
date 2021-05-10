<div class="category__children_popup"
     style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div role="button" tabindex="-1" class="contextMenu__overlay"></div>
    <div class="menuPopup newHeaderWebOn">
        <div class="popupContent">
            <div class="inner">
                <nav class="children">
                    @if(!empty($categories))
                        @foreach($categories as $key => $cat)
                            <div class="childWrapper">
                                <a class="child" href="{{ \App\Helpers\UrlGen::category($cat) }}">
                                        <span class="icon">
                                            <img class="image image contain" alt=""
                                                 src="{{ imgUrl($cat->picture, 'cat') }}" sizes="1.5em"
                                                 srcset="{{ imgUrl($cat->picture, 'cat') }} 42w, {{ imgUrl($cat->picture, 'cat') }} 63w, {{ imgUrl($cat->picture, 'cat') }} 84w, {{ imgUrl($cat->picture, 'cat') }} 126w, {{ imgUrl($cat->picture, 'cat') }} 168w"
                                            >
                                        </span>
                                    {{ $cat->name }}
                                </a>
                            </div>
                        @endforeach
                    @endif
                </nav>
            </div>
        </div>
    </div>
</div>
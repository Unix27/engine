<?php
if (!isset($cats)) {
    $cats = collect([]);
}

$cats = $cats->groupBy('parent_id');
$subCats = $cats;
if ($cats->has(0)) {
    $cats = $cats->get(0);
}
if ($subCats->has(0)) {
    $subCats = $subCats->forget(0);
}
?>
<?php
if (
(isset($subCats) and !empty($subCats) and isset($cat) and !empty($cat) and $subCats->has($cat->tid)) ||
(isset($cats) and !empty($cats))
):
?>
<div class="posts_category__column marginBottom md-4 lg-3">
    <div class="column-overflow enabled stickyWithOverflow scrollUp" style="">
        <div class="inner">
            <div class="element">
                <div class="">
                    <div class="leftCol light">
                        <div class="catalog">
                            <div class="catalog-white light">
                                @if (isset($subCats) and !empty($subCats) and isset($cat) and !empty($cat))
                                    @if (!in_array($cat->type, ['not-salable']))
                                        <span class="hoverable">
                                            <a class="cat-link cat-parent" href="/en/search">
                                                <svg width="20" height="20" viewBox="0 0 20 20" class="icon-back">
                                                    <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M15 10H3M9 16l-6-6 6-6"></path>
                                                    </g>
                                                </svg>
                                                <span class="cat-name">{!! $cat->name !!}</span>
                                            </a>
                                        </span>
                                        <?php $parentId = ($cat->parent_id == 0) ? $cat->tid : $cat->parent_id; ?>
                                        @if($subCats->get($cat->tid))
                                            @foreach ($subCats->get($cat->tid) as $iSubCat)
                                                <a class="cat-link" href="{{ \App\Helpers\UrlGen::category($iSubCat, 1) }}" title="{{ $iSubCat->name }}">
                                                    <span class="cat-name-short">{!! \Illuminate\Support\Str::limit($iSubCat->name, 40) !!}</span>
                                                </a>
                                            @endforeach
                                        @endif
                                    @endif
                                @else
                                    @if (isset($cats) and !empty($cats))
                                        @foreach ($cats as $iCategory)
                                            <a class="cat-link next hasIcon"
                                               href="{{ \App\Helpers\UrlGen::category($iCategory) }}">
                                                    <span class="icon">
                                                        <img class="image contain" alt=""
                                                             src="{{ imgUrl($iCategory->picture, 'cat') }}"
                                                             sizes="1.5em"
                                                             srcset="{{ imgUrl($iCategory->picture, 'cat') }} 42w, {{ imgUrl($iCategory->picture, 'cat') }} 63w, {{ imgUrl($iCategory->picture, 'cat') }} 84w, {{ imgUrl($iCategory->picture, 'cat') }} 126w, {{ imgUrl($iCategory->picture, 'cat') }} 168w"
                                                        >
                                                    </span>
                                                {{ $iCategory->name }}
                                            </a>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resizeTriggers">
                    <div>
                        <div style="width: 310px; height: 685px;"></div>
                    </div>
                    <div class="contractTrigger"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

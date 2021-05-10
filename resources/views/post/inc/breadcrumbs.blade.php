<div class="breadcrumbs" itemscope="" vocab="http://schema.org/" typeof="BreadcrumbList">
    <div class="breadcrumbs__inner">
                <span class="breadcrumbs__item" typeof="ListItem" property="itemListElement">
                    <a property="item" typeof="WebPage" lang="en" class="breadcrumbs__link" href="/en">
                        <span property="name">Home</span>
                    </a>
                </span>
        @if (!empty($post->category->parent))
            <span class="breadcrumbs__item" typeof="ListItem" property="itemListElement">
                        <a property="item" typeof="WebPage" lang="en" class="breadcrumbs__link"
                           href="{{ \App\Helpers\UrlGen::category($post->category->parent) }}">
                            <span property="name">
                            {{ $post->category->parent->name }}
                            </span>
                        </a>
             </span>
            @if ($post->category->parent->id != $post->category->id)
                <span class="itbreadcrumbs__item" typeof="ListItem" property="itemListElement">
                            <a property="item" typeof="WebPage" lang="en" class="breadcrumbs__link"
                               href="{{ \App\Helpers\UrlGen::category($post->category->parent, 1) }}">
                                <span property="name">
                                {{ $post->category->name }}
                                </span>
                            </a>
                        </span>
            @endif
        @else

            <span class="breadcrumbs__item" typeof="ListItem" property="itemListElement">
                            <a property="breadcrumbs__item" typeof="WebPage" lang="en" class="breadcrumbs__link"
                               href="{{ \App\Helpers\UrlGen::category($post->category) }}">
                                <span property="name">
                                {{ $post->category->name }}
                                </span>
                            </a>
                        </span>
        @endif
    </div>
</div>

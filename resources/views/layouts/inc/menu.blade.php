<div class="menu__header">
    <div class="parent newHeaderWebOn">
        <div class="header">
            <div class="inner">
                <div class="categories">
                    <nav class="categoriesList">
                        <div class="category all-categories" tabindex="0" role="button">
                            <svg width="16" height="10" class="menu">
                                <path
                                    d="M.883 10C.396 10 0 9.552 0 9s.396-1 .883-1h14.234c.487 0 .883.448.883 1s-.396 1-.883 1H.883zm0-4C.396 6 0 5.552 0 5s.396-1 .883-1h14.234c.487 0 .883.448.883 1s-.396 1-.883 1H.883zm0-4C.396 2 0 1.552 0 1s.396-1 .883-1h14.234c.487 0 .883.448.883 1s-.396 1-.883 1H.883z"></path>
                            </svg>
                            <span>{{ t('All Categories') }}</span>
                        </div>
                        @if(!empty($categories))
                            @foreach($categories as $key => $cat)
                                <a class="category" href="{{ \App\Helpers\UrlGen::category($cat) }}">
                                    {!! $cat->name !!}
                                </a>
                            @endforeach
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


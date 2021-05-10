<div class="navBarContainer__wrapper">
    <div class="navBar">
        <div class="leftSection">
            @if (is_array(LaravelLocalization::getSupportedLocales()) && count(LaravelLocalization::getSupportedLocales()) > 1)
                <div class="navBarItem">
                    <div role="button" tabindex="0" class="selectWrapper__language newHeaderWeb">
                        <div class="selectButton">
                            <div role="button" tabindex="0" class="icon-flag">
                                @php
                                    if(strtoupper(config('app.locale')) == 'EN') {
                                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDIxIDE1IiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGRlZnM+PHBhdGggaWQ9ImEiIGQ9Ik0wIDBoMjF2MTVIMHoiLz48cGF0aCBpZD0iYiIgZD0iTS0xLTFoMjN2MTdILTF6Ii8+PC9kZWZzPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PHVzZSBmaWxsPSIjMjI0MzhCIiB4bGluazpocmVmPSIjYSIvPjxtYXNrIGlkPSJjIiBmaWxsPSIjZmZmIj48dXNlIHhsaW5rOmhyZWY9IiNiIi8+PC9tYXNrPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik0zIDFsLTIuMDMuMDNMMSAzbDE2Ljk4IDExLjAzIDIuMDQtLjA0LS4wNC0xLjk3IiBtYXNrPSJ1cmwoI2MpIi8+PHBhdGggZmlsbD0iI0M3MTUyQSIgZD0iTTEgMmwxOCAxMiAxLTFMMiAxIiBtYXNrPSJ1cmwoI2MpIi8+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTE4IDFoMnYyUzguMjUgMTAuNCAzLjAyIDE0LjAzYy0uMDcuMDQtMiAwLTIgMGwtLjE2LTEuOUwxOCAxeiIgbWFzaz0idXJsKCNjKSIvPjxwYXRoIGZpbGw9IiNDNzE1MkEiIGQ9Ik0xOS4wNC45N0wyMCAyIDIgMTRsLTEtMSIgbWFzaz0idXJsKCNjKSIvPjxwYXRoIGZpbGw9IiNGRkYiIGQ9Ik04IDFoNXY0aDd2NWgtN3Y0SDh2LTRIMVY1aDciIG1hc2s9InVybCgjYykiLz48cGF0aCBmaWxsPSIjQzcxNTJBIiBkPSJNOSAxaDN2NWg4djNoLTh2NUg5VjlIMVY2aDgiIG1hc2s9InVybCgjYykiLz48L2c+PC9zdmc+";
                                    } elseif(strtoupper(config('app.locale')) == 'DE') {
                                        $src = "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMSIgaGVpZ2h0PSIxNSIgdmlld0JveD0iMCAwIDIxIDE1Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiMwMDAiIGQ9Ik0wIDBoMjF2MTVIMHoiLz48cGF0aCBmaWxsPSIjRkYyNTAwIiBkPSJNMCA1aDIxdjVIMHoiLz48cGF0aCBmaWxsPSIjRkZDQzAxIiBkPSJNMCAxMGgyMXY1SDB6Ii8+PC9nPjwvc3ZnPg==";
                                    }

                                @endphp
                                <img alt="{{ strtoupper(config('app.locale')) }}"
                                     class="icon-flag__image icon-flag__selectImage" src="{{$src}}">
                            </div>
                            {{config('app.locale') == 'en' ? 'English': 'German'}}
                            <svg width="9" height="6" class="selectButton__selectArrow">
                                <path
                                    d="M1.414.536h6.243a1 1 0 01.707 1.707L5.243 5.364a1 1 0 01-1.415 0L.708 2.243A1 1 0 011.413.536z"
                                    fill="#8E90A7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
            <div class="navBarItem">
                <div class="selectWrapper__currency">
                    <div role="button" tabindex="0" class="button selectButton">
                        {{ strip_tags(currency()->getUserCurrency()) }}
                        <svg width="9" height="6" class="selectArrow">
                            <path
                                d="M1.414.536h6.243a1 1 0 01.707 1.707L5.243 5.364a1 1 0 01-1.415 0L.708 2.243A1 1 0 011.413.536z"
                                fill="#8E90A7"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightSection">
            <nav class="navBarLinks" style="display: none;">
                <a class="navBarItem navBarLink" href="/en/support">Support</a>
                <a class="navBarItem navBarLink" href="/en/support?s=ordering-paying&amp;f=fees-taxes">Delivery</a>
                <a class="navBarItem navBarLink" href="/en/support?s=refund-policy-warranty">{{ t('Warranty') }}</a>
            </nav>
        </div>
    </div>
</div>

@if (is_array(LaravelLocalization::getSupportedLocales()) && count(LaravelLocalization::getSupportedLocales()) > 1 && !$agent->isMobile())
@section('modal_menu')

    <div>
        <div class="contextMenu bottom newHeaderWebOn select_language" style="display: none">
            <div role="button" tabindex="-1" class="contextMenu__overlay"></div>
            <div class="menu_pos_transform"
                style="position: absolute; will-change: transform; top: 0; left: 0; transform: translate3d(115px, 34px, 0px);">
                <div class="menu" role="button" tabindex="-1">
                    <div>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if (strtolower($localeCode) != strtolower(config('app.locale')))
                                <?php
                                // Controller Parameters
                                $attr = [];
                                $attr['countryCode'] = config('country.icode');
                                if (isset($uriPathCatSlug)) {
                                    $attr['catSlug'] = $uriPathCatSlug;
                                    if (isset($uriPathSubCatSlug)) {
                                        $attr['subCatSlug'] = $uriPathSubCatSlug;
                                    }
                                }
                                if (isset($uriPathCityName) && isset($uriPathCityId)) {
                                    $attr['city'] = $uriPathCityName;
                                    $attr['id'] = $uriPathCityId;
                                }
                                if (isset($uriPathUserId)) {
                                    $attr['id'] = $uriPathUserId;
                                    if (isset($uriPathUsername)) {
                                        $attr['username'] = $uriPathUsername;
                                    }
                                }
                                if (isset($uriPathUsername)) {
                                    if (isset($uriPathUserId)) {
                                        $attr['id'] = $uriPathUserId;
                                    }
                                    $attr['username'] = $uriPathUsername;
                                }
                                if (isset($uriPathTag)) {
                                    $attr['tag'] = $uriPathTag;
                                }
                                if (isset($uriPathPageSlug)) {
                                    $attr['slug'] = $uriPathPageSlug;
                                }
                                if (\Illuminate\Support\Str::contains(\Route::currentRouteAction(), 'Post\DetailsController')) {
                                    $postArgs = request()->route()->parameters();
                                    $attr['slug'] = isset($postArgs['slug']) ? $postArgs['slug'] : getSegment(1);
                                    $attr['id'] = isset($postArgs['id']) ? $postArgs['id'] : getSegment(2);
                                }
                                // $attr['debug'] = '1';

                                // Default
                                // $link = LaravelLocalization::getLocalizedURL($localeCode, null, $attr);
                                $link = lurl(null, $attr, $localeCode);
                                $localeCode = strtolower($localeCode);

                                ?>

                                <a href="{{ $link }}" hreflang="{{ $localeCode }}"
                                   class="menu__item clickable">{!! $properties['native'] !!}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="corner" style="left: 106px;"></div>
            </div>
        </div>
    </div>
    <div>
        <div class="contextMenu bottom newHeaderWebOn select_currency"  style="display: none">
            <div role="button" tabindex="-1" class="contextMenu__overlay"></div>
            <div class="menu_pos_transform"
                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(200px, 34px, 0px);">
                <div class="menu" role="button" tabindex="-1">
                    <div>
                        <a href="{{url()->current()}}/?currency=EUR" class="menu__item clickable">
                            EUR
                        </a>
                        <a href="{{url()->current()}}/?currency=USD" class="menu__item clickable">
                            USD
                        </a>
                    </div>
                </div>
                <div class="corner" style="left: 106px;"></div>
            </div>
        </div>
    </div>

@endsection
@endif

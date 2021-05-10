@extends('layouts.master')

@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="page__catalog">
        <div class="parent">
            <div class="inner">
                <h1 class="header">{{ t('Product catalog') }}</h1>
                <div class="whiteList">
                    @foreach ($cats as $key => $iCat)
                        <div class="item">
                            <div class="content">
                                <div class="cardInner">
                                    <div class="cardInner">
                                        <h2 class="subheader">
                                            <div>
                                                <img class="image image contain" alt="" src="{{ imgUrl($iCat->picture, 'cat') }}" sizes="6rem" srcset="{{ imgUrl($iCat->picture, 'cat') }} 42w, {{ imgUrl($iCat->picture, 'cat') }} 63w, {{ imgUrl($iCat->picture, 'cat') }} 84w, {{ imgUrl($iCat->picture, 'cat') }} 126w, {{ imgUrl($iCat->picture, 'cat') }} 168w">
                                            </div>
                                            <a class="category-link" href="{{ \App\Helpers\UrlGen::category($iCat) }}">{!! $iCat->name !!}</a>
                                        </h2>
                                        <div class="children">
                                            @if (isset($subCats) and $subCats->has($iCat->tid))
                                                @foreach ($subCats->get($iCat->tid) as $iSubCat)
                                                    <div class="child">
                                                        <a class="category-link" href="{{ \App\Helpers\UrlGen::category($iSubCat, 1) }}">
                                                            {!! $iSubCat->name !!}
                                                        </a>
{{--                                                        <ul>--}}
{{--                                                            <li class="li">--}}
{{--                                                                <a class="link___1GWWG" href="/en/search/c.1473502940434879164-183-2-118-2658636360">--}}
{{--                                                                    Blouses &amp; Shirts--}}
{{--                                                                </a>--}}
{{--                                                            </li><li class="li___3IJ6W">--}}
{{--                                                                <a class="link___1GWWG" href="/en/search/c.1473502940450448049-189-2-118-805240694">--}}
{{--                                                                    T-Shirts--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection

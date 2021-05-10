@php
    $categories = \App\Models\Category::trans()->where('parent_id', 0)->get();
@endphp
<div class="header___3bMN6">
    <div class="inner____spgD mainInner___1puXx">
        <div class="reducer___1Stj6">
            <div class="table___1iUAN">
                <div class="row___3FNiG"">
                    <div class="side___1FJ5i" style="text-align: left;">
                        <a class="logo___1AtfL" href="{{ '/' . app()->getLocale() }}">
                            <div class="logo___jdU6l">
                                <img style="height: 1.7727em;"
                                     alt="{{ config('app.name') }}" class="text___3AuhH"
                                     src="{{ imgUrl(config('settings.app.logo'), 'logo') }}">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
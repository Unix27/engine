<div class="top___qaR9g withShare___K04_k">
    <div class="row___2Qsu1">
        @if (config('plugins.reviews.installed'))
            @if (view()->exists('reviews::ratings-single'))
                @include('reviews::ratings-single')
            @endif
        @endif



    </div>
    <h1 itemprop="name"
        class="h1___UYvvN">{{ app()->getLocale() == 'de' ? $post->title_de : $post->title }}
    </h1>
    @if( \Illuminate\Support\Facades\Auth::user())
        <div class="favorite___2jmct {{ \Illuminate\Support\Facades\Auth::user()  ? 'make-favorite' : 'blur_need_auth' }}" id="{{ $post->id }}" href="{{ \Illuminate\Support\Facades\Auth::user()  ? 'javascript:void(0)' : 'blur_need_auth' }}">
            <div class="favorite___1QP3m" role="button" tabindex="0" style="display: none">
                <svg class="" height="100%" viewBox="0 0 30 30" width="100%" xmlns="http://www.w3.org/2000/svg"><defs><path id="path" d="M24.23 6.98a5.94 5.94 0 0 0-8.4-.09l-.06.06-.02.02-.02.03-.74.78-.73-.77-.03-.03a5.94 5.94 0 0 0-8.4-.08l-.08.08a6.05 6.05 0 0 0 0 8.53L15 24.79l9.24-9.28a6.05 6.05 0 0 0 0-8.53z"></path><mask id="mask"><use xlink:href="#path" fill="#fff"></use></mask></defs>
                    <g class="hoverable___1NLjI"><rect class="inner___25Ou- " x="0" y="30" width="30" height="30" fill="#0177e4" mask="url(#mask)"></rect>
                        <use class="path___21rer" xlink:href="#path" fill="none" stroke="#0177e4" stroke-width="2"></use>
                    </g>
                </svg>
            </div>
        </div>
    @endif
</div>

<style>
    .favorite___2jmct:hover {
        color: #ff7676;
    }

</style>
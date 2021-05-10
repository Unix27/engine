<div class="main__header newHeaderWebOn">
    <div class="inner mainInner">
        <div class="reducer">
            <div class="main__header__table">
                <div class="main__header__row">
                    <div class="side burger__menu">
                        <div class="burger" role="button" tabindex="0"></div>
                    </div>
                    <div class="side">
                        <a class="newLogo" href="/{{app()->getLocale()}}">
                            <img alt="{{ config('app.name') }}" class="site-logo" src="{{ imgUrl(config('settings.app.logo'), 'logo') }}">
                        </a>
                    </div>
                    <div class="content">
                        <div class="search">
                            <div class="newHeaderWebOn">
                                <?php $attr = ['countryCode' => config('country.icode')]; ?>
                                <form class="search__form" id="search" name="search"
                                      action="{{ lurl(trans('routes.v-search', $attr), $attr) }}" method="GET">
                                    {!! csrf_field() !!}
                                    <div class="search__form-inner">
                                        <div class="left">
                                            <label class="search-label">
                                                <input class="input" name="q" placeholder="{{ t('Search') }}" value=""></label>
                                            <button type="submit" class="submit">{{ t('Search') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="side">
                        <div class="buttons">
                            @if ($agent->isMobile())
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <div class="main__header__container header-profile__btn"
                                         data-name="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                         data-first_name="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                         data-last_name="{{\Illuminate\Support\Facades\Auth::user()->last_name}}">

                                        <div class="button">
                                            <div class="button__inner" role="button" tabindex="0">
                                                <div class="headerButtonIcon" style="    background: #783dff;
    border-radius: 12px;
    text-align: center;
        font-size: 15px;
    top: auto;
    padding: 4px 0 0;
    align-items: center;
    box-sizing: border-box;
    color: white;
    text-transform: uppercase;">
                                                    {{\Illuminate\Support\Facades\Auth::user()->name[0] ?? (\Illuminate\Support\Facades\Auth::user()->first_name[0] ?? (\Illuminate\Support\Facades\Auth::user()->last_name[0] ?? ''))}}
                                                </div>
                                                <div class="text">{{ trans('auth.Profile') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ lurl(trans('routes.login')) }}" class="main__header__container" id="authorization_icon">
                                        <div class="link button">
                                            <div class="button__inner">
                                                <div class="headerButtonIcon">
                                                    <svg width="26" height="26" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m218.667969 240h-202.667969c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h202.667969c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m138.667969 320c-4.097657 0-8.191407-1.558594-11.308594-4.691406-6.25-6.253906-6.25-16.386719 0-22.636719l68.695313-68.691406-68.695313-68.671875c-6.25-6.253906-6.25-16.386719 0-22.636719s16.382813-6.25 22.636719 0l80 80c6.25 6.25 6.25 16.382813 0 22.636719l-80 80c-3.136719 3.132812-7.234375 4.691406-11.328125 4.691406zm0 0"/><path d="m341.332031 512c-23.53125 0-42.664062-19.136719-42.664062-42.667969v-384c0-18.238281 11.605469-34.515625 28.882812-40.511719l128.171875-42.730468c28.671875-8.789063 56.277344 12.480468 56.277344 40.578125v384c0 18.21875-11.605469 34.472656-28.863281 40.488281l-128.214844 42.753906c-4.671875 1.449219-9 2.089844-13.589844 2.089844zm128-480c-1.386719 0-2.558593.171875-3.816406.554688l-127.636719 42.558593c-4.183594 1.453125-7.210937 5.675781-7.210937 10.21875v384c0 7.277344 7.890625 12.183594 14.484375 10.113281l127.636718-42.558593c4.160157-1.453125 7.210938-5.675781 7.210938-10.21875v-384c0-5.867188-4.777344-10.667969-10.667969-10.667969zm0 0"/><path d="m186.667969 106.667969c-8.832031 0-16-7.167969-16-16v-32c0-32.363281 26.300781-58.667969 58.664062-58.667969h240c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16h-240c-14.699219 0-26.664062 11.96875-26.664062 26.667969v32c0 8.832031-7.167969 16-16 16zm0 0"/><path d="m314.667969 448h-85.335938c-32.363281 0-58.664062-26.304688-58.664062-58.667969v-32c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v32c0 14.699219 11.964843 26.667969 26.664062 26.667969h85.335938c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ lurl(trans('routes.register')) }}"  class="main__header__container" id="authorization_icon_">
                                        <div class="link button">
                                            <div class="button__inner">
                                                <div class="headerButtonIcon">
                                                    <svg width="26" height="26" viewBox="-4 -3 26 26">
                                                        <g stroke="#3D3F56" stroke-width="2" fill="none"
                                                           stroke-linecap="round"
                                                           stroke-linejoin="round">
                                                            <path d="M16 18v-2a4 4 0 00-4-4H4a4 4 0 00-4 4v2"></path>
                                                            <circle cx="8" cy="4" r="4"></circle>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                    <div class="main__header__container notification-btn">
                                        @include('layouts.inc.buttons.notification')
                                    </div>

                            @else
                                <div class="main__header__container notification-btn">
                                    @include('layouts.inc.buttons.notification')
                                </div>

                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <div class="main__header__container header-profile__btn"
                                         data-name="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                         data-first_name="{{\Illuminate\Support\Facades\Auth::user()->first_name}}"
                                         data-last_name="{{\Illuminate\Support\Facades\Auth::user()->last_name}}">

                                        <div class="button">
                                            <div class="button__inner" role="button" tabindex="0">
                                                <div class="headerButtonIcon" style="    background: #783dff;
    border-radius: 12px;
    text-align: center;
    font-size: 15px;
    top: auto;
    padding: 4px 0 0;
    align-items: center;
    box-sizing: border-box;
    color: white;
    text-transform: uppercase;">
                                                    {{\Illuminate\Support\Facades\Auth::user()->name[0] ?? (\Illuminate\Support\Facades\Auth::user()->first_name[0] ?? (\Illuminate\Support\Facades\Auth::user()->last_name[0] ?? ''))}}
                                                </div>
                                                <div class="text">{{ trans('auth.Profile') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="main__header__container" id="authorization_icon">
                                        <div class="link button">
                                            <div class="button__inner">
                                                <div class="headerButtonIcon">
                                                    <svg width="26" height="26" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m218.667969 240h-202.667969c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h202.667969c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m138.667969 320c-4.097657 0-8.191407-1.558594-11.308594-4.691406-6.25-6.253906-6.25-16.386719 0-22.636719l68.695313-68.691406-68.695313-68.671875c-6.25-6.253906-6.25-16.386719 0-22.636719s16.382813-6.25 22.636719 0l80 80c6.25 6.25 6.25 16.382813 0 22.636719l-80 80c-3.136719 3.132812-7.234375 4.691406-11.328125 4.691406zm0 0"/><path d="m341.332031 512c-23.53125 0-42.664062-19.136719-42.664062-42.667969v-384c0-18.238281 11.605469-34.515625 28.882812-40.511719l128.171875-42.730468c28.671875-8.789063 56.277344 12.480468 56.277344 40.578125v384c0 18.21875-11.605469 34.472656-28.863281 40.488281l-128.214844 42.753906c-4.671875 1.449219-9 2.089844-13.589844 2.089844zm128-480c-1.386719 0-2.558593.171875-3.816406.554688l-127.636719 42.558593c-4.183594 1.453125-7.210937 5.675781-7.210937 10.21875v384c0 7.277344 7.890625 12.183594 14.484375 10.113281l127.636718-42.558593c4.160157-1.453125 7.210938-5.675781 7.210938-10.21875v-384c0-5.867188-4.777344-10.667969-10.667969-10.667969zm0 0"/><path d="m186.667969 106.667969c-8.832031 0-16-7.167969-16-16v-32c0-32.363281 26.300781-58.667969 58.664062-58.667969h240c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16h-240c-14.699219 0-26.664062 11.96875-26.664062 26.667969v32c0 8.832031-7.167969 16-16 16zm0 0"/><path d="m314.667969 448h-85.335938c-32.363281 0-58.664062-26.304688-58.664062-58.667969v-32c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v32c0 14.699219 11.964843 26.667969 26.664062 26.667969h85.335938c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg>
                                                </div>
                                                <a href="{{ lurl(trans('routes.login')) }}" class="text">{{trans('auth.Sign In')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ lurl(trans('routes.register')) }}" class="main__header__container" id="authorization_icon_" style="text-decoration: none;">
                                        <div class="link button">
                                            <div class="button__inner">
                                                <div class="headerButtonIcon">
                                                    <svg width="26" height="26" viewBox="-4 -3 26 26">
                                                        <g stroke="#3D3F56" stroke-width="2" fill="none"
                                                           stroke-linecap="round"
                                                           stroke-linejoin="round">
                                                            <path d="M16 18v-2a4 4 0 00-4-4H4a4 4 0 00-4 4v2"></path>
                                                            <circle cx="8" cy="4" r="4"></circle>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="text">{{trans('auth.register')}}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endif

                            @endif
                            <div class="main__header__container cart-btn">
                                @include('layouts.inc.buttons.cart')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($agent->isMobile())
                <div class="isMobile newHeaderWebOn">
                    <form class="mobile_search_form" name="search"
                          action="{{ lurl(trans('routes.v-search', $attr), $attr) }}" method="GET">
                        {!! csrf_field() !!}
                        <div class="inner-box">
                            <div class="left">
                                <svg width="14" height="14" class="magnifier">
                                    <path
                                        d="M11.113 9.887a5.99 5.99 0 001.225-3.675C12.338 2.8 9.625 0 6.213 0S0 2.8 0 6.213c0 3.412 2.8 6.212 6.213 6.212 1.4 0 2.712-.438 3.675-1.225l2.624 2.625a.945.945 0 00.613.262.945.945 0 00.613-.262.846.846 0 000-1.225l-2.625-2.712zm-4.9.7c-2.45 0-4.463-1.925-4.463-4.375S3.763 1.75 6.213 1.75s4.462 2.013 4.462 4.463-2.013 4.375-4.463 4.375z"
                                        fill="#8e90a7"></path>
                                </svg>
                                <label class="label"><input class="input" placeholder="Search" value=""></label></div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

@section('modal_menu_header')
    <div class="contextMenu bottom newHeaderWebOn header-profile__menu" style="display: none">
        <div role="button" tabindex="-1" class="contextMenu__overlay"></div>
        <div class="menu_pos_transform">
            <div class="menu___diq_K popup" role="button" tabindex="-1">
                <div>
                    <a href="{{ lurl('account/orders') }}" class="item___a8qBu clickable___Ael9B largeText___1jfAu">{{ t('My orders') }}</a>
                    <a href="{{ lurl('account/favourite') }}" class="item___a8qBu clickable___Ael9B largeText___1jfAu">{{ t('My favorites') }}</a><a
                        href="{{ lurl('account') }}" class="item___a8qBu clickable___Ael9B largeText___1jfAu">{{t('My account')}}</a><a
                        href="{{ lurl('logout') }}" class="item___a8qBu clickable___Ael9B largeText___1jfAu">{{ t('Log Out') }}</a>
                </div>
            </div>
            <div class="corner"></div>
        </div>
    </div>

@endsection

@if ($agent->isMobile())
    <div class="notice-popup" style="display: none">
        <div class="mobile___3TepT">
            <div class="view___fuxJF">
                <div class="header___2JQlt">
                    <div class="headerLeftSide___1-ZGl">
                        <span class="title___3AhCC">{{t('Notifications')}}</span>
                    </div>
                    <div class="headerRightSide___3rtDX">
                                                <span class="headerTextAction___9H3I0 action_close" role="button" tabindex="0">
                                                    {{t('Close')}}
                                                </span>
                    </div>
                </div>
                <div class="content___23XmG">
                    <div>
                        <div>
                            @if (Session::has('flash_notification'))
                                @include('flash::notification')
                            @else
                                @include('flash::no-message')
                            @endif
                            <?php Session::forget('flash_notification'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div>
        <div class="notice-popup" style="display: none">
            <div class="overlay" role="button" tabindex="-1"></div>
            <div class="popup" data-placement="bottom" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(170px, 56px, 0px);">
                <div class="arrow" style="left: 150px;"></div>
                <div class="content">
                    <div class="desktop">
                        <div class="view">
                            <div class="header">
                                <div class="headerLeftSide">
                                    <span class="title">{{ t('Notifications') }}</span>
                                </div>
                                <div class="headerRightSide"></div>
                            </div>
                            <div class="content">
                                <div>
                                        @if (Session::has('flash_notification'))
                                            @include('flash::notification')
                                        @else
                                            @include('flash::no-message')
                                        @endif
                                        <?php Session::forget('flash_notification'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

@section('footer_scripts')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".notification-btn").on("click tap", function (event) {
                $('.notice-popup').toggle();
                @if (!$agent->isMobile())
                    $('.notice-popup .popup').css('transform', 'translate3d(' + ( $(".notification-btn").offset().left - $('.notice-popup .popup').width()/2.5 )  + 'px, 120px, 0px)');
                @endif

                $.ajax({
                    method: 'POST',
                    url: siteUrl + '/ajax/notifications/check',
                    data: {

                    }
                }).done(function(data) {
                    if (typeof data.html === 'undefined') {
                        return false;
                    }

                    $('.notification-btn').html(data.html);
                });
            });

            setTimeout(function () {
                $('.headerButtonIcon #Path').removeAttr('id');
            }, 2000);

            $(".header-profile__btn").on("click tap", function (e) {
                $('.header-profile__menu').toggle();
                @if (!$agent->isMobile())
                    $('.header-profile__menu .menu_pos_transform').css('transform', 'translate3d(' + ( $(".header-profile__btn").offset().left - $('.header-profile__menu .popup').width()/2.5 )  + 'px, 120px, 0px)');
                @endif
            });

        });
    </script>
@endsection

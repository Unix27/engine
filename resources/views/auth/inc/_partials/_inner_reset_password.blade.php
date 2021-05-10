<div id="authorization_inner_reset_password" class="content___ZmMAf" style="display: none; z-index: 4">
    <div class="parent___3Qx5z">
        <div class="illustration___20p03"><img alt="" class="image___31jLf"
                                               src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTAzIiBoZWlnaHQ9IjEwMyIgdmlld0JveD0iMCAwIDEwMyAxMDMiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNNTAuNSAxMDFhNTAuNSA1MC41IDAgMSAwIDAtMTAxIDUwLjUgNTAuNSAwIDAgMCAwIDEwMXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxIDEpIj48bWFzayBpZD0iYiIgZmlsbD0iI2ZmZiI+PHVzZSB4bGluazpocmVmPSIjYSIvPjwvbWFzaz48dXNlIGZpbGw9IiNGRUZFRkUiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9Ii4xNiIgc3Ryb2tlLXdpZHRoPSIuNSIgeGxpbms6aHJlZj0iI2EiLz48ZyBmaWxsLXJ1bGU9Im5vbnplcm8iIG1hc2s9InVybCgjYikiPjxwYXRoIGZpbGw9IiNCM0IzQjMiIGQ9Ik00NCA0NnYtOGE3IDcgMCAwIDEgMTQgMHYzaDR2LTNhMTEuMDEgMTEuMDEgMCAwIDAtMjIgMHY4aDR6Ii8+PHBhdGggZmlsbD0iI0VGRDM1OCIgZD0iTTY2IDc1SDM2YTIgMiAwIDAgMS0yLTJWNDdjMC0xLjEuOS0yIDItMmgzMGEyIDIgMCAwIDEgMiAydjI2YTIgMiAwIDAgMS0yIDJ6Ii8+PHBhdGggZmlsbD0iI0E1OEMyMSIgZD0iTTU1IDU3YTQgNCAwIDEgMC02IDMuNDVWNjdoNHYtNi41NWMxLjItLjcgMi0xLjk3IDItMy40NXoiLz48L2c+PC9nPjwvc3ZnPgo=">
        </div>
        <h3 class="header___2VVAJ">{{ trans('auth.password_recovery') }}</h3>
        <p class="text___3ua1e">{{ trans('auth.Input new password') }}</p>
    </div>
    <div class="block___1vueO">
        <form novalidate="" class="auth-form  form___1qcS9" method="POST" action="{{ lurl('password/reset') }}">
            {!! csrf_field() !!}
            <?php
            $loginValue = (session()->has('login')) ? session('login') : old('login');
            $loginField = getLoginField($loginValue);
            if ($loginField == 'phone') {
                $loginValue = phoneFormat($loginValue, old('country', config('country.code')));
            }
            ?>
            <input type="hidden" name="token" value="{{ isset($token) ? $token : "" }}">
            <input type="hidden" name="locale" value="{{ config('app.locale') }}">
            <div class="fieldsWrapper___zSdsE">
                <div class="field___KPYIl">
                    <label class="label">
                        <input autocomplete="email" class="input___36o72" name="login" placeholder=" " {{ !empty($loginValue) ? ' value="' . $loginValue . '"' : '' }}  type="email" required>
                        <div class="caption___2klrn"> {{trans('auth.email')}}</div>
                    </label></div>
                <div class="field___KPYIl">
                    <label class="label">
                        <input autocomplete="new-password" class="input___36o72" name="password" placeholder=" " type="password"
                               required
                               minlength="6"
                               maxlength="16"
                               data-regex="^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$"
                               data-msg-regex="{!! trans('auth.weak_password') !!}"
                        >
                        <div class="caption___2klrn">{{ trans('auth.password') }}</div>
                    </label>
                    @if(isset($errors) && $errors->has('password'))
                        <p class="input-error">
                            {{ trans('validation.custom_password_rule') }}
                        </p>
                    @endif
                </div>
                <div class="field___KPYIl">
                    <label class="label">
                        <input autocomplete="new-password" class="input___36o72" name="password_confirmation" placeholder=" " type="password"
                               required
                               data-msg-same="{{ trans('auth.confirm_password') }}">
                        <div class="caption___2klrn">{{t('Please repeat your password')}}</div>
                    </label></div>
                @if (isset($errors) and $errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="error___2-vk9">{{ $error }}</p>
                    @endforeach
                @endif

                @if (Session::has('flash_notification'))
                    <p class="error___2-vk9">@include('flash::message')</p>
                @endif
            </div>
            @include('layouts.inc.tools.recaptcha', ['noLabel' => true])
            <div class="submit___adX-a">
                <button type="submit" class="submit___3cAJx">
                    <div class="caption___3L-qE">{{ trans('auth.recover') }}</div>
                </button>
            </div>
        </form>
        <div class="footer___1KOsN"><a role="button" tabindex="0" class="link___3R1ZG authorization_to_email" style="display: none">{{ trans('auth.remember_your_password') }}</a></div>
    </div>
    @include('auth.inc._partials.social_small')
    <div class="block___1vueO">
        <div class="footer___1KOsN">  <a role="button" tabindex="0" class="link___3R1ZG authorization_register">{{trans('auth.register')}}</a>
        </div>
    </div>
</div>
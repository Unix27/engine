<div id="authorization_inner_forgot" class="content___ZmMAf" style="display: none; z-index: 4">
    <div class="parent___3Qx5z">
        <div class="illustration___20p03">
            <img alt="" class="image___31jLf" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTAzIiBoZWlnaHQ9IjEwMyIgdmlld0JveD0iMCAwIDEwMyAxMDMiPjxkZWZzPjxwYXRoIGlkPSJhIiBkPSJNNTAuNSAxMDFhNTAuNSA1MC41IDAgMSAwIDAtMTAxIDUwLjUgNTAuNSAwIDAgMCAwIDEwMXoiLz48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxIDEpIj48bWFzayBpZD0iYiIgZmlsbD0iI2ZmZiI+PHVzZSB4bGluazpocmVmPSIjYSIvPjwvbWFzaz48dXNlIGZpbGw9IiNGRUZFRkUiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9Ii4xNiIgc3Ryb2tlLXdpZHRoPSIuNSIgeGxpbms6aHJlZj0iI2EiLz48ZyBmaWxsLXJ1bGU9Im5vbnplcm8iIG1hc2s9InVybCgjYikiPjxwYXRoIGZpbGw9IiNCM0IzQjMiIGQ9Ik00NCA0NnYtOGE3IDcgMCAwIDEgMTQgMHYzaDR2LTNhMTEuMDEgMTEuMDEgMCAwIDAtMjIgMHY4aDR6Ii8+PHBhdGggZmlsbD0iI0VGRDM1OCIgZD0iTTY2IDc1SDM2YTIgMiAwIDAgMS0yLTJWNDdjMC0xLjEuOS0yIDItMmgzMGEyIDIgMCAwIDEgMiAydjI2YTIgMiAwIDAgMS0yIDJ6Ii8+PHBhdGggZmlsbD0iI0E1OEMyMSIgZD0iTTU1IDU3YTQgNCAwIDEgMC02IDMuNDVWNjdoNHYtNi41NWMxLjItLjcgMi0xLjk3IDItMy40NXoiLz48L2c+PC9nPjwvc3ZnPgo=">
        </div>
        <h3 class="header___2VVAJ">{{ trans('auth.password_recovery') }}</h3>
        <p class="text___3ua1e">{{ trans('auth.please_specify_the_email') }}</p>
    </div>
    <div class="block___1vueO">
        <form novalidate="" class="auth-form  form___1qcS9" method="POST" action="{{ lurl('password/email') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="locale" value="{{ config('app.locale') }}">
            <div class="fieldsWrapper___zSdsE">
                <div class="field___KPYIl">
                    <label class="label">
                        <input autocomplete="login" class="input___36o72" name="login" {{ !empty(old('name')) ? ' value="' . old('name') . '"' : '' }} placeholder=" " type="login" required>
                        <div class="caption___2klrn">{{ trans('auth.email') }}</div>
                    </label>
                </div>
            </div>
            <div class="submit___adX-a">
                <button type="submit" class="submit___3cAJx">
                    <div class="caption___3L-qE">{{trans('auth.recover')}}</div>
                </button>
            </div>
            <div class="back submit___adX-a">
                <button type="button" class="auth-main__soc  _google  btn-main">
                    <div class="caption___3L-qE">{{ trans('auth.remember_your_password') }}</div>
                </button>
            </div>
        </form>
    </div>

</div>
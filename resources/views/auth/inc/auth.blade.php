<div id="authorization_layer" style="display: none;">
    @if (!\Illuminate\Support\Facades\Auth::user())
        <div class="sidebar___3X-DF isRight___3q0nh isPopupOnDesktop___31Nwb undefined" role="button" tabindex="-1">
            <div class="inner___3uuBN">
                <div>
                    <div class="hasControls___2hM-W header___FpcwU isPopupHeader___2wcWY isPopupOnDesktopHeader___2LnPe">
                        <div class="inner___2zF7X inner____spgD">
                            <div class="back___20j9M back" role="button" tabindex="0" style="display: none"></div>
                            <div id="authorization_close" class="close___3u6yL" role="button" tabindex="0"></div>
                            <div class="title___21_yP authorization_header_authorization">{{ config('app.name') }}</div>
                            <div class="title___21_yP authorization_header_email">{{ config('app.name') }}</div>
                            <div class="title___21_yP authorization_header_register" style="display: none">{{ trans('auth.register') }}</div>
                            <div class="title___21_yP authorization_header_forgot" style="display: none">{{trans('auth.password_recovery')}}</div>
                            <div class="title___21_yP authorization_header_sepa" style="display: none">SEPA</div>
                            <div class="title___21_yP authorization_header_reset_password" style="display: none">{{trans('auth.reset_password')}}</div>
                            <div class="title___21_yP authorization_header_accept_disclaimer" style="display: none">Ваши данные</div>
                            <div class="title___21_yP authorization_header_auth_main" style="display: none">
                                <img alt="{{ config('app.name') }}" class="site-logo" src="{{ imgUrl(config('settings.app.logo'), 'logo') }}">
                            </div>
                        </div>
                    </div>
                </div>
                @include('auth.inc._partials._inner_welcome')
{{--                @include('auth.inc._partials._inner_email')--}}
{{--                @include('auth.inc._partials._inner_register')--}}
                @include('auth.inc._partials._inner_forgot')
{{--                @include('auth.inc._partials._inner_sepa')--}}
                @include('auth.inc._partials._inner_reset_password')
                @include('auth.inc._partials._inner_accept_disclaimer')
                @include('auth.inc._partials._inner_email_accept')
                @include('auth.inc._partials._auth-main')
            </div>
        </div>
    @elseif(false)
        <div class="sidebar___3X-DF isRight___3q0nh isPopupOnDesktop___31Nwb undefined" role="button" tabindex="-1">
            <div class="inner___3uuBN">
                <div>
                    <div class="hasControls___2hM-W header___FpcwU isPopupHeader___2wcWY isPopupOnDesktopHeader___2LnPe">
                        <div class="inner___2zF7X inner____spgD">
                            <div id="authorization_close" class="close___3u6yL" role="button" tabindex="0"></div>
                            <div class="title___21_yP authorization_header_authorization">Вы авторизованы</div>
                        </div>
                    </div>
                </div>
                <div class="content___ZmMAf">
                    <div class="content___2EwyJ ">
                        <div class="icon___1TuIG"><img alt=""
                                                       src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTM4IiBoZWlnaHQ9IjEzNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBmaWxsPSIjRUFDM0EyIiBkPSJNNjEuODgyIDQ1LjA5M2gyNi45MDV2MzIuMzA4SDYxLjg4MnoiLz48cGF0aCBkPSJNMzQuOTU3IDEyMy4xNzJjLTEuNDc1IDAtMi42Ny0xLjE4OS0yLjY3LTIuNzEyVjg2Ljg0NGMwLTQuNDcxIDMuMjIzLTkuNzEgNy4yMzktMTEuNzE5TDYxLjg4MiA2My45NHM1LjM4IDUuMzg1IDEzLjQ1MiA1LjM4NSAxMy40NTMtNS4zODUgMTMuNDUzLTUuMzg1bDIyLjM1NSAxMS4xODVjMy45OTkgMi4wMDEgNy4yNCA3LjI1OCA3LjI0IDExLjcydjMzLjYxNWMwIDEuNDk3LTEuMjE3IDIuNzEyLTIuNjcgMi43MTJIMzQuOTU2eiIgZmlsbD0iIzQyQTZERCIvPjxwYXRoIGQ9Ik05Ni44NTggMzcuMDE2YzAgMTEuODk2LTkuNjM2IDIxLjU0LTIxLjUyNCAyMS41NC0xMS44ODcgMC0yMS41MjQtOS42NDQtMjEuNTI0LTIxLjU0VjI4Ljk0QzUzLjgxIDE3LjA0NCA2My40NDcgNy40IDc1LjMzNCA3LjRjMTEuODg4IDAgMjEuNTI0IDkuNjQ0IDIxLjUyNCAyMS41NHY4LjA3NnoiIGZpbGw9IiNFQUQ4QzUiLz48cGF0aCBkPSJNOTYuODU4IDMxLjYzMlYxOC4xN2MwLTUuOTI0LTQuODItMTAuNzctMTAuNzY1LTEwLjc3aC0xLjM0MmwtMi44MjUtNS42NTNDODEuMjQzLjM3OSA3OS42MDQtLjIzMiA3OC4yMzIuMzE3TDYxLjMwNSA3LjA5M0M1Ny4xNjMgOC43NSA1My44MSAxMy43MSA1My44MSAxOC4xNzR2MTMuNDU4YzAtNS45NDggNC44MTgtMTAuNzcgMTAuNzYyLTEwLjc3aDIxLjUyNGM1Ljk0NCAwIDEwLjc2MiA0LjgyMiAxMC43NjIgMTAuNzd6IiBmaWxsPSIjNDQ0Ii8+PHBhdGggZD0iTTE2LjE0MyA1NS44NjNjMC0xNC44NyAxMi4wNDYtMjYuOTI0IDI2LjkwNS0yNi45MjQgMTQuODYgMCAyNi45MDUgMTIuMDU0IDI2LjkwNSAyNi45MjR2MjEuNTIxYzAgNS45NTgtNC44MjIgMTAuNzg3LTEwLjc2IDEwLjc4N2gtMzIuMjljLTUuOTQzIDAtMTAuNzYtNC44My0xMC43Ni0xMC43ODdWNTUuODYzeiIgZmlsbD0iIzg3NjEzRSIvPjxwYXRoIGZpbGw9IiNFQUMzQTIiIGQ9Ik0yOS41OTYgNzIuMDE3aDI2LjkwNXYzMC43MjhIMjkuNTk2eiIvPjxwYXRoIGQ9Ik0yLjY3MSAxMjMuMTcyQTIuNjgxIDIuNjgxIDAgMCAxIDAgMTIwLjQ3NnYtNi43MmMwLTQuNDY1IDMuMjI0LTkuNjk4IDcuMjQtMTEuNzA3bDIyLjM1Ni0xMS4xODZzNS4zOCA1LjM4NSAxMy40NTIgNS4zODUgMTMuNDUzLTUuMzg1IDEzLjQ1My01LjM4NWwyMi4zNTUgMTEuMTg2YzMuOTk5IDIgNy4yNCA3LjI0OCA3LjI0IDExLjcwN3Y2LjcyYzAgMS40ODktMS4yMTcgMi42OTYtMi42NyAyLjY5NkgyLjY3eiIgZmlsbD0iI0VENjlBQiIvPjxwYXRoIGQ9Ik0yMS41MjQgNjAuMjY2djMuOTE2YzAgMTEuODc2IDkuNjU3IDIxLjU0IDIxLjUyNCAyMS41NCAxMS44NjggMCAyMS41MjQtOS42NjQgMjEuNTI0LTIxLjU0di0zLjkxNmE1Ljg3MiA1Ljg3MiAwIDAgMC01Ljg3LTUuODc0Yy02LjgxNSAwLTEyLjcyNi0zLjg3NC0xNS42NTQtOS41NDEtMi45MjggNS42NjctOC44MzkgOS41NDEtMTUuNjU0IDkuNTQxYTUuODcyIDUuODcyIDAgMCAwLTUuODcgNS44NzR6IiBmaWxsPSIjRUFEOEM1Ii8+PHBhdGggZD0iTTEyNi45MjMgMTAzLjM5YTIuMTM4IDIuMTM4IDAgMCAxLTIuMTI2LTIuMTQ4VjkyLjY1YzAtMy41NTItMi44NjItNi40NDMtNi4zOC02LjQ0My0zLjUxNyAwLTYuMzggMi44OS02LjM4IDYuNDQzdjguNTlhMi4xMzggMi4xMzggMCAwIDEtMi4xMjYgMi4xNDggMi4xMzggMi4xMzggMCAwIDEtMi4xMjYtMi4xNDdWOTIuNjVjMC01LjkyMSA0Ljc3LTEwLjczOSAxMC42MzItMTAuNzM5IDUuODYzIDAgMTAuNjMzIDQuODE4IDEwLjYzMyAxMC43Mzl2OC41OWEyLjEzOCAyLjEzOCAwIDAgMS0yLjEyNyAyLjE0OHoiIGZpbGw9IiM0NDQiLz48cGF0aCBkPSJNMTMzLjMwMyAxMzMuNDU3aC0yOS43NzFjLTIuMzUgMC00LjI1My0xLjkyMi00LjI1My00LjI5NXYtMjUuNzczYzAtMi4zNzMgMS45MDMtNC4yOTUgNC4yNTMtNC4yOTVoMjkuNzcxYzIuMzUgMCA0LjI1MyAxLjkyMiA0LjI1MyA0LjI5NXYyNS43NzNjMCAyLjM3My0xLjkwMyA0LjI5NS00LjI1MyA0LjI5NXoiIGZpbGw9IiNFNkU2RTYiLz48cGF0aCBkPSJNMTIyLjY3IDExNS4wNDJjMC0yLjE3LTEuNzQtMy45My0zLjg5LTMuOTMtMi4xNSAwLTMuODkxIDEuNzYtMy44OTEgMy45MyAwIDEuNDUuNzg4IDIuNzA0IDEuOTQ1IDMuMzg2djYuNDM4aDMuODkxdi02LjQzOGEzLjkyNCAzLjkyNCAwIDAgMCAxLjk0NS0zLjM4NnoiIGZpbGw9IiM0NDQiLz48L3N2Zz4=">
                        </div>
                        <div class="content___3mTOP  defaultConsent___1Hgh5"><h2 class="header___hWSpo">Прежде чем Вы продолжите...</h2>
                            <div class="text___3jBKu">
                                <div class="hyperText___20r5F   ">Пожалуйста прочитайте и примите наши <a
                                            href="/terms" class="a___faZ7g" target="_blank">Terms of Service</a>
                                    (включая <a href="/privacy" class="a___faZ7g" target="_blank">Privacy Policy</a>),
                                    чтобы понять, как мы собираем и обрабатываем персональные данные в соответствии с Европейским
                                    законом о защите данных (GDPR). После того, как Вы примете Terms of Service, Вы сможете управлять
                                    Вашими данными в Вашем профиле.
                                </div>
                            </div>
                            <div class="buttons___bkLt-">
                                <div href="/accept_agreement" role="button" tabindex="0" class="positiveButton___1-fkP">Я принимаю</div>
                            </div>
                            <div class="buttons___bkLt-">
                                <a href="/logout" role="button" tabindex="0" class="positiveButton___1-fkP">Выход</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
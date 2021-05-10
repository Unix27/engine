<div class="login-form">
    <form action="{{ lurl('/checkout/login') }}" method="POST" id="loginFormCheckout">
        {!! csrf_field() !!}
        <input type="hidden" name="locale" value="{{ config('app.locale') }}">
        <div class="col-md-12">
            <div class="alert alert-danger" style="display: {{ (isset($errors) && $errors->has('message')) ? 'block' : 'none' }}" >
            @if(isset($errors) and $errors->has('message'))
                @foreach($errors->get('message') as $message)
                            {{ $message }}
                @endforeach
            @endif
            </div>
        </div>
        <?php
            $loginValue = (session()->has('login')) ? session('login') : request()->get('login');
            $loginField = getLoginField($loginValue);
        ?>
        <!-- login -->
        <?php $loginError = (isset($errors) and $errors->has('login')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">@lang('checkout.email')</label>
            <input type="email" class="login_input form-control{{ $loginError }}" placeholder="{{ getLoginLabel() }}" name="login" value="{{ $loginValue }}" required/>
        </div>
            <!-- password -->
        <?php $passwordError = (isset($errors) and $errors->has('password')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">@lang('checkout.password')</label>
            <input type="password" class="password_input form-control{{ $passwordError }}" name="password" placeholder="{{ t('Password') }}" autocomplete="off" required/>
        </div>

        <div class="col-md-12">
            <div class="auth-main__link-wrap">
                <a class="link" data-auth-btn-forgot>{{ trans('auth.forgot_password_question') }}</a>
            </div>
        </div>
        <div class="form-group col-md-12">
            <button type="submit" class="order_now_btn checkout_auth_btn">
                <span class="btn-state">
                    @lang('checkout.login')
                </span>
                <span class="loader___2Hyn1" style="display: none">
                  <span class="loader___AOgfw">
                    <span class="dot___27mgG inherit___2sbjm dot1___zYQVX"></span>
                    <span class="dot___27mgG inherit___2sbjm dot2___1Bd_A"></span>
                    <span class="dot___27mgG inherit___2sbjm dot3___pGqeN"></span>
                    <span class="dot___27mgG inherit___2sbjm dot4___1C96p"></span>
                  </span>
                </span>
            </button>
        </div>
        <div class="col-md-12">
            <div class="auth-main__or">
                <span>{{t('or')}}</span>
            </div>
            <div class="main__soc-list">
                <button type="button" class="auth-main__soc  btn-main" onclick="window.location.href = '{{ lurl('/auth/facebook') }}';">
                    <svg viewBox="0 0 768 764" style="width: 24px; height: 24px;">
                        <path
                            d="M384 0a384 384 0 00-60 763.3V495h-97.5V384H324v-84.6c0-96.2 57.3-149.4 145-149.4 42 0 86 7.5 86 7.5V252h-48.4c-47.7 0-62.6 29.6-62.6 60v72h106.5l-17 111H444v268.3A384 384 0 00384 0z"
                            fill="#fff" fill-rule="evenodd"></path>
                    </svg>
                    <span>Facebook</span>
                </button>
                <button type="button" class="auth-main__soc  _google  btn-main" onclick="window.location.href = '{{ lurl('/auth/google') }}';">
                    <svg viewBox="0 0 46 46" style="width: 48px; height: 48px;">
                        <defs>
                            <filter x="-50%" y="-50%" filterUnits="objectBoundingBox" id="GoogleIcon-a">
                                <feOffset dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                                <feGaussianBlur stdDeviation=".5" in="shadowOffsetOuter1"
                                                result="shadowBlurOuter1"></feGaussianBlur>
                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.168 0" in="shadowBlurOuter1"
                                               result="shadowMatrixOuter1"></feColorMatrix>
                                <feOffset in="SourceAlpha" result="shadowOffsetOuter2"></feOffset>
                                <feGaussianBlur stdDeviation=".5" in="shadowOffsetOuter2"
                                                result="shadowBlurOuter2"></feGaussianBlur>
                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.084 0" in="shadowBlurOuter2"
                                               result="shadowMatrixOuter2"></feColorMatrix>
                                <feMerge>
                                    <feMergeNode in="shadowMatrixOuter1"></feMergeNode>
                                    <feMergeNode in="shadowMatrixOuter2"></feMergeNode>
                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                </feMerge>
                            </filter>
                            <rect id="b" rx="2"></rect>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <g transform="translate(3 3)" filter="url(#GoogleIcon-a)">
                                <use fill="#FFF"></use>
                                <use></use>
                                <use></use>
                                <use></use>
                            </g>
                            <path
                                d="M31.64 23.205c0-.639-.057-1.252-.164-1.841H23v3.481h4.844a4.14 4.14 0 0 1-1.796 2.716v2.259h2.908c1.702-1.567 2.684-3.875 2.684-6.615z"
                                fill="#4285F4"></path>
                            <path
                                d="M23 32c2.43 0 4.467-.806 5.956-2.18l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711h-3.007v2.332A8.997 8.997 0 0 0 23 32z"
                                fill="#34A853"></path>
                            <path
                                d="M17.964 24.71a5.41 5.41 0 0 1-.282-1.71c0-.593.102-1.17.282-1.71v-2.332h-3.007A8.996 8.996 0 0 0 14 23c0 1.452.348 2.827.957 4.042l3.007-2.332z"
                                fill="#FBBC05"></path>
                            <path
                                d="M23 17.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C27.463 14.891 25.426 14 23 14a8.997 8.997 0 0 0-8.043 4.958l3.007 2.332c.708-2.127 2.692-3.71 5.036-3.71z"
                                fill="#EA4335"></path>
                            <path d="M14 14h18v18H14V14z"></path>
                        </g>
                    </svg>
                    <span>Google</span>
                </button>
            </div>
        </div>
    </form>
</div>

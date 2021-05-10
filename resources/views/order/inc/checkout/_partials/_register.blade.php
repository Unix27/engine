<div class="register-form">
    <form id="checkout_form" name="checkout" action="{{ lurl('/checkout/save') }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="locale" value="{{ config('app.locale') }}">
        <input type="hidden" name="shipping" value="dhl">
        <input type="hidden" name="payment" value="sepa">
        <input type="hidden" name="i_agree" value="1">
        <div class="col-md-12">
            <div class="alert alert-danger" style="display: {{ (isset($errors) && $errors->has('message')) ? 'block' : 'none' }}" >
                @if(isset($errors) and $errors->has('message'))
                    @foreach($errors->get('message') as $message)
                        {{ $message }}
                    @endforeach
                @endif
            </div>
        </div>

        <?php $namesError = (isset($errors) and $errors->has('first_and_last_names')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">@lang('checkout.names')</label>
            @if(\Illuminate\Support\Facades\Auth::user() && empty(trim($cart_model->customer_first_name . ' ' .$cart_model->customer_last_name)))
                <input type="text" class="form-control" name="first_and_last_names" value="{{ trim(Illuminate\Support\Facades\Auth::user()->name) }}" required/>
            @else
                <input type="text" class="form-control{{$namesError}}" name="first_and_last_names" value="{{ old('first_and_last_names') }}" required/>
            @endif

        </div>
        <?php $addressError = (isset($errors) and $errors->has('first_and_last_names')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">@lang('checkout.address')</label>
            <input type="text" class="form-control{{$addressError}}" name="address" value="{{old('address')}}" required/>
        </div>
        <?php $postCodeError = (isset($errors) and $errors->has('post_code')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">@lang('checkout.post_code')</label>
            <input type="text" class="form-control{{$postCodeError}}" name="post_code" value="{{old('post_code')}}" required/>
        </div>
        <?php $cityError = (isset($errors) and $errors->has('city')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-9">
            <label for="exampleInputEmail1">@lang('checkout.city')</label>
            <input type="text" class="form-control{{$cityError}}" name="city" required value="{{old('city')}}"/>
        </div>
        <?php $countryIdError = (isset($errors) and $errors->has('country_id')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">@lang('checkout.country')</label>
            <select class="form-control country_sel{{$countryIdError}}" name="country_id" required>
                <option value="0" {{ (!old('country_code') or old('country_code')==0) ? 'disabled selected="selected"' : '' }}>{{ t('Country') }}</option>

                <option data-phone="+49" value="DE" {{ (old('country_code') == 'DE') ? 'selected="selected"' : '' }}>
                    Deutschland     (+49)
                </option>
                <option data-phone="+43" value="AT" {{ (old('country_code') == 'AT') ? 'selected="selected"' : '' }}>
                    Österreich  (+43)
                </option>
                <option data-phone="+41" value="CH" {{ (old('country_code') == 'CH') ? 'selected="selected"' : '' }}>
                    Switzerland     (+41)
                </option>
                <option data-phone="+43" value="NL" {{ (old('country_code') == 'NL') ? 'selected="selected"' : '' }}>
                    Nederland   (+43)
                </option>
                <option data-phone="+32" value="BE" {{ (old('country_code') == 'BE') ? 'selected="selected"' : '' }}>
                    Belgique    (+32)
                </option>
                <option value="0" disabled="">------------------------</option>

                @foreach ($countries as $code => $item)
                    @if(in_array($code, ['DE', 'AT', 'CH', 'NL', 'BE']) or !$item->get('phone'))
                        @continue
                    @endif
                    <option data-phone="+{{ $item->get('phone') }}" value="{{ $code }}" {{ (old('country_code') == $code) ? 'selected="selected"' : '' }}>
                        {{ $item->get('name') }} (+{{ $item->get('phone') }})
                    </option>
                @endforeach
            </select>
        </div>
        <?php $mobilePhone = (isset($errors) and $errors->has('mobile_phone')) ? ' is-invalid shake___3oxNN' : ''; ?>
        <div class="form-group col-md-6">
            <label for="exampleInputEmail1">@lang('checkout.mobile_number')</label>
            <input type="text" class="form-control{{$mobilePhone}}" id="mobilePhoneNumber" name="mobile_phone" required value="{{old('mobile_phone')}}"/>
        </div>
        <?php
        $loginValue = (session()->has('login')) ? session('login') : request()->get('login');
        $loginField = getLoginField($loginValue);
        ?>
    <!-- login -->
        <?php
        $loginError = (isset($errors) and $errors->has('login')) ? ' is-invalid shake___3oxNN' : '';
        $passwordField = (old('password') ? old('password') : '');
        ?>
        <div class="form-group col-md-12">
            <label for="exampleInputEmail1">@lang('checkout.email')</label>
            <input type="email" class="form-control{{ $loginError }}" name="login" required value="{{ old('login') }}"/>
        </div>
        @if(!\Illuminate\Support\Facades\Auth::user())
            <?php $passwordError = (isset($errors) and $errors->has('password')) ? ' is-invalid shake___3oxNN' : ''; ?>

            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">@lang('checkout.password')</label>
                <input type="password" class="form-control{{ $passwordError }}" name="password" value="{{ $passwordField }}" required/>
            </div>
        @endif
        <div class="col-md-12">
            <div class="auth-main__link-wrap need_auth">
                <a class="link">{{ trans('auth.Sign In') }}</a>
            </div>
        </div>
    </form>
</div>
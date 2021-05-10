<form id="checkout_form" name="checkout" action="{{ lurl('/checkout/save') }}" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="locale" value="{{ config('app.locale') }}">
    <input type="hidden" name="shipping" value="dhl">
    <input type="hidden" name="payment" value="sepa">
    <input type="hidden" name="i_agree" value="1">

        @auth
            <input type="hidden" name="login" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}"/>
        @else
            <?php
            $loginValue = (old('login') ? old('login') : $user->email);
            $loginError = (isset($errors) and $errors->has('login')) ? ' is-invalid shake___3oxNN' : '';
            ?>
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">@lang('checkout.email')</label>
                <input type="email" class="form-control{{$loginError}}" name="login" value="{{ $loginValue }}" required/>
            </div>
        @endauth

        @auth
            <input type="hidden" name="password" value="{{ \Illuminate\Support\Facades\Auth::user()->password }}"/>
        @else
            <?php
            $passwordError = (isset($errors) and $errors->has('password')) ? ' is-invalid shake___3oxNN' : '';
            $passwordField = (old('password') ? old('password') : $user->password);
            ?>
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">@lang('checkout.password')</label>
                <input type="password" class="form-control{{$passwordError}}" name="password" value="{{ $passwordField }}" required/>

            </div>
        @endauth
    <?php
        $namesField = (old('first_and_last_names') ? old('first_and_last_names') :  $user->name);
        $namesError = (isset($errors) and $errors->has('first_and_last_names')) ? ' is-invalid shake___3oxNN' : '';
    ?>
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">@lang('checkout.names')</label>
        <input type="text" class="form-control{{$namesError}}" name="first_and_last_names" value="{{ $namesField }}" required/>
    </div>
    <?php
        $addressError = (isset($errors) and $errors->has('address')) ? ' is-invalid shake___3oxNN' : '';
        $addressField = (old('address') ? old('address') : $user->address);
    ?>
    <div class="form-group col-md-12">
        <label for="exampleInputEmail1">@lang('checkout.address')</label>
        <input type="text" class="form-control{{$addressError}}" name="address" value="{{ $addressField }}" required/>
    </div>
    <?php
        $postCodeError = (isset($errors) and $errors->has('post_code')) ? ' is-invalid shake___3oxNN' : '';
        $zipField = (old('post_code') ? old('post_code') : $user->zip)
    ?>
    <div class="form-group col-md-3">
        <label for="exampleInputEmail1">@lang('checkout.post_code')</label>
        <input type="text" class="form-control{{$postCodeError}}" name="post_code" value="{{ $zipField }}" required/>
    </div>
    <?php
        $cityError = (isset($errors) and $errors->has('city')) ? ' is-invalid shake___3oxNN' : '';
        $cityField = (old('city') ? old('city') : $user->city)
    ?>
    <div class="form-group col-md-9">
        <label for="exampleInputEmail1">@lang('checkout.city')</label>
        <input type="text" class="form-control{{$cityError}}" name="city" required value="{{ $cityField }}"/>
    </div>
    <?php
        $countryIdError = (isset($errors) and $errors->has('country_id')) ? ' is-invalid shake___3oxNN' : '';
        $country = (old('country_id') ? \App\Models\Country::find(old('country_id')) : \App\Models\Country::where('code', $user->country_code)->first());
        $countryCode = (isset($country->code) ? $country->code : '');
    ?>
    <div class="form-group col-md-6">
        <label for="exampleFormControlSelect1">@lang('checkout.country')</label>
        <select class="form-control country_sel{{$countryIdError}}" name="country_id" required>
            <option value="" {{ $countryCode ? 'disabled selected="selected"' : '' }}>{{ t('Country') }}</option>

            <option data-phone="+49" value="DE" {{ ($countryCode == 'DE') ? 'selected="selected"' : '' }}>
                Deutschland     (+49)
            </option>
            <option data-phone="+43" value="AT" {{ ($countryCode == 'AT') ? 'selected="selected"' : '' }}>
                Österreich  (+43)
            </option>
            <option data-phone="+41" value="CH" {{ ($countryCode == 'CH') ? 'selected="selected"' : '' }}>
                Switzerland     (+41)
            </option>
            <option data-phone="+43" value="NL" {{ ($countryCode == 'NL') ? 'selected="selected"' : '' }}>
                Nederland   (+43)
            </option>
            <option data-phone="+32" value="BE" {{ ($countryCode == 'BE') ? 'selected="selected"' : '' }}>
                Belgique    (+32)
            </option>
            <option value="0" disabled="">------------------------</option>

            @foreach ($countries as $code => $item)
                @if(in_array($code, ['DE', 'AT', 'CH', 'NL', 'BE']) or !$item->get('phone'))
                    @continue
                @endif
                <option data-phone="+{{ $item->get('phone') }}" value="{{ $code }}" {{ ($countryCode == $code) ? 'selected="selected"' : '' }}>
                    {{ $item->get('name') }} (+{{ $item->get('phone') }})
                </option>
            @endforeach
        </select>
    </div>
    <?php
        $mobilePhoneError = (isset($errors) and $errors->has('city')) ? ' is-invalid shake___3oxNN' : '';
        $mobilePhoneField = (old('mobile_phone') ? old('mobile_phone') : $user->phone)
    ?>
    <div class="form-group col-md-6">
        <label for="exampleInputEmail1">@lang('checkout.mobile_number')</label>
        <input type="text" class="form-control{{$mobilePhoneError}}" id="mobilePhoneNumber" name="mobile_phone" required value="{{ $mobilePhoneField }}"/>
    </div>
</form>

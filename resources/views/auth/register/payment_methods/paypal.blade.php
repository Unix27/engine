<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading_bank_ec">
        <h4 class="panel-title">
            <input aria-controls="panel_bank_ec" class="payment-radio" data-parent="#banking" data-target="#panel_bank_ec" data-toggle="collapse" id="paymentElv" name="PaymentTypeID" type="radio" value="3">
            <label for="paymentElv">
                PayPal
                <span class="bank-icon" style="top: -3px;"><img src="{{ url('images/paypal-payment.png') . getPictureVersion() }}" alt=""></span>
            </label>
        </h4>
    </div>
    <div id="panel_bank_ec" class="panel-collapse collapse checked" role="tabpanel" aria-labelledby="heading_bank_ec">
        <div class="panel-body">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="form-group form-group-inline ">
                        <input type="text" class="form-control " id="inputFirstName" name="sFirstNameElv" placeholder={{t("First name")}} value="{{old('sFirstNameElv')}}">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group ">
                        <input type="text" class="form-control" id="inputLastName" name="sLastNameElv" placeholder={{ t("Last name") }} value="{{old("sLastNameElv")}}">

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group required">
                    <?php $countryCodeError = (isset($errors) and $errors->has('country_code')) ? ' is-invalid' : ''; ?>
                    <div class="col-md-6">
                        <select id="countryCode" name="country_code" class="form-control sselecter{{ $countryCodeError }}">
                            <option value="0" {{ (!old('country_code') or old('country_code')==0) ? 'disabled selected="selected"' : '' }}>{{ t('Country') }}</option>

                            <option value="DE" {{ (old('country_code') == 'DE') ? 'selected="selected"' : '' }}>
                                Deutschland
                            </option>
                            <option value="AT" {{ (old('country_code') == 'AT') ? 'selected="selected"' : '' }}>
                                Österreich
                            </option>
                            <option value="CH" {{ (old('country_code') == 'CH') ? 'selected="selected"' : '' }}>
                                Switzerland
                            </option>
                            <option value="NL" {{ (old('country_code') == 'NL') ? 'selected="selected"' : '' }}>
                                Nederland
                            </option>
                            <option value="BE" {{ (old('country_code') == 'BE') ? 'selected="selected"' : '' }}>
                                Belgique
                            </option>
                            <option value="0" disabled="">------------------------</option>
                            @foreach ($countries as $code => $item)
                                @if(in_array($code, ['DE', 'AT', 'CH', 'NL', 'BE']))
                                    @continue
                                @endif
                                <option value="{{ $code }}" {{ (old('country_code') == $code) ? 'selected="selected"' : '' }}>
                                    {{ $item->get('name') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="form-group form-group-inline ">
                        <input type="text" class="form-control" id="inputAddress" name="sStreetElv" placeholder={{t("Address line")}} value="{{old("sStreetElv")}}" maxlength="50">

                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group ">
                        <input type="text" class="form-control" id="inputNumber" name="sStreetNrElv" placeholder={{t("House_no")}} value="{{old("sStreetNrElv")}}" maxlength="15">

                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-2">
                    <div class="form-group form-group-inline ">
                        <input type="text" class="form-control" id="inputPLZ" name="sZipElv" placeholder={{ t("Post code") }} value="{{old("sZipElv")}}" maxlength="10">

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group ">
                        <input type="text" class="form-control" id="inputOrt" name="sCityElv" placeholder={{ t("City") }} value="{{old("sCityElv")}}" maxlength="30">

                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-12 alert alert-default alert-no-margin">
                    <p class="payment-footnote">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        {{ t("You will be forwarded directly to PayPal after the end of the order process to complete your purchase there.") }}
                    </p>
                </div>

            </div>

            <div class="col-sm-12" id="inputACBCcontainer" style="display: none;">
                <div class="col-sm-6">
                    <div class="form-group form-group-inline ">
                        <input type="tel" class="form-control" id="inputKontoNr" name="sAccountNr" placeholder={{ t("Account number") }} maxlength="10" value="{{old("sAccountNr")}}" disabled="">

                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group ">
                        <input type="tel" class="form-control" id="inputBlz" name="sBankCode" placeholder={{ t("Bank code") }} maxlength="8" value="{{old("sBankCode")}}" disabled="">

                    </div>
                </div>

            </div>

            <div class="col-sm-12" id="inputIBANcontainer" style="display: none">
                <div class="col-sm-6">
                    <div class="form-group ">
                        <input type="text" class="form-control" id="inputIban" name="sIban" placeholder="IBAN" value="{{old("inputIban")}}">

                    </div>
                </div>
            </div>
            <div class="col-sm-12" id="amount">
                <div class="col-sm-6">
                    <div class="form-group ">
                        <input  type="hidden" class="form-control" id="inputAmount" name="amount" placeholder="Amount" value="99.96">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.panel -->

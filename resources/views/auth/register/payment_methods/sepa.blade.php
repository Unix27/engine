<div class="panel panel-default active">
    <div class="panel-heading" role="tab" id="heading_bank_ec">
        <h4 class="panel-title">
            <input aria-controls="panel_bank_ec" class="payment-radio" data-parent="#banking" data-target="#panel_bank_ec" data-toggle="collapse" id="paymentElv" name="PaymentTypeID" type="radio" value="1">
            <label for="paymentElv">
                {{ t('SEPA Direct Debit') }}
                <span class="bank-icon" style="top: -3px;"><img src="{{ url('images/SepaLogoEN.jpg') . getPictureVersion() }}" alt=""></span>
            </label>
        </h4>
    </div>
    <div id="panel_bank_ec" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_bank_ec">
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

            <div class="col-sm-12" id="inputIBANcontainer">
                <div class="col-sm-6">
                    <div class="form-group ">
                        <input type="text" class="form-control" id="inputIban" name="sIban" placeholder="IBAN" value="{{old("inputIban")}}">

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class="form-group form-group-inline">
                        <a id="ibantoggle" href="javascript:void(0);">
                            <span id="ibantoggletext" style="display: none;">{{ t('Do you wish to enter your IBAN?') }}</span>
                            <span id="bankcodetoggletext" style="">{{ t("Do you wish to enter the account number and bank code?") }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">

                <div class="alert alert-default alert-no-margin">
                    <p class="payment-footnote">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        {{ t("I authorise") }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</div><!--/.panel -->
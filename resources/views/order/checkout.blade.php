@extends('layouts.master')

@section('content')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
    @include('common.spacer')
    <div class="webshop-showbasket">
        <div class="col-xs-12 col-md-10 white-bg" id="primary">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <h1>@lang('checkout.title')</h1>
                    </div>
                </div>
                <div class="col-md-4 checkout-b fix-class-1">
                    @include('order.inc.checkout.step-1')
                </div>
                <div class="col-md-3 checkout-b checkout-b2">
                    @include('order.inc.checkout.step-2')
                    <br clear="all"/>
                    @include('order.inc.checkout.step-3')
                </div>
                <div class="col-md-5 checkout-b fix-class-1 br-none">
                    @include('order.inc.checkout.step-4')
                    <br clear="all"/>
                    @include('order.inc.checkout.step-5')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('before_styles')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" type="text/css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

@endsection

@section('after_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" type="text/css"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script>
        // $(document).on('change', '#loginFormCheckout input', function (e) {
        //     let target = $(e.target);
        //     target.find('.login_input').removeClass('is-invalid');
        //     target.find('.password_input').removeClass('is-invalid');
        //     target.find('.alert-danger').html('').hide();
        // });

        $(document).on('submit', '#loginFormCheckout', function (e) {
            e.preventDefault();
            let target = $(e.target);
            $.ajax(
                {
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: $(this).serialize(),
                    beforeSend: function () {
                        target.find('.checkout_auth_btn').prop('disabled', true);
                        target.find('.btn-state').addClass('hide-text');
                        target.find('.loader___2Hyn1').show();
                    },
                })
                .success(function (response) {
                    if(response.next_url) {
                        window.location = response.next_url
                    } else if(response.html.length > 0) {
                        $('.checkout_auth_container_login').html(response.html);
                        target.find('.checkout_auth_btn').removeAttr('disabled');
                    }
                })
                .fail(function (response) {
                    target.find('.btn-state').removeClass('hide-text');
                    target.find('.loader___2Hyn1').hide();
                    target.find('.checkout_auth_btn').removeAttr('disabled');
                    if(response.responseJSON.message) {
                        target.find('.alert-danger').html(response.responseJSON.message).show();
                    }
                    if(response.responseJSON.data) {
                        if(response.responseJSON.data.login) {
                            target.find('.login_input').addClass('is-invalid');
                        }
                        if(response.responseJSON.data.password) {
                            target.find('.password_input').addClass('is-invalid');
                        }
                    }

                });

            return false;
        });

        $(document).on('click', '.checkout_submit', function(e){
            if($('#checkout_form').length > 0) {
                $('#checkout_form').submit();
            } else {
                if( $('#loginFormCheckout').length > 0) {
                    $('#loginFormCheckout').submit();
                }
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".checkout_auth_container_login").offset().top
                }, 400);
            }
        });

        $('#inlineRadio2, #inlineRadio1').change(function() {
            $('input[name=payment]').val(this.value);
        });

        // document.addEventListener('DOMContentLoaded',function(){
        //     let inp = document.querySelector('#mobilePhoneNumber');
        //
        //     // Проверяем фокус
        //     inp.addEventListener('focus', _ => {
        //         // Если там ничего нет или есть, но левое
        //         if(!/^\+\d*$/.test(inp.value))
        //             if($('.country_sel option:selected').data('phone')) {
        //                 inp.value = $('.country_sel option:selected').data('phone')
        //             } else {
        //                 inp.value = '+';
        //             }
        //     });
        //
        //     inp.addEventListener('keypress', e => {
        //         // Отменяем ввод не цифр
        //         if(!/\d/.test(e.key))
        //             e.preventDefault();
        //     });
        // });


    </script>
@endsection

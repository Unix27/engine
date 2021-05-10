@extends('layouts.master')

@section('content')
    @include('common.spacer')
    <div class=" webshop-showbasket">
        <div class="col-xs-12 col-md-10" id="primary">
            <div class="primary_inner">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>@lang('global.Cart')</h1>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 products_div">
                                <div class="row">
                                    <div class="ShowBasket_Custom_DIV">
                                        <div>
                                            <div class="col-xs-12">
                                                @foreach($cart as $item)
                                                    @continue(empty($item->product->post))
                                                    <div class="product" id="productcard_{{$item->id}}">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <a href="{{ \App\Helpers\UrlGen::post($item->product->post) }}">
                                                                    @if($item->product->post->pictures)
                                                                        @foreach($item->product->post->pictures as $key => $image)
                                                                            @if($key == 0)
                                                                                @if($image->filename)
                                                                                    <img align="left" border="0" class="ProductImage_ShowBasket" src="{{ imgUrl($image->filename, 'large') }}" style="width:50px;">
                                                                                @else
                                                                                    <img align="left" border="0" class="ProductImage_ShowBasket" src="{{ $image->product_picture_url }}" style="width:50px;">
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="col-xs-7">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <div class="product_title">
                                                                            <a href="{{ \App\Helpers\UrlGen::post($item->product->post) }}">{{$item->product->title}}</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="product_price" id="productprice_{{$item->id}}">
                                                                            @if(!empty($item->price))
                                                                                {{ currency_format($item->price * $item->qty) }}
                                                                            @else
                                                                                {{ currency_format($item->product->max_activity_amount * $item->qty) }}
                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12">
                                                                        <div class="product_actions">
                                                                            <div class="attributes___iJZOP">
                                                                                <div class="item___3x9Ra">
                                                                                    <div class="item___3x9Ra"><h2 class="header___2q1qM"><span class="quantity___19NI5"><div class="counter___3YosS"><div onclick="javascript:updateCart({{$item->id}},'minus');" id="minusbtn_{{$item->id}}" class="decrease___OetXE @if($item->qty == 1) disabled___3ejzi @endif" role="button" tabindex="0"></div><div class="count___3LcYb countOfProduct" id="amount_{{$item->id}}">{{$item->qty}}</div><div class="increase___1y9tY" onclick="javascript:updateCart({{$item->id}},'plus');" role="button" tabindex="0"></div></div></span></h2></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-2 text-right">
                                                                <span class="delete"><a href="javascript:void(0);" onclick="javascript:removeFromCart({{$item->id}});"><img border="0" src=""></a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <center><span id="emptyCart" @if(count($cart))style="display:none"@endif>{{t('Cart is empty')}}</span></center>
                                            </div>
                                        </div>
                                    </div>
                                    @if($cart->count() > 0)
                                        <div class="col-xs-12 clear_button">
                                            <a class="Order_empty_basket" href="{{route('remove_all')}}">{{t('remove_all')}}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 order_details_div">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="basket_description hidden-xs">
                                            {{t('Overall in the shopping cart')}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-6 basket_fee">
                                                {{t('Shipping fee')}}
                                            </div>
                                            <div class="col-xs-6 basket_fee text-right">
                                                {{ currency_format(0) }}
                                            </div>
                                            @if(!\Illuminate\Support\Facades\Auth::user() or !\Illuminate\Support\Facades\Auth::user()->hasAnyRole(['super-admin', 'trial', 'subscriber'])))
                                                <div class="col-xs-6 basket_paymethod">
                                                    {{ trans('checkout.trial_period') }}
                                                </div>
                                                <div class="col-xs-6 basket_paymethod text-right" style="font-size: 13px;">
                                                    {{ currency_format(0) }}
                                                </div>
                                                <div class="clearfix"></div>
                                            @endif
                                            <div class="col-xs-6 basket_total">
                                                {{t('Total')}}
                                            </div>
                                            <div class="col-xs-6 basket_total_price text-right">
                                                <strong><span class="laanlet_calc_total_price" id="total_price">{{ currency_format($total) }}</span></strong>
                                            </div>
                                            <div class="col-xs-12 basket_viabill text-right"></div>
                                            <div class="col-xs-12">
                                                <a class="order_now_btn" href="{{lurl('checkout')}}">@lang('global.buy_now')</a>
                                                <div class="basketMemberInfo">
                                                    <p>@lang('global.b_link',['url' => lurl('/terms')])</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @if($similar_products)--}}
{{--        <div class="post__content">--}}
{{--            <div class="whiteList___1-H1l item___jF3um product-card-similar">--}}
{{--                @include('order.similar',['posts' => $similar_products->posts, 'block_title' => t('Great checkout deals for you!')])--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="cart placeholder_bottom">
        <div class="global_usp">
            <div class="container">
                <div class="usp_boxes">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ups_container">
                                <i aria-hidden="true" class="fa fa-truck">&nbsp;</i>
                                <div class="ups_text">
                                    <strong>{{t('Always cheap shipping costs')}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ups_container">
                                <i aria-hidden="true" class="fa fa-clock-o">&nbsp;</i>
                                <div class="ups_text">
                                    <strong>{{t('Fast shipping on stock items')}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="ups_container">
                                <i aria-hidden="true" class="fa fa-phone">&nbsp;</i>
                                <div class="ups_text">
                                    <strong>{{t('Customer service support')}}</strong><br>
                                    @lang('global.tel_and_email',[
                                        'tel' => '000 000-00-00',
                                        'mail' => 'mailto:'.config('settings.app.email'),
                                        'mail2' => config('settings.app.email')
                                    ])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" type="text/css"/>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script>
        var curr = '{{(currency()->getUserCurrency() == 'EUR')?'€':'$'}}';
        function updateCart(productId,action){
            $.post('/cart/update',{product_id:productId,'action':action},function onAjaxSuccess(data){
                if(data.cart_update){
                    $('#amount_' + productId).text(data.cart_update.qty);
                    if(data.cart_update.qty == 1){
                        if(!$('#minusbtn_' + productId).hasClass('disabled___3ejzi')){
                            $('#minusbtn_' + productId).addClass('disabled___3ejzi');
                        }
                    }else{
                        if($('#minusbtn_' + productId).hasClass('disabled___3ejzi')){
                            $('#minusbtn_' + productId).removeClass('disabled___3ejzi');
                        }
                    }
                    $('#productprice_' + productId).text((data.cart_update.price * data.cart_update.qty) + ' ' +curr);

                    updateCartTotalPrice();
                    updateCartCount();
                }
            })
        }

        function removeFromCart(productId){
            $.post('/cart/remove',{product_id:productId,'action':'remove'},function onAjaxSuccess(data){
                $('#productcard_' + productId).remove();

                $.get('/cart/count',{},function onAjaxSuccess(data){
                    if(data == 0){
                        $('#emptyCart').fadeIn(300);
                    }
                });

                updateCartTotalPrice();
                updateCartCount();
            })
        }

        function updateCartTotalPrice(){
            $.get('/cart/total-price',{},function onAjaxSuccess(data){
                $('#total_price').text(data + ' ' + curr);
            });
        }

        function updateCartCount(){
            $.get('/cart/count',{},function onAjaxSuccess(data){
                if(data > 0){
                    $('#cartCount').text(data);
                    $('#cartCount').fadeIn();
                }else{
                    $('#cartCount').text(data);
                    $('#cartCount').fadeOut();
                }
            });
        }
    </script>
@endsection

@extends('layouts.master')

@section('content')
    <div class="main-container account">
        @include('common.spacer')
        <div class="container">
            <div class="row">
                <div class="col-md-3 page-sidebar">
                    @include('account.inc.sidebar')
                </div>
                <div class="col-md-9 page-content margin-set-15-mob">
                    <div class="column___ev7rq">
                        <div class="inner___3Z5Lk">
                            <div class="element___Zz7DL">
                                <div class="">
                                    <div class="parcelPageCard___2kbA_">
                                        <div class="parcelPageCardInner___3gjFU">
                                            <div class="header___2keEQ">
                                                <div class="headerText___2iNLG">
                                                    <span
                                                        class="shippingLabel___1aEgv">@lang('orders.order_number')</span>{{$order->number}}
                                                    <br/>
                                                    <span
                                                        class="shippingLabel___1aEgv">@lang('orders.delivery')</span>{{date('d.m',strtotime($order->created_at) + 432000)}}
                                                    - {{date('d.m',strtotime($order->created_at) + 2592000)}}
                                                </div>
                                                @if($order->payment_status == 'success')
                                                    <div class="badge___2y7_R statusBadge___28FjV"
                                                         style="color: rgb(255, 255, 255); background-color: #82bb37;">
                                                        @lang('orders.success_payment')
                                                    </div>
                                                @else
                                                    <div class="badge___2y7_R statusBadge___28FjV"
                                                         style="color: rgb(255, 255, 255); background-color: #f6731c;">
                                                        @lang('orders.incomplete_payment')
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="parcelPageCard___2kbA_">
                                        <div class="parcelPageCardInner___3gjFU"><h2 class="header___3KxGt"
                                                                                     style="padding: 0;">
                                                <b>@lang('orders.delivery_address')</b></h2>
                                            <div class="text___-FFul">
                                                <div class="address___2D-pZ">
                                                    <div><p class="line___3GYBJ"
                                                            style="margin: 0;">{{$order->customer_first_name}} {{$order->customer_last_name}}</p>
                                                        <p class="line___3GYBJ"
                                                           style="margin: 0;">{{$order->address}}</p>
                                                        <p class="line___3GYBJ"
                                                           style="margin: 0;">@if($order->country){{$order->country->name}}
                                                            ,@endif {{$order->city}}, {{$order->post_code}}</p>
                                                        <p class="line___3GYBJ"
                                                           style="margin: 0;">{{$order->mobile_phone}}</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($order->items)
                                        @foreach($order->items as $counter => $item)
                                            <div class="parcelPageCardGroup___Fb6Qf">
                                                <div class="parcelPageCard___2kbA_">
                                                    <div>
                                                        @include('account.inc.orderItem_block', ['hide_button' => true])
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="parcelPageCard___2kbA_">
                                                <div class="parcelPageCardInner___3gjFU">
                                                    <div class="textBlock___33WDB">
                                                        <div class="tracking___nxrF3"><span
                                                                class="label___YkjVZ" style="font-size: .7777rem;"><b>@lang('orders.tracking_number'):</b></span><span
                                                                class="value___2z0Y5">{{ $item->packageItem->tracking_code ? $item->packageItem->tracking_code : '-' }}</span></div>
                                                        <div class="date___C4Xm0"><span
                                                                class="label___YkjVZ" style="font-size: .7777rem;"><b>@lang('orders.delivery_period'):</b></span><span
                                                                class="value___2z0Y5">@lang('orders.not_later') {{date('d.m.Y',strtotime($item->packageItem->created_at) + 2592000)}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="item___1NoTC ">
                                                        <div class="content___26q-V">
                                                            <div>
                                                                @foreach($item->packageItem->logistics as $logistic)
                                                                    <div class="checkpoint___1uLQy hasLine___3ut7m">
                                                                        <div
                                                                            class="date___2HtyK">{{date('d.m',strtotime($logistic->created_at))}}
                                                                            <br><span
                                                                                class="time___c_2cd">{{date('H:i',strtotime($logistic->created_at))}}</span>
                                                                        </div>
                                                                        <div
                                                                            class="location___3ca2O">{{ $logistic->title }}</div>
                                                                        <div>
                                                                            <div class="line___qITZ-"></div>
                                                                            <div class="point___3zStY"></div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if($posts)
                                        <div class="parcelPageCard___2kbA_">
                                            <div class="parcelPageCardInner___3gjFU">
                                                <div class="productsBig___2lkFA"><h2 class="smallHeader___2srLo">
                                                        <b>@lang('orders.similar_products_heading')</b></h2>
                                                    <div class="pane___B3IxD   ">
                                                        <div class="reducer___32u8i">
                                                            <div class="inner___2z2h2 mainProducts  best-products"
                                                                 style="margin: 0;padding: 0;overflow: hidden;">
                                                                <div class="products maxSixCols revision wide">
                                                                    <div class="products__inner" id="postsList"
                                                                         style="justify-content: center;">
                                                                        @include('home.inc.latestItems')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="resizeTriggers___O7gyu">
                                    <div>
                                        <div style="width: 713px; height: 947px;"></div>
                                    </div>
                                    <div class="contractTrigger___2DSPP"></div>
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
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="{{ assetVer('cabinet.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection
<div class="parcelPageCard___2kbA_" style="border-bottom: 1px solid #e0e0e0;padding-bottom: .8888rem;">
    <div class="parcelPageCardInner___3gjFU">
        <div class="header___2keEQ">
            <div class="headerText___2iNLG">
                <span class="shippingLabel___1aEgv">@lang('orders.order_number')</span>{{$package->order->number}}<br/>
                <span class="shippingLabel___1aEgv">@lang('orders.delivery')</span>{{date('d.m',strtotime($package->created_at) + 432000)}} - {{date('d.m',strtotime($package->created_at) + 2592000)}}
            </div>
            <div class="badge___2y7_R statusBadge___28FjV {{ 'package__status__' . $package->status}}">
                @lang('orders.package.status.' . $package->status)
            </div>
        </div>
    </div>
    @if(isset($package->items))
        @foreach($package->items as $key => $item)
            <div class="orderLayout___1ZdyP">
                @continue(!isset($item->post))
                @include('account.order.item-details')
                @if(++$key == $package->items->count())
                    <div class="right___3aBMk withButton___NU2H_">
                        <div class="desktopPrice___1yFcr">
                            <div class="price___2co1F"><span
                                    class="hidden___6wtOd">@lang('orders.price') </span><span
                                    itemprop="price" content="{{ $package->order->total_price }}">{{ currency_format($package->order->total_price) }}&nbsp;</span>
                                <meta itemprop="priceCurrency">
                            </div>
                        </div>
                        <div class="button___1BVis"><a
                                class="button___3hmfW fill-lightgrey___1_RNO padding-wide___1E463 block___2aWbQ rounded___1J8B1"
                                href="{{lurl('account/orders/'.$package->order->id)}}"><span
                                    class="children___1pivU">@lang('orders.order_details')</span></a>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
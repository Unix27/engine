<div class="orderLayout___1ZdyP">
    <div class="left___3Z4LR">
        <div class="image___3N4pp"><a
                    href="{{lurl('account/orders/'.$order->id)}}"><img
                        class="image___2zb04  contain___2Fhmk"
                        alt="{{ $item->post->title }}" src="{{$item->post->mainPicture}}"
                        width="100%" height="100%"></a></div>
        <div>
            @php
                $options = array();
                $preparedOptions = array();

                if($item->options != '' && $item->options){
                    $options = json_decode($item->options,true);
                }

                if($options){
                    foreach($options as $f=>$opt){
                        $pfield = \App\Models\ProductField::where('field_id','=',$f)->first();
                        $pvalue = \App\Models\ProductFieldOption::where('option_id','=',$opt)->first();

                        if($pfield && $pvalue){
                            $preparedOptions[$pfield->name] = $pvalue->value;
                        }
                    }
                }
            @endphp
            {{ $item->post->title }}@if(count($preparedOptions))@foreach($preparedOptions as $f=>$opt), {{$f}}: {{$opt}}@endforeach @endif

            <div class="mobilePrice___27axw">
                <div class="price___2co1F"><span
                            class="hidden___6wtOd">@lang('orders.price') </span><span
                            itemprop="price" content="{{$item->total_price}}">{{$item->total_price}} {{$order->currency->font_arial}}</span>
                    <meta itemprop="priceCurrency" content="UAH">
                </div>
            </div>
        </div>
    </div>
    <div class="center___1X51V margin-0-fix">
        <div class="dateRow___1CytD"><span class="dateLabel___7jFWt">@lang('orders.quantity')</span><span class="dateValue___1YBHy">{{$item->quantity}}</span></div>
        <div class="dateRow___1CytD"><span class="dateLabel___7jFWt">@lang('orders.price')</span><span class="dateValue___1YBHy">{{$item->total_price}} {{$order->currency->font_arial}}</span></div>
        <div class="dateRow___1CytD"><span class="dateLabel___7jFWt">@lang('orders.order_date')</span>
            <span class="dateValue___1YBHy">{{date('d.m.Y',strtotime($order->created_at))}}</span></div>
        <div class="dateRow___1CytD"><span class="dateLabel___7jFWt">@lang('orders.guarantee')</span>
            <span class="dateValue___1YBHy">@lang('orders.valid_until') {{date('d.m.Y',strtotime($order->created_at) + 31536000)}}</span>
        </div>
    </div>

        <div class="right___3aBMk withButton___NU2H_">
            <div class="desktopPrice___1yFcr">
                <div class="price___2co1F"><span
                            class="hidden___6wtOd">@lang('orders.price') </span><span
                            itemprop="price" content="{{ $item->total_price }}">{{ currency_format($item->total_price) }}&nbsp;</span>
                    <meta itemprop="priceCurrency" content="UAH">
                </div>
            </div>
            @if(!isset($hide_button) || !$hide_button)
                <div class="button___1BVis"><a
                            class="button___3hmfW fill-lightgrey___1_RNO padding-wide___1E463 block___2aWbQ rounded___1J8B1"
                            href="{{lurl('account/orders/'.$order->id)}}"><span
                                class="children___1pivU">@lang('orders.order_details')</span></a>
                </div>
            @endif
        </div>

</div>
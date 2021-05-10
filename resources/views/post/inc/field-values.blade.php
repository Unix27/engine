
<div class="item___jF3um" id="customFields" data-item_count="{{ $customFields->count() }}">
    <div class="attributes___iJZOP">
        <div class="item___3x9Ra">
            <div class="item___3x9Ra"><h2 class="header___2q1qM">{{t('Count')}} <span class="quantity___19NI5"><div class="counter___3YosS"><div onclick="javascript:decProductCount();" class="decrease___OetXE @if(!isset($productCount) || $productCount < 2){{'disabled___3ejzi'}}@endif" role="button" tabindex="0"></div><div class="count___3LcYb countOfProduct" id="countOfProduct">@if(isset($productCount)){{$productCount}}@else{{'1'}}@endif</div><div class="increase___1y9tY" onclick="javascript:incProductCount();" role="button" tabindex="0"></div></div></span></h2></div>
        </div>
        <script>
            function decProductCount(){
                var count = $('.countOfProduct');
                for(var i = 0; i<count.length; i++){
                    if(parseInt($(count[i]).text()) > 1){
                        var ccnt = parseInt($(count[i]).text()) - 1;

                        $(count[i]).text(ccnt);
                        product_count = ccnt;
                    }else{
                        $('.decrease___OetXE').addClass('disabled___3ejzi');
                    }
                }
            }
            function incProductCount(){
                var count = $('.countOfProduct');
                for(var i = 0; i<count.length; i++){
                    var ccnt = parseInt($(count[i]).text()) + 1;

                    $(count[i]).text(ccnt);
                    product_count = ccnt;

                    if(parseInt($(count[i]).text()) > 1){
                        $('.decrease___OetXE').removeClass('disabled___3ejzi');
                    }
                }
            }
        </script>
        @if (isset($customFields) and $customFields->count() > 0)
            @php $k = 0; @endphp
            @foreach($customFields as $field)
                <div class="item___3x9Ra custom_field_{{$k}}">

                    <?php
                    if (in_array($field->type, ['radio', 'select'])) {
                        if (is_numeric($field->default)) {
                            $option = \App\Models\FieldOption::findTrans($field->default);
                            if (!empty($option)) {
                                $field->default = $option->value;
                            }
                        }
                    }
                    if (in_array($field->type, ['checkbox'])) {
                        $field->default = ($field->default == 1) ? t('Yes') : t('No');
                    }
                    ?>
                    @if ($field->type == 'file')
                        <div class="detail-line col-xl-12 pb-2 pl-1 pr-1">
                            <div class="rounded-small ml-0 mr-0 p-2">
                                <span class="detail-line-label" style="padding-top: 8px;">{{ $field->name }}</span>
                                <span class="detail-line-value">
                                        <a class="btn btn-default" href="{{ fileUrl($field->default) }}" target="_blank">
                                            <i class="icon-attach-2"></i> {{ t('Download') }}
                                        </a>
                                    </span>
                            </div>
                        </div>
                    @else
                        @if (!is_array($field->default))
                            <div class="detail-line col-sm-6 col-xs-12 pb-2 pl-1 pr-1">
                                <div class="rounded-small p-2">
                                    <span class="detail-line-label">{{ $field->name }}</span>
                                    <span class="detail-line-value">{{ $field->default }}</span>
                                </div>
                            </div>
                        @else
                            @if (count($field->default) > 0)
                                <h2 class="header___2q1qM post-attribute-name" data-attr-name="{{ $field->name }}">{{ $field->name }}{{ $field->selected_option_name ? ': ' . $field->selected_option_name : '' }}</h2>
                                <div class="sku-container">
                                    @foreach($field->default as $valueItem)
                                        {{--                                                @continue(!$valueItem->avail)--}}
                                        @if(data_get($valueItem, 'product_picture_url_thumbnail'))
                                            <div id="sku_attr" class="color___3-Bw4 ">
                                                <div class="parent___1LbEu hoverable___3o0h0 with-picture-attribute {{$valueItem->selected ? 'selected___GvdwT' : ''}} {{ $valueItem->disabled ? 'disabled___1V_Yh' : '' }}" data-product_field_option_id="{{ $valueItem->product_field_option_id }}" data-cfieldk="{{$k}}" data-product_id="{{ $bestSellerProduct->id }}" data-sku_option="{{ $field->id }}" data-sku_attr="{{ $valueItem->id }}" data-img="{{ data_get($valueItem, 'product_picture_url')}}" data-formatted="{{ $field->name . ': ' . data_get($valueItem, 'value') }}" data-picture_id="{{$valueItem->picture_id}}">
                                                    <img class="image___2zb04 image___M99AB cover___xWUoT" alt="{{ data_get($valueItem, 'value') }}" data-field="{{ data_get($valueItem, 'value') }}"
                                                         src="{{ data_get($valueItem, 'product_picture_url_thumbnail') }}" sizes="1em"
                                                         srcset="{{ data_get($valueItem, 'product_picture_url_thumbnail') }} 100w, {{ data_get($valueItem, 'product_picture_url_thumbnail') }} 200w, {{ data_get($valueItem, 'product_picture_url_thumbnail') }} 400w, {{ data_get($valueItem, 'product_picture_url_thumbnail') }} 599w">
                                                </div>
                                                <span class="colorName___1lp0X  post-attribute-value">
                                                            {{ data_get($valueItem, 'value') }}
                                                    @if($valueItem->disabled)
                                                        <span class="disabledOverlay___1_KGq"></span>
                                                    @endif
                                                </span>
                                            </div>
                                        @else
                                            <div id="sku_attr"  class="sizeWrapper___3GliA  sku-attribute">
                                                <div class="size___2I9Zv {{$valueItem->selected ? 'selected___1QFWZ' : ''}} {{ $valueItem->disabled ? 'disabled___1V_Yh' : '' }}" data-cfieldk="{{$k}}" data-product_id="{{ $bestSellerProduct->id }}" data-product_field_option_id="{{ $valueItem->product_field_option_id }}"  data-sku_option="{{ $field->id }}" data-sku_attr="{{ $valueItem->id }}" data-formatted="{{ $field->name . ': ' . data_get($valueItem, 'value') }}">
                                                    {{ data_get($valueItem, 'value') }}
                                                    @if($valueItem->disabled)
                                                        <span class="disabledOverlay___1_KGq"></span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    @endif
                    @php $k++; @endphp
                </div>
            @endforeach
        @endif
    </div>
</div>

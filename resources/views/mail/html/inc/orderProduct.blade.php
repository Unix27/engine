@if($order->items)
    @foreach($order->items as $counter=>$item)
        @php
            $post = \App\Models\Post::where('id','=',$item->post_id);

            $rvPost = \App\Plugins\reviews\app\Models\Post::find($item->post_id);
            $pictures = \App\Models\Picture::where('post_id', $item->post_id)->orderBy('position')->orderBy('id');
            if ($pictures->count() > 0) {
                $postImg = $pictures->first()->filename ? imgUrl($pictures->first()->filename, 'large') : $pictures->first()->product_picture_url;
            } else {
                $postImg = imgUrl(config('larapen.core.picture.default'));
            }
        @endphp

        <table style="border:0 none;background-color:#fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
            <tbody>
            <tr>
                <td style="padding:0;" valign="top">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td style="padding:0;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                    <tr>
                                        <td style="padding:0;" width="100" valign="top">
                                            <table style="border:0 none;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr>
                                                    <td style="padding:0;" valign="top">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td style="padding:0;">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="padding:10px;" valign="top">
                                                                                <div style="text-align:left;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-size:12px;color:#000;line-height:14px;text-align:right;">#{{$counter+1}}</div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="padding:0;" width="399" valign="top">
                                            <table style="border:0 none;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr>
                                                    <td style="padding:0;" valign="top">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td style="padding:0;">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="padding:0;" width="199" valign="top">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td style="padding:0;" align="center">
                                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td style="padding:10px;" valign="top" align="center">
                                                                                                        <table style="border:0 none;height:auto;" width="138" cellspacing="0" cellpadding="0" border="0">
                                                                                                            <tbody>
                                                                                                            <tr>
                                                                                                                <td style="padding:0;" valign="top">
                                                                                                                    <a href="{{ \App\Helpers\UrlGen::post($post) }}" rel="noreferrer noopener" target="_blank"><img alt="{{ $rvPost->title }}" src="{{$postImg}}" style="display:block;" width="138" height="138" border="0"></a>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td style="padding:0;" width="199" valign="top">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td style="padding:10px;" valign="top">
                                                                                            <div style="text-align:left;font-family:Roboto,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:13px;color:#3d3f56;line-height:20px;">
                                                                                                <p style="padding:0;margin:0;">@lang('mail.order_mail.order_number') {{$order->number}}</p>
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

                                                                                                @if(count($preparedOptions))
                                                                                                    @foreach($preparedOptions as $f=>$opt)
                                                                                                        <p style="padding:0;margin:0;">{{$f}}: {{$opt}}</p>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                                <p style="padding:0;margin:0;">@lang('mail.order_mail.quantity') {{$item->quantity}}</p>
                                                                                                <p style="padding:0;margin:0;">@lang('mail.order_mail.price') {{$item->total_price}}&nbsp;{{$order->currency->font_arial}}</p>
                                                                                                <p style="padding:0;margin:0;">@lang('mail.order_mail.delivery') {{date('d.m',time() + 432000)}}-{{date('d.m',time() + 2592000)}}</p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td style="padding:0;" width="100" valign="top">
                                            <table style="border:0 none;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                <tr>
                                                    <td style="padding:0;" valign="top">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td style="padding:0;">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="padding:10px;" valign="top">
                                                                                <div style="text-align:left;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-size:12px;color:#000;line-height:14px;"></div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
    <table style="border:0 none;background-color:#fff;" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
        <tbody>
        <tr>
            <td style="padding:0;" valign="top">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td style="padding:0;">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                <tr>
                                    <td style="padding:0;" width="100" valign="top">
                                        <table style="border:0 none;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td style="padding:0;" valign="top">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding:10px;" valign="top">
                                                                            <div style="text-align:left;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-size:12px;color:#000;line-height:14px;text-align:right;">#{{$counter+2}}</div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="padding:0;" width="399" valign="top">
                                        <table style="border:0 none;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td style="padding:0;" valign="top">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding:0;" width="399" valign="top">
                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="padding:10px;" valign="top">
                                                                                        <div style="text-align:left;font-family:Roboto,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:13px;color:#3d3f56;line-height:20px;">
                                                                                            <p style="padding:0;padding-left: 20px;margin:0;">@lang('checkout.trial_period')</p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="padding:0;" width="100" valign="top">
                                        <table style="border:0 none;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td style="padding:0;" valign="top">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding:10px;" valign="top">
                                                                            <div style="text-align:left;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-size:12px;color:#000;line-height:14px;"></div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@endif

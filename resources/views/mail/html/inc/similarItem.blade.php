<td style="padding:0;" width="300" valign="top">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
        <tr>
            <td style="padding:10px;" valign="top">
                <table style="border:1px solid #ebebeb;border-radius:8px;border-collapse:separate!important;" width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                    <tr>
                        <td style="padding:10px;" valign="top">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="padding:0;">
                                        <table style="border:0 none;border-radius:8px;border-collapse:separate!important;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                            <tr>
                                                <td style="padding:0;" valign="top">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:0;">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="padding:0;" align="center">
                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="padding-top:10px;" valign="top" align="center">
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
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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
                                                                        <td style="padding:0;" width="200" valign="top">
                                                                            @if(!empty($rvPost->calc_discount))
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td style="padding-top:10px;padding-right:32px;" valign="top">
                                                                                            <div style="text-align:left;font-family:Roboto,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:12px;color:#9697a1;line-height:14px;">
                                                                                                <p style="padding-left:60px;margin:0;text-align:left;">-{{ $rvPost->calc_discount }}%</p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            @endif
                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="padding-right:14px;padding-bottom:10px;" valign="top">
                                                                                        <div style="text-align:left;font-family:Roboto,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:18px;color:#2d2f43;line-height:22px;">
                                                                                            <p style="padding-left:60px;margin:0;text-align:left;">{{ $rvPost->formatted_price }}</p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding:0;" width="100%" valign="top">
                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="padding-right:58px;padding-bottom:10px;padding-left:58px;" valign="top">
                                                                                        <div style="text-align:left;font-family:Roboto,Helvetica Neue,Helvetica,Arial,sans-serif;font-size:12px;color:#000;line-height:20px;">
                                                                                            <p style="padding:0;margin:0;">{{ \Illuminate\Support\Str::limit($rvPost->title, 70) }}</p>
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
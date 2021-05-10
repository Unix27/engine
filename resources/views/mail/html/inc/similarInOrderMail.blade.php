@php $k = 0; @endphp
@foreach($similarProducts as $key => $post)
    @continue(!$post or !$post->title)
    @php
        $rvPost = \App\Plugins\reviews\app\Models\Post::find($post->id);
        $pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
        if ($pictures->count() > 0) {
            $postImg = $pictures->first()->filename ? imgUrl($pictures->first()->filename, 'large') : $pictures->first()->product_picture_url;
        } else {
            $postImg = imgUrl(config('larapen.core.picture.default'));
        }
    @endphp
    @continue(!$rvPost or !$rvPost->title)
    @php $k++; @endphp
    @if($k == 1)
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
                                        @endif

                                        @include('mail.html.inc.similarItem')

                                        @if(count($similarProducts) == ($key - 1) || $k == 2)
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
        @php $k = 0; @endphp
    @endif
@endforeach
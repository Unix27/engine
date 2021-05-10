@if($posts->count() > 0)
    <div class="wizard-products-list-container">
        <table class="table table-bordered table-striped display dt-responsive nowrap wizard-list-table" width="100%">
            <thead>
            <tr>
                <th data-orderable="false">Image</th>
                <th data-orderable="false">Name</th>
                <th data-orderable="false">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="wizard-products-list-tr">
                    <td>
                        {{-- <img src="{!!  imgUrl($post->pictures->first()->filename, 'thumbnail') !!} ">--}}
                        @php
                            $pictures = \App\Models\Picture::where('post_id', $post->id)->orderBy('position')->orderBy('id');
                            if ($pictures->count() > 0) {
                                $postImg = imgUrl($pictures->first()->filename, 'big');
                           } else {
                                $postImg = imgUrl(config('larapen.core.picture.default'));
                           }
                        @endphp

                        <img style="width: 150px;" src="{!! $postImg !!} ">
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        <button class="wizard-apply-button swal2-confirm swal2-styled" data-post-id="{{ $post->id }}">Apply</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="wizard-products-list-no-matches-container">
        <span class="text-capitalize">No matches found!</span>
    </div>
@endif
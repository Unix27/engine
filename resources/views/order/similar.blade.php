<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
if (config('settings.listing.display_mode') == '.compact-view') {
    $colDescBox = 'col-sm-9';
    $colPriceBox = 'col-sm-3';
} else {
    $colDescBox = 'col-sm-7';
    $colPriceBox = 'col-sm-3';
}
?>

@if (isset($posts))
    <div class="mainProducts  best-products">
        <div class="inner___1BAvS">
            <div class="row___3n5Yt" style="background: white; border-radius: 1rem;">
                <h1 class="header headerMargin" style="padding-top: 1rem;"> {{ isset($block_title) ? $block_title : t('Best Products') }}</h1>
                <div class="products maxSixCols revision wide">
                    <div class="products__inner" id="postsList" style="justify-content: center;">
                        @include('home.inc.latestItems')
                    </div>
                </div>
                <div class="controls">

                    <?php $attr = ['countryCode' => config('country.icode')]; ?>
                    <span class="loadingButton" style="display: none">
                        <span class="loader___AOgfw loader___1H8DK">
                            <span class="dot___27mgG dark___1HvbV dot1___zYQVX"></span>
                            <span class="dot___27mgG dark___1HvbV dot2___1Bd_A"></span>
                            <span class="dot___27mgG dark___1HvbV dot3___pGqeN"></span>
                            <span class="dot___27mgG dark___1HvbV dot4___1C96p"></span>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endif

@section('after_scripts')
    @parent
    <script>
        var page = 1;
        $('.show-more').on('click tap', function (e) {
            page++;
            // $(this).removeClass('show-more');
            loadMoreData(page);
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    page++;
                    loadMoreData(page);
                }
            });
        });

        function loadMoreData(page) {
            $.ajax(
                {
                    url: '?page=' + page + '&show_more=true',
                    type: "get",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    beforeSend: function () {
                        $('.loadingButton').show();
                        $('.show-more').hide();

                    }
                })
                .done(function(data)
                {
                    if(data.html.length == "0"){
                        $('.show-more').html("No more records found");
                        return;
                    }
                    $('.loadingButton').hide();
                    $('.show-more').show();
                    $("#postsList").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    $('.loadingButton').hide();
                });
        }
        // loadingButton___1G8kx
    </script>
@endsection

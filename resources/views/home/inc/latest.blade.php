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
			<div class="inner"><h1 class="header headerMargin"> {{ isset($block_title) ? $block_title : t('Best Products') }}</h1>
				<div class="products maxSixCols revision wide">
					<div class="products__inner" id="postsList">
						@include('home.inc.latestItems')
					</div>
				</div>
                <div class="controls">
                    
                    <?php $attr = ['countryCode' => config('country.icode')]; ?>

                        @if(count((array)$posts) > 11)
                            <a class="button show-more">
                                {{t('Show more')}}
                            </a>
                        @endif

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
@endif

@section('after_scripts')
    @parent
    <script>
        var page = 1;
        var noRecords = false;
        var loading = false;

        $('.show-more').on('click tap', function (e) {
            page++;
            loadMoreData(page);
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() && !loading && !noRecords) {
                    page++;
                    loadMoreData(page);
                }
            });
            // if ($(window).scrollTop() + document.body.clientHeight >= $(document).height() && !noRecords) {
            //     page++;
            //     loadMoreData(page);
            // }
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
                        loading = true;
                    }
                })
                .done(function(data)
                {
                    if(data.html.length == "0"){
                        @if(config('app.locale') == 'en')
                            $('.loadingButton').html("No more records found");
                        @else
                            $('.loadingButton').html("Keine weiteren Datensätze gefunden");
                        @endif
                        $('.loadingButton').hide();
                        $('.show-more').hide();
                        noRecords = true;
                        return;
                    }

                    $('.loadingButton').hide();
                    $('.show-more').show();
                    $("#postsList").append(data.html);
                    loading = false;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    $('.loadingButton').hide();
                    $('.show-more').hide();
                });
        }
    </script>
@endsection

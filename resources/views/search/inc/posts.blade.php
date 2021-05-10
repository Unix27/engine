<?php
if (!isset($cacheExpiration)) {
    $cacheExpiration = (int)config('settings.optimization.cache_expiration');
}
?>


<div class="posts_category__column marginBottom md-8 lg-9">
    <div class="column-overflow enabled equalToParent">
        <div class="inner">
            <div class="element">
                <div class="">
                    <div class="products-overflow">
                        <div class="products-col maxFourCols narrow revision">
                            <div class="inner-col" id="postsList">
                                @include('search.inc.postsItems')
                            </div>
                        </div>
                        @if (isset($paginator) and $paginator->hasPages())
                            <div class="controls">
                                <a class="button show-more">
                                    {{t('Show more')}}
                                </a>
                                <span class="loadingButton" style="display: none">
                                <span class="loader___AOgfw loader___1H8DK">
                                    <span class="dot___27mgG dark___1HvbV dot1___zYQVX"></span>
                                    <span class="dot___27mgG dark___1HvbV dot2___1Bd_A"></span>
                                    <span class="dot___27mgG dark___1HvbV dot3___pGqeN"></span>
                                    <span class="dot___27mgG dark___1HvbV dot4___1C96p"></span>
                                    </span>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="resizeTriggers">
                    <div>
                        <div style="width: 960px; height: 3714px;"></div>
                    </div>
                    <div class="contractTrigger"></div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                        $('.loadingButton').html("No more records found");
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
    </script>
@endsection

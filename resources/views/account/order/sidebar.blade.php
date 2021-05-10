<div class="column___1WRbZ marginBottom___lo7lp md-12___1B8aG lg-3___121hB">
    <div class="column___ev7rq enabled___72Ed0 sticky___3sz09">
        <div class="inner___3Z5Lk">
            <div class="element___Zz7DL">
                <div class="">
                    <div class="parcelPageCard___2kbA_">
                        <div class="filtersBlock___1nvQp">
                            <div class="filterItem___2KFOV active___2XLUT" role="button" tabindex="0" onclick="openOrder(event)">{{ trans('orders.menu.All') }} ({{ $user->packages->count() }})</div>
                            <div class="filterItem___2KFOV" role="button" tabindex="0" onclick="openOrder(event, 'new')">{{ trans('orders.menu.Active') }}&nbsp;({{ $user->packages->whereIn('status', [\App\Models\Package::STATUS_NEW, \App\Models\Package::STATUS_PANDING])->count() }})</div>
                            <div class="filterItem___2KFOV" role="button" tabindex="0" onclick="openOrder(event, 'panding')">{{ trans('orders.menu.Awaiting shipment') }}&nbsp;({{ $user->packages->whereIn('status', [\App\Models\Package::STATUS_PANDING])->count() }})</div>
                            <div class="filterItem___2KFOV" role="button" tabindex="0" onclick="openOrder(event, 'success')">{{ trans('orders.menu.Shipped') }}&nbsp;(0)</div>
{{--                            <div class="filterItem___2KFOV" role="button" tabindex="0" onclick="openOrderReview(event)">{{ trans('orders.menu.Awaiting review') }}&nbsp;(0)</div>--}}
                            <div class="filterItem___2KFOV" role="button" tabindex="0" onclick="openOrder(event, 'complete')">{{ trans('orders.menu.Completed') }}&nbsp;({{ $user->packages->whereIn('status', [\App\Models\Package::STATUS_SUCCESS])->count() }})</div>
                        </div>
                    </div>
                </div>
                <div class="resizeTriggers___O7gyu">
                    <div>
                        <div style="width: 310px; height: 239px;"></div>
                    </div>
                    <div class="contractTrigger___2DSPP"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openOrder(evt, status) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("filterItem___2KFOV");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active___2XLUT", "");
        }
        evt.currentTarget.className += " active___2XLUT";
        $.ajax(
            {
                url: siteUrl + '/account/orders/filter',
                type: "post",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {status: status},
                beforeSend: function () {
                    $('.orders-loader').show();
                }
            })
            .done(function(data)
            {
                $('.orders-loader').hide();
                $(".tabcontent").html(data.html).show();
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                console.log('error');
            });
    }
</script>
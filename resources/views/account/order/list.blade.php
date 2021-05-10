@if($packages->count())
    <div class="column___ev7rq enabled___72Ed0 sticky___3sz09">
        <div class="inner___3Z5Lk">
            <div class="element___Zz7DL">
                <div class="">
                    <div>
                        @foreach($packages as $package)
                            @include('account.order.item')
                        @endforeach
                    </div>
                </div>
                <div class="resizeTriggers___O7gyu">
                    <div>
                        <div style="width: 894px; height: 283px;"></div>
                    </div>
                    <div class="contractTrigger___2DSPP"></div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="column___ev7rq enabled___72Ed0 sticky___3sz09">
        <div class="inner___3Z5Lk">
            <div class="element___Zz7DL">
                <div class="">
                    <div class="message___3bJnH asPage___2KVF5">
                        <div class="content___uhQNg">
                            <div class="inner___27ZuH"><h1 class="title___11uZU">@lang('orders.orders_was_not_found')</h1></div>
                        </div>
                    </div>
                </div>
                <div class="resizeTriggers___O7gyu">
                    <div>
                        <div style="width: 894px; height: 97px;"></div>
                    </div>
                    <div class="contractTrigger___2DSPP"></div>
                </div>
            </div>
        </div>
    </div>
@endif
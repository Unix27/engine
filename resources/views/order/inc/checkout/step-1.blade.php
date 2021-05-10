<div class="col-md-12">
    <h3>@lang('checkout.step1')</h3>
</div>

@auth
    @include('order.inc.checkout._partials._user-info', ['user' => \Illuminate\Support\Facades\Auth::user()])
@else
    <div class="checkout_auth_container_login">
        @if($errors->has('unregister_user_error'))
            @include('order.inc.checkout._partials._user-info', ['user' => new \App\Models\User()])
        @else
            @include('order.inc.checkout._partials._register')
        @endif
    </div>
@endauth

<script>
    function changeToReg(){
        $('#regbtn').addClass('active');
        $('#logbtn').removeClass('active');

        $('.login-form').hide();
        $('.register-form').show();
    }
    function changeToLogin(){
        $('#regbtn').removeClass('active');
        $('#logbtn').addClass('active');

        $('.register-form').hide();
        $('.login-form').show();
    }
</script>
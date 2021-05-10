@if (isset($errors) and $errors->any())
    @foreach ($errors->all() as $error)
        @include('layouts.inc.headerNotifications.message', ['background_color' => '#dc3545', 'message' => $error])
    @endforeach
@endif

@if (session('status'))
    @include('layouts.inc.headerNotifications.message', ['background_color' => '#28a745', 'message' => session('status')])
@endif

@if (session('email'))
    @include('layouts.inc.headerNotifications.message', ['background_color' => '#dc3545', 'message' => session('email')])
@endif

@if (session('phone'))
    @include('layouts.inc.headerNotifications.message', ['background_color' => '#dc3545', 'message' => session('phone')])
@endif

@if (session('login'))
    @include('layouts.inc.headerNotifications.message', ['background_color' => '#dc3545', 'message' => session('login')])
@endif

@if (Session::has('flash_notification'))
    @include('layouts.inc.headerNotifications.flash_message', ['background_color' => '#28a745'])
@endif
@extends('layouts.master')

@section('content')
    <div class="main-container account">
        @include('common.spacer')
		<div class="container">
			<div class="row">

				@if (Session::has('flash_notification'))
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif

				<div class="col-md-3 page-sidebar">
					@include('account.inc.sidebar')
				</div>
				<!--/.page-sidebar-->

				<div class="col-md-9 page-content">
					<div class="inner-box">
						<h2 class="title-2"><i class="icon-cancel-circled "></i> {{ t('Close account') }} </h2>
						<p>{{ t('You are sure you want to close your account?') }}</p>

						@if ($user->can(\App\Models\Permission::getStaffPermissions()))
							<div class="alert alert-danger" role="alert">
								{{ t('Admin users can\'t be deleted by this way.') }}
							</div>
						@else
							<form role="form" method="POST" action="{{ lurl('account/close') }}">
								{!! csrf_field() !!}
								<div class="form-group row">
									<div class="col-md-12">
										<div class="form-check form-check-inline pt-2">
											<label class="form-check-label">
												<input class="form-check-input"
													   type="radio"
													   name="close_account_confirmation"
													   id="closeAccountConfirmation1"
													   value="1"
												> {{ t('Yes') }}
											</label>
										</div>
										<div class="form-check form-check-inline pt-2">
											<label class="form-check-label">
												<input class="form-check-input"
													   type="radio"
													   name="close_account_confirmation"
													   id="closeAccountConfirmation0"
													   value="0" checked
												> {{ t('No') }}
											</label>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary">{{ t('Submit') }}</button>
									</div>
								</div>
							</form>
						@endif

					</div>
					<!--/.inner-box-->
				</div>
				<!--/.page-content-->

			</div>
			<!--/.row-->
		</div>
		<!--/.container-->
	</div>
	<!-- /.main-container -->
@endsection
@section('before_styles')
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
@endsection
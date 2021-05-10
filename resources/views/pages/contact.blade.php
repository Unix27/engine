@extends('layouts.master')

@section('before_styles')
    <link href="{{ assetVer('app.min.css', '', 'build', 'css/') }}" rel="stylesheet">
@endsection

@section('content')
	@include('common.spacer')
	<div class="main-container">
		<div class="container">
			<div class="row clearfix">
				
				@if (isset($errors) and $errors->any())
					<div class="col-xl-12">
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><strong>{{ t('Oops ! An error has occurred. Please correct the red fields in the form') }}</strong></h5>
							<ul class="list list-check">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif

				@if (Session::has('flash_notification'))
					<div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12">
								@include('flash::message')
							</div>
						</div>
					</div>
				@endif
				
				<div class="col-md-12">
					<div class="contact-form">
						<h5 class="list-title gray mt-0">
							<strong>{{ t('Contact Us') }}</strong>
						</h5>

						<form class="form-horizontal" method="post" action="{{ lurl(trans('routes.contact')) }}">
							{!! csrf_field() !!}
							<fieldset>
								<div class="row">
									<div class="col-md-6">
										<?php $firstNameError = (isset($errors) and $errors->has('first_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="first_name" name="first_name" type="text" placeholder="{{ t('First Name') }}"
												   class="form-control{{ $firstNameError }}" value="{{ old('first_name') }}">
										</div>
									</div>

									<div class="col-md-6">
										<?php $lastNameError = (isset($errors) and $errors->has('last_name')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="last_name" name="last_name" type="text" placeholder="{{ t('Last Name') }}"
												   class="form-control{{ $lastNameError }}" value="{{ old('last_name') }}">
										</div>
									</div>

									<div class="col-md-6">
										<?php $emailError = (isset($errors) and $errors->has('email')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<input id="email" name="email" type="text" placeholder="{{ t('E-mail') }}" class="form-control{{ $emailError }}"
												   value="{{ old('email') }}">
										</div>
									</div>

									<div class="col-md-12">
										<?php $messageError = (isset($errors) and $errors->has('message')) ? ' is-invalid' : ''; ?>
										<div class="form-group required">
											<textarea class="form-control{{ $messageError }}" id="message" name="message" placeholder="{{ t('Message') }}"
													  rows="7">{{ old('message') }}</textarea>
										</div>
										
										@include('layouts.inc.tools.recaptcha')

										<div class="form-group">
											<button type="submit" class="btn btn-primary btn-lg">{{ t('Submit') }}</button>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('after_scripts')
	<script src="{{ url('assets/js/form-validation.js') }}"></script>
@endsection
@section('after_styles')
    <link href="{{ url('css/app.css') . getPictureVersion() }}" rel="stylesheet">
@endsection

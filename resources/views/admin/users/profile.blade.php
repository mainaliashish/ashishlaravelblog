@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header font-weight-bold">
		Edit your profile
	</div>
	<div class="card-body">

        {!! Form::model($user, ['method'=>'PATCH', 'route' => ['users.profile.update', $user->id], 'files' => true]) !!}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Fullname:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('name',null, ['class' => 'form-control','placeholder'=>'Enter your name'])  !!}
			@if ($errors->has('name'))
			<div class="alert alert-danger error-msg" id="custom-fade-name">
				<strong class="error-msg">{{ $errors->first('name') }}</strong>
			</div>
			@endif
		</div>


		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			{!! Form::label('email', 'Email:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('email',null, ['class' => 'form-control','placeholder'=>'Enter your email'])  !!}
			@if ($errors->has('email'))
			<div class="alert alert-danger error-msg" id="custom-fade-email">
				<strong class="error-msg">{{ $errors->first('email') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
			{!! Form::label('password', 'New Password:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('password','' , ['class' => 'form-control','placeholder'=>'Enter New password'])  !!}
			@if ($errors->has('password'))
			<div class="alert alert-danger error-msg" id="custom-fade-password">
				<strong class="error-msg">{{ $errors->first('password') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
			{!! Form::label('avatar', 'Profile Image:', ['class' => 'font-weight-bold']) !!}
			{!! Form::file('avatar',null, ['class' => 'form-control']) !!}
			@if ($errors->has('avatar'))
			<div class="alert alert-danger error-msg" id="custom-fade-avatar">
				<strong class="error-msg">{{ $errors->first('avatar') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
			{!! Form::label('facebook', 'Facebook Profile:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('facebook', $user -> profile -> facebook , ['class' => 'form-control','placeholder'=>'Enter your facebook'])  !!}
			@if ($errors->has('facebook'))
			<div class="alert alert-danger error-msg" id="custom-fade-facebook">
				<strong class="error-msg">{{ $errors->first('facebook') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
			{!! Form::label('youtube', 'Youtube Profile:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('youtube',$user -> profile -> youtube, ['class' => 'form-control','placeholder'=>'Enter your youtube'])  !!}
			@if ($errors->has('youtube'))
			<div class="alert alert-danger error-msg" id="custom-fade-youtube">
				<strong class="error-msg">{{ $errors->first('youtube') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
			{!! Form::label('about', 'About:', ['class' => 'font-weight-bold']) !!}
				<textarea class="textarea_editor form-control" name="about" rows="8" placeholder="About yourself" >{{ strip_tags($user -> profile -> about) }}
				</textarea>

			@if ($errors->has('about'))
			<div class="alert alert-danger error-msg" id="custom-fade-body">
				<strong class="error-msg">{{ $errors->first('about') }}</strong>
			</div>
			@endif
		</div>


		<div class="form-group">
		{{ Form::submit('Update Profile',['class' => 'btn btn-primary col-md-3 float-right', 'name' => 'submit'])}}
		</div>
	</div>

	{{ Form::close() }}
</div>

</div>
@endsection

@section('footerSection')
  <script type="text/javascript" charset="utf-8">

	$( window ).on( "load", function() {
     	$('#custom-fade-name').delay(800).fadeOut(1500);
     	$('#custom-fade-email').delay(800).fadeOut(1500);
     	$('#custom-fade-password').delay(800).fadeOut(1500);
     	$('#custom-fade-avatar').delay(800).fadeOut(1500);
     	$('#custom-fade-facebook').delay(800).fadeOut(1500);
     	$('#custom-fade-youtube').delay(800).fadeOut(1500);
     	$('#custom-fade-about').delay(800).fadeOut(1500);
    });

	</script>
@endsection
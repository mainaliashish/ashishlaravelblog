@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header font-weight-bold">
		Edit Blog Settings
	</div>
	<div class="card-body">
		{{ Form::open(array('method'=>'POST','route' => 'settings.update', 'files' => true)) }}

		<div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
			{!! Form::label('site_name', 'User:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('site_name',$setting -> site_name, ['class' => 'form-control','placeholder'=>'Enter your site name'])  !!}
			@if ($errors->has('site_name'))
			<div class="alert alert-danger error-msg" id="custom-fade-site_name">
				<strong class="error-msg">{{ $errors->first('site_name') }}</strong>
			</div>
			@endif
		</div>


		<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
			{!! Form::label('address', 'Address:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('address',$setting -> address, ['class' => 'form-control','placeholder'=>'Enter your address'])  !!}
			@if ($errors->has('address'))
			<div class="alert alert-danger error-msg" id="custom-fade-address">
				<strong class="error-msg">{{ $errors->first('address') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
			{!! Form::label('contact_number', 'Contact number:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('contact_number',$setting -> contact_number, ['class' => 'form-control','placeholder'=>'Enter your contact number'])  !!}
			@if ($errors->has('contact_number'))
			<div class="alert alert-danger error-msg" id="custom-fade-contact_number">
				<strong class="error-msg">{{ $errors->first('contact_number') }}</strong>
			</div>
			@endif
		</div>


		<div class="form-group {{ $errors->has('contact_email') ? 'has-error' : '' }}">
			{!! Form::label('contact_email', 'Contact email:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('contact_email',$setting -> contact_email, ['class' => 'form-control','placeholder'=>'Enter your contact email'])  !!}
			@if ($errors->has('contact_email'))
			<div class="alert alert-danger error-msg" id="custom-fade-contact_email">
				<strong class="error-msg">{{ $errors->first('contact_email') }}</strong>
			</div>
			@endif
		</div>
		<div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
			{!! Form::label('about', 'About:', ['class' => 'font-weight-bold']) !!}
				<textarea class="textarea_editor form-control" name="about" id="about" rows="20" placeholder="Enter post about" >{{ $setting->about }}
				</textarea>

			@if ($errors->has('about'))
			<div class="alert alert-danger error-msg" id="custom-fade-body">
				<strong class="error-msg">{{ $errors->first('about') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group">
		{{ Form::submit('Update Setting',['class' => 'btn btn-primary col-md-3 float-right', 'name' => 'submit'])}}
		</div>
	</div>

	{{ Form::close() }}
</div>

</div>
@endsection

@section('headerSection')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
@endsection


@section('footerSection')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

	  <script>
		$(document).ready(function() {
		  $('#about').summernote({
		  	    tabsize: 2,
        		height: 130
		  });
		});
    </script>
  <script type="text/javascript" charset="utf-8">

	$( window ).on( "load", function() {
     	$('#custom-fade-site_name').delay(800).fadeOut(1500);
     	$('#custom-fade-address').delay(800).fadeOut(1500);
     	$('#custom-fade-contact_number').delay(800).fadeOut(1500);
     	$('#custom-fade-contact_email').delay(800).fadeOut(1500);
     	$('#custom-fade-body').delay(800).fadeOut(1500);
    });

	</script>
@endsection
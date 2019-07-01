@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header font-weight-bold">
		Create a New User
	</div>
	<div class="card-body">
		{{ Form::open(array('method'=>'POST','route' => 'users.store', 'files' => true)) }}

		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'User:', ['class' => 'font-weight-bold']) !!}
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

		<div class="form-group">
		{{ Form::submit('Create User',['class' => 'btn btn-primary col-md-3 float-right', 'name' => 'submit'])}}
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
    });

	</script>
@endsection
@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header font-weight-bold">
		Update Category: {{ $category -> name }}
	</div>
	<div class="card-body">
        {!! Form::model($category, ['method'=>'PATCH', 'route' => ['categories.update', $category->slug]]) !!}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			{!! Form::label('Name', 'Name:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('name',null, ['class' => 'form-control','placeholder'=>'Enter category name'])  !!}
			@if ($errors->has('name'))
			<div class="alert alert-danger error-msg" id="custom-fade">
				<strong class="error-msg">{{ $errors->first('name') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group">
		{{ Form::submit('Update Category',['class' => 'btn btn-primary col-md-3 float-right', 'name' => 'submit'])}}
		</div>
	</div>

	{{ Form::close() }}
</div>

</div>
@endsection
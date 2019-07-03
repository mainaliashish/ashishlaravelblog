@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header font-weight-bold">
		Update Tag: {{ $tag -> tag }}
	</div>
	<div class="card-body">
        {!! Form::model($tag, ['method'=>'PATCH', 'route' => ['tags.update', $tag->id]]) !!}
		<div class="form-group {{ $errors->has('tag') ? 'has-error' : '' }}">
			{!! Form::label('tag', 'Tag Name:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('tag',null, ['class' => 'form-control','placeholder'=>'Enter Tag name'])  !!}
			@if ($errors->has('tag'))
			<div class="alert alert-danger error-msg" id="custom-fade">
				<strong class="error-msg">{{ $errors->first('tag') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group">
		{{ Form::submit('Update Tag',['class' => 'btn btn-primary col-md-3 float-right', 'name' => 'submit'])}}
		</div>
	</div>

	{{ Form::close() }}
</div>

</div>
@endsection
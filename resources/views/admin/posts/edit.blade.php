@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header font-weight-bold">
		Update Post
	</div>
	<div class="card-body">
        {!! Form::model($post, ['method'=>'PATCH', 'route' => ['posts.update', $post->id], 'files' => true]) !!}

		<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			{!! Form::label('title', 'Title:', ['class' => 'font-weight-bold']) !!}
			{!! Form::text('title',null, ['class' => 'form-control','placeholder'=>'Enter post title'])  !!}
			@if ($errors->has('title'))
			<div class="alert alert-danger error-msg" id="custom-fade-title">
				<strong class="error-msg">{{ $errors->first('title') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
			{!! Form::label('content', 'Content:', ['class' => 'font-weight-bold']) !!}

				<textarea class="textarea_editor form-control" name="content" rows="12" id="content" placeholder="Enter post content" >
				{!! $post -> content !!}
				</textarea>

			@if ($errors->has('content'))
			<div class="alert alert-danger error-msg" id="custom-fade-body">
				<strong class="error-msg">{{ $errors->first('content') }}</strong>
			</div>
			@endif
		</div>

        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
          {!! Form::label('category_id', 'Category:', ['class' => 'font-weight-bold']) !!}
          @if(isset($categories) && count($categories) > 0)
          {!! Form::select('category_id', [''=>'Choose Options'] + $categories , null, ['class'=>'form-control'])!!}
          @else
          {{ "No Category Found" }}
          @endif
          @if ($errors->has('category_id'))
			<div class="alert alert-danger error-msg" id="custom-fade-category">
				<strong class="error-msg">{{ $errors->first('category_id') }}</strong>
			</div>
          @endif
        </div>

        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
			{!! Form::label('tag', 'Select Tags:', ['class' => 'font-weight-bold']) !!}
          @if(isset($tags) && count($tags) > 0)
          @foreach ($tags as $tag)
          <div class="checkbox">
          	<label for="tag">
				<input type="checkbox" name="tags[]" value="{{ $tag -> id }}"
			 	 @foreach($post -> tags as $t)
			 		@if($tag -> id == $t -> id)
			 		checked
			 		@endif
			 	 @endforeach
				>
			  {{ $tag->tag }} </label>
         </div>
          @endforeach
          @else
          {{ "No Tags Found" }}
          @endif
          @if ($errors->has('tags'))
			<div class="alert alert-danger error-msg" id="custom-fade-tag">
				<strong class="error-msg">{{ $errors->first('tags') }}</strong>
			</div>
          @endif
        </div>

		<div class="form-group {{ $errors->has('featured') ? 'has-error' : '' }}">
			{!! Form::label('featured', 'Featured Image:', ['class' => 'font-weight-bold']) !!}
			{!! Form::file('featured',null, ['class' => 'form-control']) !!}
			@if ($errors->has('featured'))
			<div class="alert alert-danger error-msg" id="custom-fade-image">
				<strong class="error-msg">{{ $errors->first('featured') }}</strong>
			</div>
			@endif
		</div>

		<div class="form-group">
		{{ Form::submit('Update Post',['class' => 'btn btn-primary col-md-3 float-right', 'name' => 'submit'])}}
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
		  $('#content').summernote({
		  	    tabsize: 2,
        		height: 130
		  });
		});
    </script>
  <script type="text/javascript" charset="utf-8">

	$( window ).on( "load", function() {
     	$('#custom-fade-title').delay(800).fadeOut(1500);
     	$('#custom-fade-body').delay(800).fadeOut(1500);
     	$('#custom-fade-image').delay(800).fadeOut(1500);
     	$('#custom-fade-category').delay(800).fadeOut(1500);
    });

	</script>
@endsection
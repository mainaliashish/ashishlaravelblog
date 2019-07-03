@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard <  {{ Auth::user() -> name }} </div>

</div>
    <br>

  <div class="row">
  <div class="col-sm-3">
    <div class="card">
  	  <div class="card-header text-white bg-success font-weight-bold">Posts</div>
      <div class="card-body">
         <a href="{{ route('posts') }}"> <p class="card-text text-center font-weight-bold">{{ $posts_count }}</p></a>
      </div>
    </div>
  </div>

   <div class="col-sm-3">
    <div class="card">
  	  <div class="card-header text-white bg-dark font-weight-bold">Users</div>
      <div class="card-body">
        <a href="{{ route('users') }}"> <p class="card-text text-center font-weight-bold">{{ $users_count }}</p> </a>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="card">
  	  <div class="card-header text-white bg-danger font-weight-bold">Trashed Post</div>
      <div class="card-body">
        <a href="{{ route('posts.trashed') }}"> <p class="card-text text-center font-weight-bold">{{ $trashed_count }}</p></a>
      </div>
    </div>
  </div>

    <div class="col-sm-3">
    <div class="card">
  	  <div class="card-header text-white bg-info font-weight-bold">Category</div>
      <div class="card-body">
      <a href="{{ route('categories') }}"> <p class="card-text text-center font-weight-bold">{{ $categories_count }}</p> </a>
      </div>
    </div>
  </div>
</div>

@endsection

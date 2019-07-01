@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
       <strong> Welcome {{ Auth::user() -> name }} ! You are logged in!</strong>
    </div>
</div>


@endsection

@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header font-weight-bold">
		Posts
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>S/n</th>
				<th>Title</th>
				<th>Image</th>
				<th>Editing</th>
				<th>Trashing</th>
			</thead>
			<tbody>
				@if($posts -> count() > 0)
				@foreach ($posts as $post)
					<tr>
					<td>{{ $loop -> iteration }}</td>
					<td>{{ $post -> title }}</td>
              		<td><img height="50" width="90" src="{{ $post -> featured ? $post -> featured  : 'https://via.placeholder.com/400' }}" alt=""></td>
					<td><a href="{{ route('posts.edit', ['slug' => $post -> slug]) }}" class="btn btn-sm btn-info">Edit</a></td>
					<td><a href="{{ route('posts.delete', ['id' => $post -> id]) }}" class="btn btn-sm btn-warning">Trash</a></td>
					</tr>
				@endforeach
				@else
				<tr>
					<th colspan="5" class="text-center">No Post(s) Created</th>
				</tr>
				@endif
			</tbody>
		</table>

	</div>
</div>

@endsection

@section('footerSection')

@endsection
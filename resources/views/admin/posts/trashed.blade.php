@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header font-weight-bold">
		Trashed Posts
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>S/n</th>
				<th>Title</th>
				<th>Image</th>
				<th>Restore</th>
				<th>Destroy</th>
			</thead>
			<tbody>
				@if($posts -> count() > 0)
				@foreach ($posts as $post)
					<tr>
					<td>{{ $loop -> iteration }}</td>
					<td>{{ $post -> title }}</td>
              		<td><img height="50" width="90" src="{{ $post -> featured ? $post -> featured  : 'https://via.placeholder.com/400' }}" alt=""></td>
					<td><a href="{{ route('posts.restore', ['id' => $post -> id]) }}" class="btn btn-success">Restore</a></td>
					<td><a href="{{ route('posts.kill', ['id' => $post -> id]) }}" class="btn btn-xs btn-danger">Destroy</a></td>
					</tr>
				@endforeach
				@else
				<tr>
					<th colspan="5" class="text-center">No Trashed Post(s)</th>
				</tr>
				@endif
			</tbody>
		</table>

	</div>
</div>

@endsection

@section('footerSection')

@endsection
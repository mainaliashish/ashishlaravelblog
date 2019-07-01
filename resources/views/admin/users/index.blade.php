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
				<th>Name</th>
				<th>Image</th>
				<th>Permission</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@if($users -> count() > 0)
				@foreach ($users as $user)
					<tr>
					<td>{{ $loop -> iteration }}</td>
					<td>{{ $user -> name }}</td>
              		<td>Image</td>
					<td>Permission</td>
					<td><a href="{{ route('users.delete', ['id' => $user  -> id]) }}" class="btn btn-warning">Trash</a></td>
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
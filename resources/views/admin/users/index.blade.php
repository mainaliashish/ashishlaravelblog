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

              		<td> <img src="{{ asset($user -> profile -> avatar) ? asset($user -> profile -> avatar) : 'https://via.placeholder.com/400' }}" alt="" height="60" width="70" style="border-radius: 50%">  </td>
					<td>
						@if($user->admin)
							   <a href="{{ route('users.not.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove Permission</a>
						@else
							   <a href="{{ route('users.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
						@endif
					</td>
					<td>
						@if(Auth::id() !== $user->id)
						<a href="{{ route('users.delete', ['id' => $user  -> id]) }}" class="btn btn-sm btn-info">Delete</a>
						@endif
					</td>
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
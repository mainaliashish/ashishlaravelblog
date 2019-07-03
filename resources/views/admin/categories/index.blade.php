@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header font-weight-bold">
		Categories
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>Index</th>
				<th>Category name</th>
				<th>Editing</th>
				<th>Deleting</th>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr>
					<td>{{ $loop -> iteration }}</td>
					<td>{{ $category -> name }}</td>
					<td><a href="{{ route('categories.edit', ['slug' => $category -> slug]) }}" class="btn btn-sm btn-info">Edit</a></td>
					<td><a href="{{ route('categories.delete', ['id' => $category -> id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>

@endsection

@section('footerSection')

@endsection
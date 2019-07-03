@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header font-weight-bold">
		Tags
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<th>Index</th>
				<th>Tag name</th>
				<th>Editing</th>
				<th>Deleting</th>
			</thead>
			<tbody>
				@if($tags -> count() > 0)
				@foreach ($tags as $tag)
					<tr>
					<td>{{ $loop -> iteration }}</td>
					<td>{{ $tag -> tag }}</td>
					<td><a href="{{ route('tags.edit', ['slug' => $tag -> id]) }}" class="btn btn-sm btn-info">Edit</a></td>
					<td><a href="{{ route('tags.delete', ['id' => $tag -> id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
					</tr>
				@endforeach
				@else
				<tr>
					<th colspan="5" class="text-center">No Tags Found</th>
				</tr>
				@endif
			</tbody>
		</table>

	</div>
</div>

@endsection

@section('footerSection')

@endsection
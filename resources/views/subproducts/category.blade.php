@extends('layouts.app')

@section('main')
	<div class="container">
		<div class="text-right">
			<a href="/subproducts/create" class="btn btn-info mt-2" role="button">New Sub-Product</a>
		</div>
	</div>
	<div class="container">
		<h1>New Sub Product</h1>

		<div class="container">
		<table class="table table-hover mt-2">
		    <thead>
				<tr>
					<th>Sr.</th>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
		    </thead>
		    <tbody>
		    	@foreach($subproducts as $subproduct)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $subproduct->name }}</td>
						<td>{{ $subproduct->description }}</td>
						
						<td>
							<a href="/subproducts/{{ $subproduct->id }}/edit" class="btn btn-dark btn-sm" role="button">Edit</a>
							<form method="POST" class="d-inline" action="/subproducts/{{ $subproduct->id }}/delete">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
		    </tbody>
		  </table>

	</div>
	</div>
@endsection
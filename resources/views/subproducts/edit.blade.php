@extends('layouts.app')

@section('main')
	<div class="container">
		<h1>Edit Sub-Products</h1>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-8">
				<div class="card mt-3 p-3">
					  <h3>Sub-Product Edit {{ $subproduct->name }}</h3>
					  <form action="/subproducts/{{ $subproduct->id }}/update" method="POST">
					  	@csrf
					  	@method('PUT')
					    <div class="form-group">
					      <label>Name</label>
					      <input type="text" class="form-control" name="name" value="{{ old('name', $subproduct->name) }}">
							@if($errors->has('name'))
								<span class="text-danger">{{ $errors->first('name') }}</span>
							@endif
					    </div>
					    <div class="form-group">
					      <label>Description</label>
					      <textarea class="form-control" rows="4" name="description">{{ old('description', $subproduct->description) }}</textarea>
							@if($errors->has('description'))
								<span class="text-danger">{{ $errors->first('description') }}</span>
							@endif
					    </div>
					    <button type="submit" class="btn btn-primary">Submit</button>
					  </form>
				</div>
			</div>
		</div>
	
	</div>
@endsection
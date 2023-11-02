<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel CRUD</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light">

	  <!-- Links -->
	  <ul class="navbar-nav">
	    <li class="nav-item">
	      <a class="nav-link" href="/">Products</a>
	    </li>
	  </ul>

	</nav>

	<div class="container">
		<div class="text-right">
			<a href="products/create" class="btn btn-info mt-2" role="button">New Product</a>
		</div>
	</div>
	<div class="container">
		<table class="table table-hover mt-2">
		    <thead>
				<tr>
					<th>Sr.</th>
					<th>Name</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
		    </thead>
		    <tbody>
		    	@foreach($products as $product)
					<tr>
						<td>{{ $loop->index + 1 }}</td>
						<td>{{ $product->name }}</td>
						<td>
							<img src="products/{{ $product->image }}" class="rounded-circle" width="30px" height="30px" />
						</td>
						<td>Edit</td>
					</tr>
				@endforeach
		    </tbody>
		  </table>
	</div>
</body>
</html>
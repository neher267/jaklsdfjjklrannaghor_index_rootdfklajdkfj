@extends('layouts.master')

@section('content')

<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms">
				<div class="col-md-12">
					<a href="{{route('products.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				<div class="form-body">
					<form action="{{route('products.update', $product)}}" method="POST">
					{{ csrf_field() }}
					{{ method_field('PUT') }}					

						<div class="form-group"> 
							<label for="name">Product Name</label> 
							<input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" required> 
						</div>	

						<div class="form-group"> 
							<label for="price">Product Price</label> 
							<input type="number" name="price" class="form-control" id="price" required value="{{$product->price}}"> 
						</div>

						<div class="form-group">
							<label for="category_id">Product Category</label>
							<select name="category_id" id="category_id" class="form-control" required>
								<option value="">Select</option>
								@foreach($categories as $category)
								<option value="{{$category->id}}" {{$category->id == $product->category_id ? "selected":""}}>{{$category->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="unit">Measurement Unit</label>
							<select name="unit" id="unit" class="form-control" required>
								<option value="">Select</option>
								@foreach(config('settings.unites') as $unit)
								<option value="{{$unit}}" {{$unit == $product->unit ? "selected":""}}>{{$unit}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group"> 
							<label for="description">Product Discription</label>
							<textarea name="description" id="description" cols="50" rows="4" class="form-control">{{$product->description}}</textarea>			
						</div>

						<div class="form-group"> 
							<label for="informations">Product Informations</label>
							<textarea name="informations" id="informations" cols="50" rows="4" class="form-control">{{$product->informations}}</textarea>			
						</div>				

						<button type="submit" class="btn btn-default">Update</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace('description', {
	    language: 'en',
	});
	CKEDITOR.replace('informations', {
	    language: 'en',
	});
</script>
@endsection
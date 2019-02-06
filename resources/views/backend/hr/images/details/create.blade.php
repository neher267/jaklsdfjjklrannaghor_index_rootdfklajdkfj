@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{route('images.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				
				<div class="form-body">
					<form action="{{route('image.details.store', $image)}}" method="post">
					{{ csrf_field() }}

						<div class="form-group"> 
							<label for="product_slug">Link a Product</label> 
							<select name="product_slug" id="product_slug" class="form-control">
								<option value="">Select</option>
								@foreach($products as $product)
								<option value="{{$product->slug}}">{{$product->name}}</option>
								@endforeach
							</select>
						</div>	

						<div class="form-group"> 
							<label for="title">Title</label> 
							<input type="text" name="title" class="form-control" id="title" placeholder="Ex: This is for you mom!" required> 
						</div>	

						<div class="form-group"> 
							<label for="body">Discription</label>
							<textarea name="body" id="body" cols="50" rows="4" class="form-control"></textarea>			
						</div>											

						<button type="submit" class="btn btn-success">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
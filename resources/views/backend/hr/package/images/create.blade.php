@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				
				<div class="col-md-12">
					<a href="{{route('product.package.images.index',[$product_id, $package])}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
					<div>
						@foreach($images as $image)
							<img src="{{asset('public/'.$image->src)}}" title="{{$image->type}}" style="height: 80px; box-shadow: 2px 4px 5px darkgrey; margin: 5px;">		
						@endforeach
					</div>
					<hr>
				</div>
				
				<div class="form-body">
					<form action="{{route('product.package.images.store',[$product_id, $package])}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}					

						<div class="form-group"> 
							<label for="type">Used For</label> 
							<select name="type" id="type_id" class="form-control" required>
								<option value="">Select</option>
								@foreach(config('settings.imgae-for') as $type)
								<option value="{{$type}}">{{$type}}</option>
								@endforeach
							</select>
						</div>	

						<div class="form-group"> 
							<label for="src">Upload Image</label>
							<input type="file" name="src" class="form-control" required>			
						</div>						

						<button type="submit" class="btn btn-success">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
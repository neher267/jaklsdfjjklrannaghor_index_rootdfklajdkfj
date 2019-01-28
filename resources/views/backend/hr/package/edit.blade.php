@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{route('product.packages', $product)}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				
				<div class="form-body">
					<form action="{{route('product.packages.update', [$product, $package])}}" method="post">
					{{ csrf_field() }}
					{{ method_field("PUT") }}

						<div class="form-group"> 
							<label for="title">Package Title</label> 
							<input type="text" name="title" class="form-control" id="title" value="{{$package->title}}" required> 
						</div>	

						<div class="form-group"> 
							<label for="description">Package Discription</label>
							<textarea name="description" id="description" cols="50" rows="4" class="form-control">{{$package->description}}</textarea>			
						</div>						

						<button type="submit" class="btn btn-default">Update</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	CKEDITOR.replace( 'description', {
    language: 'en',
});
</script>

@endsection
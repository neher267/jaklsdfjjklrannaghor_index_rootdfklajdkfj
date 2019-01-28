@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				
				<div class="col-md-12">
					<a href="{{route('category.images.index', $category_id)}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				
				<div class="form-body">
					<form action="{{route('category.images.update',[$category_id, $image])}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}		
					{{ method_field('PUT') }}					

						<div class="form-group">
							<label>Previous Image</label>
							<hr>
							<img src="{{asset($image->src)}}" style="height: 70px">	
							<input type="hidden" name="avatar" value="{{$image->src}}">
							<hr>						
						</div>

						<div class="form-group"> 
							<label for="src">Change Image</label>
							<input type="file" name="src" class="form-control">			
						</div>						

						<button type="submit" class="btn btn-warning" onclick="return alertUser('update it?')">Update</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
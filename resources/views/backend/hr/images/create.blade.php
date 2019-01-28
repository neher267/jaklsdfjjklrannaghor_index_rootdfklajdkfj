@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				
				<div class="col-md-12">
					<a href="{{route('images.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					@include('common.errors')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>					
				</div>
				
				<div class="form-body">
					<form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}					

						<div class="form-group"> 
							<label for="type_id">Used For</label> 
							<select name="type" id="type_id" class="form-control" required>
								<option value="">Select</option>
								<option value="banner">Banner</option>
								<option value="main-slider">Main Slider</option>
								<option value="logo">Logo</option>
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
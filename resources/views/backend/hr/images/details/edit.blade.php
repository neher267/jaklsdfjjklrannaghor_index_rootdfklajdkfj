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
					<form action="{{route('image.details.update', $image)}}" method="post">
					{{ csrf_field() }}
					{{ method_field("PUT") }}

						<div class="form-group"> 
							<label for="title">Title</label> 
							<input type="text" name="title" class="form-control" id="title" value="{{$image->image_details->title}}" required> 
						</div>	

						<div class="form-group"> 
							<label for="body">Discription</label>
							<textarea name="body" id="description" cols="50" rows="4" class="form-control">{{$image->image_details->body}}</textarea>			
						</div>						

						<button type="submit" class="btn btn-default">Update</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
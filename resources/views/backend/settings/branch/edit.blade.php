@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{route('branches.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				<div class="form-body">
					<form action="{{route('branches.update', $branch)}}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

						<div class="form-group"> 
							<label for="name">Branch Name</label> 
							<input type="text" name="name" class="form-control" id="name" value="{{$branch->name}}" required> 
						</div>						

						<div class="form-group">
							<label for="selector1">Area</label>
							<select name="area_id" id="selector1" class="form-control" required>
								<option value="">Select</option>
								@foreach($areas as $area)
								<option value="{{$area->id}}" {{$area->id == $branch->area_id ? "selected":""}}>{{$area->name}}</option>
								@endforeach
							</select>
						</div>	

						<button type="submit" class="btn btn-default">Update</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
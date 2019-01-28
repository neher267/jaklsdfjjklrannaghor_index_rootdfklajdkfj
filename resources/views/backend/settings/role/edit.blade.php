@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{route('roles.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>

				<div class="form-body">
					<form action="{{route('roles.update', $role)}}" method="post">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

						<div class="form-group"> 
							<label for="name">Role Name</label> 
							<input type="text" name="name" class="form-control" id="name" value="{{$role->name}}" required> 
						</div>	

						<div class="form-group"> 
							<label for="weight">Weight</label> 
							<input type="number" name="weight" class="form-control" id="weight" value="{{$role->weight}}" required> 
						</div>						

						<button type="submit" class="btn btn-success">Update</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

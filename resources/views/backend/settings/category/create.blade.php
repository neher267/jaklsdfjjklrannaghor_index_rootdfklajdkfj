@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{route('categories.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="form-body">
					<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Category Name</label> 
							<input type="text" name="name" class="form-control" id="name" required> 
						</div>
						
						<div class="form-group">
							<label for="department_id">Department Name</label>
							<select name="department_id" id="department_id" class="form-control" required>
								<option>Select</option>
								@foreach($departments as $department)
								<option value="{{$department->id}}">{{$department->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group"> 
							<label for="src">Thumbnail Image</label>
							<input type="file" name="src" class="form-control" required>			
						</div>			

						<button type="submit" class="btn btn-default">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
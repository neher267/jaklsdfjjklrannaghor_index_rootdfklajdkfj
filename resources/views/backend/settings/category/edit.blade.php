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
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				<div class="form-body">
					<form action="{{route('categories.update', $category)}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

						<div class="form-group"> 
							<label for="name">Category Name</label> 
							<input type="text" name="name" class="form-control" id="name" required value="{{$category->name}}"> 
						</div>
						
						<div class="form-group">
							<label for="department_id">Department Name</label>
							<select name="department_id" id="department_id" class="form-control" required>
								<option>Select</option>
								@foreach($departments as $department)
								<option value="{{$department->id}}"{{$department->id == $category->department_id ? "selected":""}}>{{$department->name}}</option>
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
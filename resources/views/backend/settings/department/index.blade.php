@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('departments.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add Department</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th>Name</th>
								<th>Branch</th>
								<th>Total Categories</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
							@foreach($departments as $department)
							<tr>
								<td>{{$department->name}}</td>
								<td>
									<?php
									echo $department->branch_id == null ? 'All Branches' : $department->branch()->first()->name;
									?>
								</td>
								<td>{{$department->categories()->get()->count()}}</td>
								<td>
									<a href="{{route('departments.edit', $department)}}" class="btn btn-default">Edit</a>
									<a href="{{route('department.categories', $department)}}" class="btn btn-default">Categories</a>

									<form action="{{route('departments.destroy', $department)}}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger" onclick="return alertUser('delete it?')">Delete</button>
									</form>
								</td>
						    </tr>
							@endforeach
						</tbody>
		            </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
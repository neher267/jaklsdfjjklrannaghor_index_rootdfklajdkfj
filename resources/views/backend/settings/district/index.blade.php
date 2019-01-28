
@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('districts.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add District</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th>Name</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
							@foreach($districts as $district)
							<tr>
								<td>{{$district->name}}</td>
								<td>
									<a href="{{route('districts.edit', $district)}}" class="btn btn-default">Edit</a>
									<a href="{{route('district.areas', $district)}}" class="btn btn-default">Areas</a>
									<form action="{{route('districts.destroy', $district)}}" method="POST" style="display: inline;">
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
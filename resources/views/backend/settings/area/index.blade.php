
@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('districts.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					<a href="{{route('areas.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add Area</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th>Name</th>
								<th>District</th>
								<th>Total Branches</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
							@foreach($areas as $area)
							<tr>
								<td>{{$area->name}}</td>
								<td>{{$area->district()->first()->name}}</td>
								<td>{{$area->branches()->count()}}</td>
								<td>
									<a href="{{route('areas.edit', $area)}}" class="btn btn-default">Edit</a>
									<a href="{{route('area.branches', $area)}}" class="btn btn-default">Branches</a>
									<form action="{{route('areas.destroy', $area)}}" method="POST" style="display: inline;">
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
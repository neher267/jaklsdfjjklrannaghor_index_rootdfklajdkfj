@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">			
			<div class="row">
				<div class="col-md-12">	
					<a href="{{route('roles.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>				
					<a href="#" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add User</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>

				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th style="width: 20px">No</th>
								<th>Name</th>
								<th>user</th>
								<th>Mobile</th>
								<th>Points</th>
								<th>Branch</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($users as $user)
							<tr>
								<td>{{++$i}}</td>								
								<td>{{$user->name}}</td>
								<td>{{$role->name}}</td>
								<td>{{$user->mobile}}</td>
								<td>{{$user->points}}</td>								
								<td></td>								
								<td>
									<a href="#" class="btn btn-default">View</a>									
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
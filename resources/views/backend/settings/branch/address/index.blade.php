@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">				
				<div class="col-md-12">
					<a href="{{route('branches.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>New Branch</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th style="width: 42px">Sr.No</th>
								<th>Name</th>
								<th>Area</th>
								<th>Address</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
							<?php $i=0 ?>
							@foreach($branches as $branch)
							<tr>
								<td>{{++$i}}</td>
								<td>{{$branch->name}}</td>
								<td>{{$branch->area()->first()->name}}</td>
								<td>
									<?php
									if(!empty($branch->address_id))
									{
										$address = $branch->address()->first();
										echo $address->house_no != null ? 'House No: '.$address->house_no.', ': '';
										echo $address->house_name != null ? $address->house_name.', ' : '';
										echo $address->floor != null ? '(' .$address->floor .')': '';
										echo $address->road_no != null ? ', Road No: '.$address->road_no: '';
										echo $address->block != null ? ', Block: '.$address->block.', ': '';
										echo $branch->area()->first()->name;
									}
									
								?>
								</td>
								<td>
									<a href="{{route('branches.edit', $branch)}}" class="btn btn-default" style="margin-top: 3px">Edit Area</a>
									@if(!empty($branch->address_id))									
									<a href="{{route('branches.edit', $branch->address->first())}}" class="btn btn-default" style="margin-top: 3px">Edit Address</a>
									@endif 
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
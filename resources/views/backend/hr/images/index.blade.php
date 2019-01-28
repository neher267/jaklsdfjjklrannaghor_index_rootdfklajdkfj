@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('images.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add New Image</a>

					<a href="{{route('type.images','main-slider')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Main Slider</a>	


					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>

				<div class="col-md-12" style="overflow: auto;">
					<table class="table table-striped table-bordered datatable" cellspacing="0"	>
						<thead>
		            		<tr>
								<th style="width: 55px;">No</th>
								<th>Image</th>
								<th>Used For</th>
								<th>Status</th>
								<th>Actions</th>
		            		</tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($images as $image)
							<tr>
								<td>{{++$i}}</td>
								<td>
									<img src="{{asset($image->src)}}" style="height: 50px; widows: 40px">
								</td>
								<td style="text-transform: capitalize;">{{$image->type}}</td>
								
								<td>
									@if($image->status)
										<span>Active</span>
									@else
										<span>Disable</span>									
									@endif									
								</td>						
								

								<td>	
									@if($image->image_details)
										<a href="{{route('image.details.show', $image)}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Details</a>	
										<a href="{{route('image.details.edit', $image)}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Details</a>								
									@else
										<a href="{{route('image.details.create', $image)}}" class="btn btn-xs btn-info"><i class="fa fa-plus"></i> Details</a>
									@endif	

									@if($image->status)
										<form action="{{route('images.update',[$image])}}" method="POST" style="display: inline;">
											{{ csrf_field() }}
											{{ method_field('PUT') }}
											<input type="hidden" name="status" value="0">
											<button type="submit" class="btn btn-xs btn-danger" onclick="return alertUser('disable it?')">
												<i class="fas fa-thumbs-down"></i>
											</button>
										</form>
									@else
										<form action="{{route('images.update',[$image])}}" method="POST" style="display: inline;">
											{{ csrf_field() }}
											{{ method_field('PUT') }}
											<input type="hidden" name="status" value="1">
											<button type="submit" class="btn btn-xs btn-success" onclick="return alertUser('active it?')">
												<i class="fas fa-thumbs-up"></i>
											</button>
										</form>
									@endif
									
									<form action="{{route('images.destroy',[$image])}}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<input type="hidden" name="avatar" value="{{$image->src}}">
										<button type="submit" class="btn btn-xs btn-danger" onclick="return alertUser('delete it?')">Delete</button>
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
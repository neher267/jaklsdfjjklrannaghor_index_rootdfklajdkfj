@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('gifts.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					<a href="{{route('gift.images.create', $gift)}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add New Image</a>		
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
									<img src="{{asset('public/'.$image->src)}}" style="height: 50px; widows: 40px">
								</td>
								<td style="text-transform: capitalize;">{{$image->type}}</td>
								<td>
									@if($image->type == "Thumbnail")
										@if($gift->thumbnail == $image->src)
											<span>Active</span>
										@else
											<span>Disable</span>									
										@endif
									@else
										@if($image->status)
											<span>Active</span>
										@else
											<span>Disable</span>									
										@endif
									@endif
								</td>
								
								<td>
									@if($image->type == "Thumbnail")
										@if($gift->thumbnail == $image->src)
											<form action="{{route('gift.images.update',[$gift, $image])}}" method="POST" style="display: inline;">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<input type="hidden" name="src" value="">
												<button type="submit" class="btn btn-danger" onclick="return alertUser('desable it?')">
													<i class="fas fa-thumbs-down"></i>
												</button>
											</form>
										@else
											<form action="{{route('gift.images.update',[$gift, $image])}}" method="POST" style="display: inline;">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<input type="hidden" name="src" value="{{$image->src}}">
												<button type="submit" class="btn btn-success" onclick="return alertUser('active it?')">
													<i class="fas fa-thumbs-up"></i>
												</button>
											</form>
										@endif
									@else
										@if($image->status)
											<form action="{{route('gift.images.update',[$gift, $image])}}" method="POST" style="display: inline;">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<input type="hidden" name="status" value="false">
												<button type="submit" class="btn btn-danger" onclick="return alertUser('disable it?')">
													<i class="fas fa-thumbs-down"></i>
												</button>
											</form>
										@else
											<form action="{{route('gift.images.update',[$gift, $image])}}" method="POST" style="display: inline;">
												{{ csrf_field() }}
												{{ method_field('PUT') }}
												<input type="hidden" name="status" value="true">
												<button type="submit" class="btn btn-success" onclick="return alertUser('active it?')">
													<i class="fas fa-thumbs-up"></i>
												</button>
											</form>
										@endif
									@endif

									<form action="{{route('gift.images.destroy',[$gift, $image])}}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<input type="hidden" name="avatar" value="{{$image->src}}">
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
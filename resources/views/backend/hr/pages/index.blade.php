@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">			
			<div class="row">
				<div class="col-md-12">	
					<a href="{{route('pages.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>New Page</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$page_title}}</p>
					<hr>
				</div>

				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th style="width: 20px">No</th>
								<th>Name</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($pages as $page)
							<tr>
								<td>{{++$i}}</td>
								<td>{{$page->name}}</td>
								<td>
									<a href="{{route('pages.edit', $page)}}" class="btn btn-default">Edit</a>

									<form action="{{route('pages.destroy', $page)}}" method="POST" style="display: inline;">
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
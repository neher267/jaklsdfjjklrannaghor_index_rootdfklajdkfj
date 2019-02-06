@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">		
					<a href="{{route('departments.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>			
					<a href="{{route('categories.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>New Category</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th style="width: 20px">No</th>
								<th>Image</th>
								<th>Name</th>
								<th>Department</th>
								<th>Branch</th>
								<th>Products</th>								
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($categories as $category)
							<tr>
								<td>{{++$i}}</td>
								<td>
									<img src="{{asset('public/'.$category->thumbnail)}}" style="width: 80px; box-shadow: 2px 4px 5px darkgrey; margin: 3px;">
								</td>
								<td>{{$category->name}}</td>
								<td>{{$category->department()->first()->name}}</td>
								<td>
									<?php
									echo $category->branch_id == null ? 'All Branches' : $category->branch()->first()->name;
									?>
								</td>
								<td>{{$category->products()->count()}}</td>								
								<td>
									<a href="{{route('categories.edit', $category)}}" class="btn btn-default">Edit</a>

									<a href="{{route('category.images.index', $category)}}" class="btn btn-default">Images</a>
									<a href="{{route('category.products', $category)}}" class="btn btn-default">Products</a>

									<form action="{{route('categories.destroy', $category)}}" method="POST" style="display: inline;">
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
@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">			
			<div class="row">
				<div class="col-md-12">	
					<a href="{{route('categories.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>				
					<a href="{{route('products.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>New Product</a>
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
								<th>Image</th>
								<th>Name</th>
								<th>Category</th>
								<th>Unit</th>
								<th>Price</th>
								<th>Packages</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($products as $product)
							<tr>
								<td>{{++$i}}</td>
								<td>
									<img src="{{asset('public/'.$product->thumbnail)}}" style="height: 50px; box-shadow: 2px 4px 5px darkgrey; margin: 3px;">
								</td>
								<td>{{$product->name}}</td>
								<td>{{$product->category()->first()->name}}</td>
								<td>{{$product->unit}}</td>								
								<td>{{$product->price}}</td>
								<td>{{$product->packages()->count()}}</td>
								<td>
									<a href="{{route('products.edit', $product)}}" class="btn btn-default">Edit</a>

									<a href="{{route('product.images.index', $product)}}" class="btn btn-default">Images</a>

									<form action="{{route('products.destroy', $product)}}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger" onclick="return alertUser('delete it?')">Delete</button>
									</form>

									<a href="{{route('product.packages', $product)}}" class="btn btn-default">Packages</a>
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
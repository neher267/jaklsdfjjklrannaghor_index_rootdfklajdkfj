@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">
					<a href="{{route('products.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>					
					<a href="{{route('product.packages.create', $product)}}" class="btn btn-default">
					<i class="fas fa-plus-circle green-btn"></i>Add New Package</a>
					@include('common.flash-message')
					<hr>
					<p style="text-align: center; font-size: 22px;">{{$title}}</p>
					<hr>
				</div>

				<div class="col-md-12" style="overflow: auto;">
					<table class="table table-striped table-bordered datatable" cellspacing="0"	>
						<thead>
		            		<tr>
								<th style="width: 20px">No</th>
								<th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Actions</th>
		            		</tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($packages as $package)
							<tr>
								<td>{{++$i}}</td>
								<td>
									<img src="{{asset('public/'.$package->thumbnail)}}" style="height: 50px; box-shadow: 2px 4px 5px darkgrey; margin: 3px;">
								</td>
								<td>{{$package->title}}</td>
								<td>
									<?php 
                                    $text = $package->description;
                                    if (str_word_count($text, 0) > 50) {
                                        $words = str_word_count($text, 2);
                                        $pos = array_keys($words);
                                        $text = substr($text, 0, $pos[50]) . '...';
                                    }
                                    echo $text;
                                	?>
								</td>
								<td>
									@if($package->status == true)
									<span>Active</span>
									@else
									<span>Disable</span>									
									@endif
								</td>
								
								<td>
									<a href="{{route('product.packages.edit',[$product, $package])}}" class="btn btn-default">Edit</a>

									<form action="{{route('product.packages.destroy', [$product, $package])}}" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger" onclick="return alertUser('delete it?')">Delete</button>
									</form>

									<a href="{{route('product.package.images.index',[$product, $package])}}" class="btn btn-default">Images</a>									
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
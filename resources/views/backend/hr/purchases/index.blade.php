@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">					
					<a href="{{route('purchases.create')}}" class="btn btn-default">Enter Purchases Record</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
						    <tr>
								<th>No</th>
								<th>Product</th>
								<th>Buyer Name</th>
								<th>Branch</th>
								<th>Merchant</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Date</th>
								<th>Actions</th>
						    </tr>
						</thead>
						<tbody>
						<?php $i =0; ?>
						@foreach($purchases as $purchase)
							<tr>
								<td>{{++$i}}</td>
								<td>{{$purchase->product->name}}</td>
								<td>{{$purchase->buyer->name}}</td>							
								<td>{{$purchase->branch->name}}</td>
								<td>{{$purchase->merchant->name}}</td>							
								<td>{{$purchase->quantity}} {{$purchase->product->unit}}</td>							
								<td>{{$purchase->price}}</td>
								<td>{{$purchase->created_at->format('d M, Y')}}</td>							
								<td>
									<a href="{{route('categories.edit', $purchase)}}" class="btn btn-default">Edit</a>
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
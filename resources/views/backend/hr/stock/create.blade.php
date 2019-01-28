@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="row">
		<div class="col-md-12">
			<a href="{{url('')}}" class="btn btn-default">back</a>			
			<a href="{{route('stock.index')}}" class="btn btn-default">Stock Products</a>					
			<a href="{{route('products.index')}}" class="btn btn-default">Products</a>
			<a href="{{route('mix-packages.index')}}" class="btn btn-default">Mix Packages</a>
			<hr>
		</div>

	</div>
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class=" form-grids form-grids-right">
				<div class="widget-shadow " data-example-id="basic-forms"> 
					<div class="col-md-12"  style="text-align: center;">
						<strong>Manage Stock</strong>
						@include('common.flash-message')
					</div>
					<div class="form-body">
						<table class="table table-striped table-bordered datatable"  cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>No</td>
									<td>Product Name</td>
									<td>Purchase Quantity</td>
									<td>Buyer Name</td>
									<td>Date</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php $i=0; ?>
								@foreach($purchases as $purchase)	
								<tr>
									<td>{{++$i}}</td>
									<td>{{$purchase->product->name}}</td>
									<td>{{$purchase->quantity}} {{$purchase->product->unit}}</td>
									<td>{{$purchase->buyer->name}}</td>
									<td>{{$purchase->created_at->format('d M, Y')}}</td>	
									<td>
										<form class="form-inline" action="{{route('stock.store')}}" method="post">
										{{ csrf_field() }}
										  <div class="form-group">
										    <input name="deposit" type="number" class="form-control">
										    <input type="hidden" name="product_id" value="{{$purchase->product->id}}">
										    <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
										  </div>
										  <input type="submit" class="btn btn-default" value="Deposit">
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
</div>
@endsection
@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				
				<div class="col-md-12">
					<a href="{{url('')}}" class="btn btn-default">back</a>			
					<a href="{{route('stock.create')}}" class="btn btn-default">Manage Stock</a>					
					<a href="{{route('products.index')}}" class="btn btn-default">Products</a>
					<hr>
				</div>
				<div class="col-md-12"  style="text-align: center;">
					<strong>Stock Products</strong>
					@include('common.flash-message')
				</div>
				<div class="col-md-12 table-responsive">
					<table class="table table-striped table-bordered datatable"  cellspacing="0" width="100%">
							<thead>
								<tr>
									<td>Name</td>
									<td>Deposit</td>
									<td>Withdrow</td>
									<td>Balance</td>
									<td>Trets</td>
									<td>Actions</td>
								</tr>
							</thead>
							<tbody>
								@foreach($s_products as $s_product)	
								<tr>
									<td>{{$s_product->product->name}}</td>
									<td>{{$s_product->deposit}}</td>		
									<td>{{$s_product->withdraw}}</td>	
									<td>{{$s_product->balance}} {{$s_product->product->unit}}</td>	
									<td>{{$s_product->trets->sum('quantity')}} {{$s_product->product->unit}}</td>	
									<td>
										<a href="" class="btn btn-default">Edit</a>
										<a href="{{route('trets.show', $s_product)}}" class="btn btn-default">trets</a>
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
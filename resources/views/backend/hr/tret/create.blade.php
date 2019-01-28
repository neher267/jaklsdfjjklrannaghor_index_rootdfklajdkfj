
@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">					
					<a href="{{route('trets.index')}}" class="btn btn-default">All Trets</a>
					@include('common.flash-message')
					<hr>
				</div>
				
				<div class="form-body">
					<form action="{{route('trets.store')}}" method="post">
					{{ csrf_field() }}

						<div class="form-group">
							<label for="product_id">Product Name</label>
							<select name="stock_id" id="product_id" class="form-control" required>
								<option value="">Select</option>
								@foreach($s_products as $s_product)
								<option value="{{$s_product->id}}">{{$s_product->product->name}}</option>
								@endforeach
							</select>
						</div>	

						<div class="form-group"> 
							<label for="reason">Reason</label> 
							<textarea name="reason" id="description" cols="50" rows="4" class="form-control" placeholder="Ex. Broken"></textarea>
						</div>					
						

						<div class="form-group"> 
							<label for="quantity">Quantiry</label> 
							<input type="number" name="quantity" class="form-control" id="quantity" placeholder="Total Quantity" required> 
						</div>										

						<button type="submit" class="btn btn-default">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
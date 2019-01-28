@extends('layouts.master')

@section('content')

<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms">
				<div class="col-md-12">
					<a class="btn btn-default" onclick="window.history.back()"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="form-body">
					<table id="datatable-buttons" class="table table-striped table-bordered">
	                    <tr>
	                        <th style="width: 150px">Name</th>
	                        <td>{{$order->user->name}}</td>
	                    </tr>	                    

	                    <tr>
	                        <th>Mobile</th>
	                        <td>{{$order->user->mobile}}</td>
	                    </tr>

	                    <tr>
	                        <th>User Address</th>
	                        <td>{{$order->user->address}}</td>
	                    </tr>

	                    <tr>
	                        <th>Shiping Address</th>
	                        <td>{{$order->s_address}}</td>
	                    </tr>

	                    <tr>
	                        <th>Notes</th>
	                        <td>{{$order->notes}}</td>
	                    </tr>
	                </table>

	                <hr>
	                <h3>Ordered Items</h3>
	                <hr>

	                <table id="datatable-buttons" class="table table-striped table-bordered">
	                    <thead>
	                        <tr>
	                            <th>Sr.No</th>
	                            <th>Image</th>
	                            <th>Name</th>
	                            <th style="text-align: right;">Quantity</th>
	                            <th style="text-align: right;">Unit Price</th>
	                        </tr>
	                    </thead>

	                    <tbody>
	                        <?php $i=0; $grand_total = 0; ?>
	                        @foreach($order->order_details as $result)
	                        <tr>
	                        	<?php $grand_total += ($result->quantity * $result->price); ?>
	                            <td>{{++$i}}</td>    
	                            <td>
	                                <img src="{{asset('public/'.$result->product->thumbnail)}}" style="width: 80px; height: 50px;">
	                            </td>    
	                            <td>{{$result->product->name}}</td>    
	                            <td style="text-align: right;">{{$result->quantity}}</td>    
	                            <td style="text-align: right;">{{$result->price}}</td>
	                        </tr>
	                        @endforeach                        
	                    </tbody>
	                    <tfoot>
	                    	<tr>
	                    		<th colspan="4" style="text-align: right;">Total Quantity: {{$order->order_details->sum('quantity')}}</th>    
	                            <th style="text-align: right;">Grand Total: {{number_format($grand_total,2)}}</th>
	                    	</tr>
	                    </tfoot>
	                </table>
	                <hr>
	                <h3>Actions</h3>
	                <hr>
	                <form action="{{route('orders.status', $order)}}" method="POST">
					{{ csrf_field() }}					

						<div class="form-group col-md-6"> 
							<label for="status">Order Status</label> 
							<select name="status" id="status" class="form-control" required onchange="alertUser('change order status?')">
								<option value="0" {{$order->status == 0 ? 'selected':''}}>Pending</option>
								<option value="1" {{$order->status == 1 ? 'selected':''}}>Confirmed</option>
								<option value="2" {{$order->status == 2 ? 'selected':''}}>Cancened</option>
							</select>
						</div>	

						<div class="form-group col-md-6"> 
							<label for="p_status">Payment Status</label> 
							<select name="p_status" id="p_status" class="form-control" onchange="alertUser('change payment status?')">
								<option value="0" {{$order->p_status == 0 ? 'selected':''}}>Due</option>
								<option value="1" {{$order->p_status == 1 ? 'selected':''}}>Paid</option>
							</select>
						</div>	

						<button type="submit" class="btn btn-success" style="margin-left: 15px">Update</button>						

					</form> 
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
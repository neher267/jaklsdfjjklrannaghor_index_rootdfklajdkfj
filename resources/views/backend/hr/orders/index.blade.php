@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">			
			<div class="row">
				<div class="col-md-12">	
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
								<th>Time</th>
								<th>Name</th>
								<th>Address</th>
								<th>Total Items</th>
								<th style="text-align: center;">P Status</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
						<?php $i=0; ?>
						@foreach($orders as $order)
							<tr>
								<td>{{++$i}}</td>								
								<td>{{$order->created_at->diffForHumans()}}</td>
								<td>{{$order->user->name}}</td>
								<td>{{$order->s_address}}</td>
								<td>{{$order->order_details->sum('quantity')}}</td>								

								<td style="text-align: center;">
	                                @if($order->p_status)
	                                <span class="badge" style="background: green">Paid</span>
	                                @else
	                                <span class="badge" style="background: #a94442">Due</span>
	                                @endif
	                            </td>							
								<td>
									<a href="{{route('orders.show', $order)}}" class="btn btn-success btn-xs">
										<fa class="fa fa-eye"></fa> Details</a>									

									<form action="" method="POST" style="display: inline;">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" class="btn btn-danger btn-xs" onclick="return alertUser('delete it?')">Delete</button>
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
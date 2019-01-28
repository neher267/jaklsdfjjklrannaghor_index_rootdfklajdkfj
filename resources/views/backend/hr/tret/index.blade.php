@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">					
					<a href="{{route('trets.create')}}" class="btn btn-default">Add Trets</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
						            <tr>
								<th>Product</th>
								<th>Branch</th>
								<th>Reason</th>
								<th>Quantity</th>
								<th>Actions</th>
						            </tr>
						</thead>
						<tbody>
						@foreach($trets as $tret)
							<tr>
								<td>{{$tret->stock->product->name}}</td>							
								<td>{{$tret->stock->branch->name}}</td>						
								<td>{{$tret->reason}}</td>						
								<td>{{$tret->quantity}}</td>						
								<td>
									<a href="{{route('trets.edit', $tret)}}" class="btn btn-default">Edit</a>
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
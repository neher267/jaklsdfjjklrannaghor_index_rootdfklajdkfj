@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="row">
				<div class="col-md-12">					
					<a href="{{route('expenses.create')}}" class="btn btn-default"><i class="fas fa-plus-circle green-btn"></i>Add Expense</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="col-md-12">
					<table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
						<thead>
				            <tr>
								<th>Name</th>
								<th>Branch</th>								
								<th>Title</th>
								<th>Description</th>
								<th>Amount</th>
								<th>Actions</th>
				            </tr>
						</thead>
						<tbody>
						@foreach($expenses as $expense)
							<tr>
								<td>{{$expense->user->name}}</td>
								<td></td>
								<td>{{$expense->title}}</td>
								<td>{{$expense->description}}</td>
								<td>{{$expense->amount}}</td>								
								<td>
									<a href="{{route('expenses.edit', $expense)}}" class="btn btn-default">Edit</a>
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
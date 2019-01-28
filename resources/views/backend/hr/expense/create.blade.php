@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{url('my-expenses')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@role('admin')
					<a href="{{route('expenses.index')}}" class="btn btn-default">All Expense</a>
					@endrole


					@include('common.flash-message')
					<hr>
				</div>
				
				<div class="form-body">
					<form action="{{route('expenses.store')}}" method="post">
					{{ csrf_field() }}

						<div class="form-group">
							<label for="title">Expense Title</label>
							<select name="title" id="title" class="form-control" required>
								<option value="">Select</option>	
								<option value="labor">Labor</option>
								<option value="other">Other</option>										<option value="transport">Transport</option>								
								<option value="tea">Tea</option>						
							</select>
						</div>	

						<div class="form-group"> 
							<label for="description">Expense Discription</label>
							<textarea name="description" id="description" cols="50" rows="4" class="form-control" placeholder="For five persons"></textarea>		
						</div>	

						<div class="form-group"> 
							<label for="amount">Amount</label> 
							<input type="number" name="amount" class="form-control" id="amount" required placeholder="50 tk"> 
						</div>						

						<button type="submit" class="btn btn-default">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
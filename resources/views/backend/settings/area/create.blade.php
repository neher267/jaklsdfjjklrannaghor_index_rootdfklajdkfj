@extends('layouts.master')

@section('content')
<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
				<div class="col-md-12">
					<a href="{{route('areas.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
				</div>

				<div class="form-body">
					<form action="{{route('areas.store')}}" method="post">
					{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Area Name</label> 
							<input type="text" name="name" class="form-control" id="name" placeholder="Area Name" required> 
						</div>	

						<div class="form-group">
							<label for="district_id">District Name</label>
							<select name="district_id" id="district_id" class="form-control" required>
								<option value="">Select</option>
								@foreach($districts as $district)
								<option value="{{$district->id}}">{{$district->name}}</option>
								@endforeach
							</select>
						</div>			

						<button type="submit" class="btn btn-default">Submit</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
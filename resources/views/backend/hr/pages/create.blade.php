@extends('layouts.master')

@section('content')

<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms">
				<div class="col-md-12">
					<a href="{{route('pages.index')}}" class="btn btn-default"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="form-body">
					<form action="{{route('pages.store')}}" method="post">
					{{ csrf_field() }}

						<div class="form-group"> 
							<label for="name">Page Name</label> 
							<input type="text" name="name" class="form-control" id="name" required> 
						</div>	

						<div class="form-group"> 
							<label for="description">Product Discription</label>
							<textarea name="description" id="description" cols="50" rows="4" class="form-control"></textarea>			
						</div>							

						<button type="submit" class="btn btn-default">Save</button>
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	CKEDITOR.replace('description', {
	    language: 'en',
	});
</script>
@endsection
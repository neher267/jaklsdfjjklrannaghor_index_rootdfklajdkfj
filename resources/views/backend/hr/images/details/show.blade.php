@extends('layouts.master')

@section('content')

<div class="grids">
	<div class="panel panel-widget forms-panel">
		<div class="forms">
			<div class="form-grids widget-shadow" data-example-id="basic-forms">
				<div class="col-md-12">
					<a class="btn btn-default" href="{{route('images.index')}}"><i class="fas fa-arrow-circle-left green-btn"></i>Back</a>
					@include('common.flash-message')
					<hr>
				</div>
				<div class="form-body">
					<table id="datatable-buttons" class="table table-striped table-bordered">
	                    <tr>
	                        <th style="width: 150px">Title</th>
	                        <td>{{$details->title}}</td>
	                    </tr>	                    

	                    <tr>
	                        <th>Description</th>
	                        <td>{{$details->body}}</td>
	                    </tr>
	                </table>
	            </div>
			</div>
		</div>
	</div>
</div>

@endsection
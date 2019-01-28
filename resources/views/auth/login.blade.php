@extends('layouts.master')

@section('content')
<div class="registration">
		<div class="registration_left">
		<h2>Log in your account.</h2>	 
		
		 <div class="registration_form">
		 <!-- Form -->
		 	@include('common.flash-message')
			<form action="{{url('login')}}" method="post">
			{{ csrf_field() }}
								
				<div>
					<label>
						<input name="mobile" placeholder="Mobile No" type="text" tabindex="3" required="">
					</label>
				</div>
				<div>
					<label>
						<input name="password" placeholder="password" type="password" tabindex="4" required="">
					</label>
				</div>						
				<div>
					<input type="submit" value="Log In">
				</div>				
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="clearfix"></div>
	</div>

@endsection
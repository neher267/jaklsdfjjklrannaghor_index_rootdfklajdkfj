@extends('layouts.master')

@section('content')
<div class="registration">
		<div class="registration_left">
		<hr>
		<h2>Create an account</h2>	
		<hr> 

		<div class="col-md-12">
            @include('common.errors')
		</div>
		
		 <div class="registration_form">
		 	@include('common.flash-message')

			<form action="{{route('employee-register')}}" method="post">
			{{ csrf_field() }}

				<div>
					<label>
						<input class="form-control" name="name" placeholder="Name" type="text" required style="text-transform: capitalize;" value="{{ old('name') }}">
					</label>
				</div>
				
				<div>
					<label>
						<input class="form-control" name="mobile" placeholder="Email address" type="email" required value="{{ old('mobile') }}">
					</label>
				</div>
				<div class="sky-form">
					<div class="sky_form1">
						<ul>
							<li>
								<label class="radio left">
									<input type="radio" name="gender" required value="M"><i></i>Male
								</label>
							<li>
								<label class="radio">
									<input type="radio" name="gender" required value="F"><i></i>Female
								</label>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div class="sky-form">
					<div class="sky_form1">
						<ul>	
							@if($roles->count())
								@if($user = Sentinel::check())
									@foreach($roles as $role)									
										@if($user->roles->first()->weight > $role->weight)									
										<li>
											<label class="radio left">
												<input type="radio" name="role" value="{{$role->slug}}" required>
												<i></i>{{$role->name}}
											</label>
										</li>
										@endif
									@endforeach
								@endif
							@else
							<li>Insert roles first!</li>
							@endif 
							
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div class="form-group">
					<label for="branch_id">Branch</label>
					<select name="branch_id" id="branch_id" class="form-control" required>
						<option value="">Select</option>
						<option value="*">All</option>
						@foreach($branches as $branch)
						<option value="{{$branch->id}}">{{$branch->name}}</option>
						@endforeach
					</select>
				</div>
				<div>
					<label>
						<input class="form-control" name="password" placeholder="password" type="password" required value="{{ old('password') }}">
					</label>
				</div>						
				<div>
					<label>
						<input class="form-control" name="password_confirmation" placeholder="Retype password" type="password" required value="{{ old('password_confirmation') }}">
					</label>
				</div>
					
				<div>
					<input type="submit" value="Save">
				</div>				
			</form>
		</div>
	</div>
	<div class="clearfix"></div>
	</div>

@endsection
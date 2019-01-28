<div class="login">
	<div id="loginContainer"><a id="loginButton" class=""><span>Login</span></a>
		<div id="loginBox" style="display: none;">                
			<form id="loginForm" action="{{url('login')}}" method="post">
			{{ csrf_field() }}

				<fieldset id="body">
					<fieldset>
						<label for="mobile">Mobile No</label>
						<input type="text" name="mobile" id="mobile">
					</fieldset>
					<fieldset>
						<label for="password">Password</label>
						<input type="password" name="password" id="password">
					 </fieldset>
					<input type="submit" id="login" value="Sign in">
					<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
				</fieldset>
				<span><a href="#">Forgot your password?</a></span>
			</form>
		</div>
	</div>
</div>
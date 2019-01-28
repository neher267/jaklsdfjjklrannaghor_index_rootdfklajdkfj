<!---->
<div class="overlay-login text-left">
    <button type="button login-finish" class="overlay-close1">
        <i class="fa fa-times color-primary" aria-hidden="true"></i>
    </button>
    <div class="wrap">
        <h5 class="text-center mb-4">Login Now</h5>
        <div class="login p-5 bg-dark mx-auto mw-100">
            <form action="{{url('login')}}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="mb-2">Mobile No</label>
                    <input type="text" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="" name="mobile">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your mobile no with anyone else.</small>
                </div>
                <div class="form-group">
                    <label class="mb-2">Password</label>
                    <input type="password" class="form-control login-input" id="exampleInputPassword1" placeholder="" required="" name="password">
                </div>
                <div class="form-group">
                    <label class="" for="exampleCheck1">Not a account? 
                        <a href="{{url('signup')}}">Create Account</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary submit mb-4 login-button">Sign In</button>

            </form>
        </div>
        <!---->
    </div>
</div>
<!---->

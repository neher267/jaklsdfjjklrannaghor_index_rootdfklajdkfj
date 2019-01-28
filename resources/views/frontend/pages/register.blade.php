@extends('frontend.master')

@section('content')


<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <div class="inner_sec">
            <p class="sub text-center mb-lg-5 mb-3">{{$page_title}}</p>

            @include('common.errors')
            
            <div class="contact_grid_right">
                <form action="{{url('signup')}}" method="post">
                    {{ csrf_field() }}

                    <div class="row contact_left_grid">
                        <div class="col-md-6 con-left">
                        	<div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Your Name" required>
                            </div>                            
                            
                            <div class="form-group">
                                <label class="my-2">Mobile No</label>
                                <input class="form-control" type="text" name="mobile" required>
                            </div>

                            <div class="form-group">
                                <label class="my-2">Address</label>
                                <input class="form-control" type="text" name="address" placeholder="Format : Road,House No,Area,Postal Code" required>
                            </div>
                        </div>
                        <div class="col-md-6 con-right">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label class="my-2">Repeat Password</label>
                                <input class="form-control" type="password" name="password_confirmation" required>
                            </div>

                            <input class="form-control" type="submit" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
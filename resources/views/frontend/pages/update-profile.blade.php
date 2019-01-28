@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <div class="inner_sec">
            <p class="sub text-center mb-lg-5 mb-3">{{$page_title}}</p>

            @include('common.errors')
            
            <div class="contact_grid_right">
                <form action="{{url('profile-update')}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row contact_left_grid">
                        <div class="col-md-6 con-left">
                            <div class="form-group">
                                <label class="my-2">Address</label>
                                <input class="form-control" type="text" name="address" placeholder="Format : Road,House No,Area,Postal Code" required value="{{$user->address}}">
                            </div>
                            @if(empty($user->email))
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Your Email">
                            </div>
                            @endif
                            <div class="form-group">
                                <label class="my-2">Profile Picture</label>
                                <input class="form-control" type="file" name="profile_image">
                            </div>
                        </div>
                        <div class="col-md-6 con-right">
                            <div class="form-group">
                                <label>Your Interests</label>
                                <textarea name="interests" id="textarea" placeholder="Your Interests">{{$user->interests}}</textarea>
                            </div>
                            <input class="form-control" type="submit" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
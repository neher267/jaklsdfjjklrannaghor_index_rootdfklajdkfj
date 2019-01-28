@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <div class="inner_sec" style="margin-bottom: 30px">
            <p class="sub text-center mb-lg-5 mb-3">{{$page_title}}</p>
            <div class="address row">

                <div class="col-lg-4 address-grid">
                    <div class="row address-info">
                        <div class="col-md-3 address-left text-center">
                            @if(empty($user->profile_image))
                            <i class="far fa-user"></i>
                            @else
                            <img src="{{asset('public/'.$user->profile_image)}}" style="width: 62px; height: 62px; border-radius: 50%">
                            @endif
                        </div>
                        <div class="col-md-9 address-right text-left">
                            <p>Name: <span class="category-name">{{$user->name}}</span></p>
                            <p>Email: <span class="category-name">{{$user->email}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 address-grid">
                    <div class="row address-info">
                        <div class="col-md-3 address-left text-center">
                            <i class="far fa-map"></i>
                        </div>
                        <div class="col-md-9 address-right text-left" style="min-height: 62px;">
                            <h6>Address</h6>
                            <p class="category-name">{{$user->address}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 address-grid">
                    <div class="row address-info">
                        <div class="col-md-3 address-left text-center">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="col-md-9 address-right text-left" style="min-height: 62px;">
                            <h6>Mobile</h6>
                            <p class="category-name">{{$user->mobile}}</p>

                        </div>

                    </div>
                </div>
                <a class="btn btn-primary btn-sm form-control" href="{{url('profile-update')}}">Update Profile</a>
            </div>
        </div>
    </div>
</section>
@endsection
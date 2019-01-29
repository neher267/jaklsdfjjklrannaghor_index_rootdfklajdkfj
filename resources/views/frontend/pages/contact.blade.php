@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <!-- <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Contact</h3> -->
        <div class="inner_sec">
            <p class="sub text-center mb-lg-5 mb-3">We love to discuss your idea</p>
            <div class="address row">

                <div class="col-lg-4 address-grid">
                    <div class="row address-info">
                        <div class="col-md-3 address-left text-center">
                            <i class="far fa-map"></i>
                        </div>
                        <div class="col-md-9 address-right text-left">
                            <h6>Address</h6>
                            <p class="category-name">{{config('settings.address')}}</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 address-grid">
                    <div class="row address-info">
                        <div class="col-md-3 address-left text-center">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="col-md-9 address-right text-left">
                            <h6>Email</h6>
                            <p class="category-name">{{config('settings.email')}}</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 address-grid">
                    <div class="row address-info">
                        <div class="col-md-3 address-left text-center">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="col-md-9 address-right text-left">
                            <h6>Phone</h6>
                            <p class="category-name">{{config('settings.mobile')}}</p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                    @include('common.errors')
                </div>
                <div class="contact_grid_right">
                    <form action="{{url('inquiries')}}" method="post">
                        {{ csrf_field() }}

                        <div class="row contact_left_grid">
                            <div class="col-md-6 con-left">
                                <div class="form-group">
                                    <label class="my-2">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Youre Name" required value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Your Email Address" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label class="my-2">Subject</label>
                                    <input class="form-control" type="text" name="subject" placeholder="Message Subject" required value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="col-md-6 con-right">
                                <div class="form-group">
                                    <label class="my-2">Message</label>
                                    <textarea name="message" id="textarea" placeholder="Your Message" required style="margin: 0px">{{ old('message') }}</textarea>
                                </div>
                                <input class="form-control" type="submit" value="Submit">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
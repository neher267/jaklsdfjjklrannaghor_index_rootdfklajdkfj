@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <div class="inner_sec contact_grid_right" style="min-height: 400px">
            <p class="sub text-center mb-lg-5 mb-3">Checkout</p>
            <div class="checkout-right">
                <h4 class="text-center">Your shopping cart contains:
                    <span>{{Cart::count()}} Items</span>
                </h4>
                @if(Cart::count()>0)
                            
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>                            
                            <th style="text-align: right;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $food)
                        <tr class="rem1">
                            <td>
                                <form method="post" action="{{url('remove-item')}}" style="display: inline;">
                                    {{csrf_field()}}

                                    <input type="hidden" name="rowId" value="{{$food->rowId}}">
                                    <button type="submit" class="btn btn-xs" data-sbmincart-idx="0"><i class="fa fa-times" aria-hidden="true" style="color: #ff4e00"></i></button>
                                </form>                                
                            </td>
                            <td class="invert-image">
                                <img src="{{asset('public/'.$food->options->image)}}" alt="{{$food->name}}" class="img-responsive image3">
                            </td>
                            <td class="invert">{{$food->name}}</td>
                            <td>
                                <span>{{$food->qty}}+</span>
                                <form id="manage_qty" method="post" action="{{url('cart-update')}}" style="display: inline;">
                                    {{csrf_field()}}

                                    <input class="form-control" type="number" name="qty" style=" width: 50px; display: inline; padding: 0px 1px; border-radius: 4px; text-align: center;" placeholder="2">
                                    <input type="hidden" name="rowId" value="{{$food->rowId}}">
                                    <button id="manage_qty_btn" class="btn btn-sm" style="padding: 1px 8px">
                                        <i class="fa fa-retweet" aria-hidden="true" style="color: green;"></i>
                                    </button>
                                </form>
                            </td>

                            <td class="invert" style="text-align: right;">{{number_format($food->price*$food->qty,2)}}</td>                            
                        </tr> 
                        @endforeach                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right;">
                                <strong>Subtotal: ৳</strong>
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                {{Cart::subtotal()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
                @else
                <p class="text-center"><a style="color: #AD1457" href="{{url('menu')}}" class="nav-style">
                    <i class="fa fa-shopping-cart"></i> Continue Shopping
                </a></p>
                @endif
            </div>
            @if(Cart::count()>0)
            <div class="checkout-left row">
                <div class="col-md-8 address_form" style="padding-left: 0px">
                    @if($user = Sentinel::check())
                        <form class="creditly-card-form agileinfo_form" action="{{url('orders')}}" method="post">
                        {{csrf_field()}}

                        <section class="creditly-wrapper wrapper">
                            <div class="information-wrapper">
                                
                                <div class="first-row form-group">                                    
                                    <div class="card_number_grids">
                                        <div class="card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">Shipping Address -> Format : Road, House(Floor), Area, Post Code</label>
                                                <input class="form-control" type="text" name="s_address" placeholder="Shipping Address" value="{{$user->address}}" required>
                                            </div>
                                        </div>

                                        <div class="clear"> </div>
                                    </div>
                                </div>

                                <div class="first-row form-group">                                    
                                    <div class="card_number_grids">
                                        <div class="card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">Notes</label>
                                                <input class="form-control" type="text" name="notes" placeholder="Your Notes">
                                            </div>
                                        </div>

                                        <div class="clear"> </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-default">Order Now</button>

                            </div>
                        </section>
                    </form>
                    @else
                    <ul class="cart-inner-info">
                        <li class="button-log" style="margin-left: 0px">
                            <a class="btn-open btn btn-default" href="#">
                                <span class="fa" aria-hidden="true"> Order Now</span>
                            </a>
                        </li>
                    </ul> 
                    @endif             

                </div>
                <div class="clearfix"> </div>
            </div>
            @endif
            
        </div>
    </div>
</section>

@endsection
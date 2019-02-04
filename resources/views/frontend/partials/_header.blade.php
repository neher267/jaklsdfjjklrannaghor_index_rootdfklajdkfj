<div class="row">
    <div class="col-md-3 top-info text-left mt-lg-4">
        <!-- <h6>Need Help</h6> -->
        <ul>
            <li>
                <i class="fas fa-phone"></i> Call</li>
            <li class="number-phone mt-3">{{config('settings.mobile')}}</li>
        </ul>
    </div>
    <div class="col-md-6 logo-w3layouts text-center">
        <h1 class="logo-w3layouts">
			<a class="navbar-brand" href="{{url('/')}}">{{config('app.name')}}</a>
		</h1>
        <span class="color-primary logo-top"><strong>বিডি</strong></span>
    </div>

    <div class="col-md-3 top-info-cart text-right mt-lg-4">
        <ul class="cart-inner-info">           

            <li class="galssescart galssescart2 cart cart box_1">
                <form action="#" method="post" class="last">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="display" value="1">
                    <button class="top_googles_cart" type="button">
                        <span id="total_items" style="color: #AD1457">{{ Cart::count() }}</span> Items
                        <i class="fas fa-cart-arrow-down" style="color: #AD1457"></i>                        
                    </button>                    
                </form>                
            </li>

            @if($user = Sentinel::check())                
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    <span class="fa fa-user color-primary" aria-hidden="true"> <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" style="text-align: right;width: 33%;margin-left: 29%">
                    <li style="display: block;"><a href="{{url('profile')}}">Profile</a></li>
                    <li style="display: block;"><a href="{{route('customer.orders.index')}}">My Orders</a></li>
                    <li>
                        <a href="{{url('logout')}}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @else
                
            <li class="button-log">
                <a class="btn-open" href="#">
                    <span class="fa fa-user" aria-hidden="true"></i></span>
                </a>                
            </li>
            @endif          
        </ul>        
    </div>
</div>

<label class="top-log mx-auto"></label>

<!-- nav -->
@include('frontend.partials.header._nav')
<!-- end nav -->
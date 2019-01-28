<div id="staplesbmincart">
	<form method="post" action="#" target="">
	    <button type="button" class="sbmincart-closer">×</button>
	    <ul>
	    	@foreach(Cart::content() as $content)
	        <li class="sbmincart-item sbmincart-item-changed" id="{{$content->rowId}}">
	        	<div class="sbmincart-details-remove">
	                <button type="button" class="sbmincart-remove" data-sbmincart-idx="0"><i class="fa fa-times color-primary" aria-hidden="true" onclick="cart('<?php echo $content->rowId?>', 'remove')"></i></button>
	            </div>
	        	<div class="sbmincart-details-name">{{$content->name}}</div>	                

	            <div class="sbmincart-details-remove">
	                <button type="button" class="sbmincart-remove" data-sbmincart-idx="0"
	                onclick="cart('<?php echo $content->rowId?>', 'decrease')">
	                	<i class="fa fa-minus" aria-hidden="true" style="color: red"></i>
	                </button>	                    
	            </div>	

	            <div class="sbmincart-details-remove">
	                <button type="button" class="sbmincart-remove" 
	                data-sbmincart-idx="0"
	                onclick="cart('<?php echo $content->rowId?>', 'increase')">
	                	<i class="fa fa-plus" aria-hidden="true" style="color: green"></i>
	                </button>	                    
	            </div>

	            <div class="sbmincart-details-price" style="float: right;"> <span class="sbmincart-price">৳<span id="{{$content->rowId}}qty">{{$content->qty}}</span>x{{$content->price}}</span> </div>
	            
	        </li>
	        @endforeach	            
	    </ul>

	    <div class="sbmincart-footer">
	        <div class="sbmincart-subtotal"> Subtotal: ৳<span id="cart_subtotal">{{Cart::subtotal()}}</span> </div>
	        <a href="{{url('checkout')}}" class="sbmincart-submit">Check Out</a>
	    </div>
	    <input type="hidden" name="cmd" value="_cart">
	    <input type="hidden" name="upload" value="1">
	    <input type="hidden" name="bn" value="sbmincart_AddToCart_WPS_US"> 
	</form>
</div>
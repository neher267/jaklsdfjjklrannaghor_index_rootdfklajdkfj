@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <div class="inner_sec" style="margin-bottom: 30px">
            <p class="sub text-center mb-lg-5 mb-3">{{$page_title}}</p>
            <div class="address row">
                <a href="{{route('customer.orders.index')}}" 
                class="btn btn-default btn-sm color-primary" style="margin-bottom: 8px;">
                <i class="fa fa-arrow-circle-left"></i> Back</a>

				@if(sizeof($details))                            
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
							<th>Image</th>
							<th>Name</th>
                            <th>Quantity</th>
							<th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=0; ?>
                        @foreach($details as $order)
                        <tr class="rem1">   
                        	<td class="invert">{{++$i}}</td>                      
                            <td class="invert-image">
                                <img src="{{asset('public/'.$order->product->thumbnail)}}" alt="{{$order->product->name}}" class="img-responsive image3">
                            </td>
                            <td class="invert">{{$order->product->name}}</td>
                            <td class="invert">{{$order->quantity}}</td>
							<td class="invert">
                                {{$order->quantity}}x{{$order->price}} = {{$order->price * $order->quantity}}
                                <span style="font-size: 12px">৳</span>
                            </td>						
                        </tr> 
                        @endforeach                        
                    </tbody>                    
                </table>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
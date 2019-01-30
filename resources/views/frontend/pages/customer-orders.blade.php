@extends('frontend.master')

@section('content')
<section class="banner-bottom-wthreelayouts py-3 py-5">
    <div class="container">
        <div class="inner_sec" style="margin-bottom: 30px">
            <p class="sub text-center mb-lg-5 mb-3">{{$page_title}}</p>
            <div class="address row">
    			@if(sizeof($orders))                            
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
    						<th>Time</th>
    						<th>Address</th>
                            <th>Status</th>
    						<th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php $i=0; ?>
                        @foreach($orders as $order)
                        <tr class="rem1">   
                        	<td class="invert">{{++$i}}</td>                      
                            <td class="invert">{{$order->created_at->diffForHumans()}}</td>
    						<td class="invert">{{$order->s_address}}</td>
    						<td class="invert">
    							@if($order->status==0)
    							<span class="badge" style="background: #337ab7; color: #fff;">Pending</span>
    							@elseif($order->status==1)
    							<span class="badge" style="background: green; color: #fff;">Confirmed</span>
    							@elseif($order->status==2)
    							<span class="badge" style="background: #AD1457; color: #fff;">Canceled</span>
    							@endif
    						</td> 
                            <td>
                                <a href="{{route('customer.orders.show', $order)}}" class="btn btn-default color-primary">Details</a>
                            </td>                                                       
                        </tr> 
                        @endforeach                        
                    </tbody>
                    @if(sizeof($orders)==10)
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="float-right">
                                    {{ $orders->links() }} 
                                </div> 
                            </td>
                        </tr>
                    </tfoot>
                    @endif                    
                </table>             
                @else
                <p class="text-center"><a style="color: #AD1457" href="{{url('menu')}}" class="nav-style">
                    <i class="fa fa-shopping-cart"></i> Continue Shopping
                </a></p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
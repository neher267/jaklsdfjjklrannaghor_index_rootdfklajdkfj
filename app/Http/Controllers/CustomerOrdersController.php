<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Order;
use App\OrderDetail;
use App\Models\Hr\Product;
use Sentinel;


class CustomerOrdersController extends Controller
{
    /**
     * Display a listing of the customer indiviual orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "My Orders";
        $orders = Sentinel::getUser()->myOrders()->latest()->paginate(10);
        return view('frontend.pages.customer-orders', compact('page_title', 'orders'));
    }

    /**
     * Store a newly created order in storage by customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->s_address = $request->s_address;
        $order->notes = $request->notes;
        $order->slug = time(). Sentinel::getUser()->id;
        $order->user()->associate(Sentinel::getUser())->save();
        foreach (Cart::content() as $content) {
            $orderDetails = new OrderDetail;
            $orderDetails->order()->associate($order);
            $orderDetails->product()->associate($content->id);
            $orderDetails->quantity = $content->qty;
            $orderDetails->price = $content->price;
            $orderDetails->save();
            $orderDetails->product->makePopular();
        }
        Cart::destroy();
        return redirect('/')->withSuccess('You order is placed successfully! We will contact you soon. Thank you for your order.');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $page_title = "Details";
        if(Sentinel::getUser()->id == $order->user_id){
            $details = $order->order_details;  
            return view('frontend.pages.customer-order-details', compact('page_title', 'details'));
        }
        return back();
    }
}

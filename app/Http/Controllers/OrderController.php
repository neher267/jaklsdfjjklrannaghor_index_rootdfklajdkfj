<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart;
use App\Order;
use App\OrderDetail;
use App\Models\Hr\Product;
use Sentinel;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->s_address = $request->s_address;
        $order->notes = $request->notes;
        $order->user()->associate(Sentinel::getUser())->save();
        foreach (Cart::content() as $content) {
            $orderDetails = new OrderDetail;
            $orderDetails->order()->associate($order);
            $orderDetails->product()->associate($content->id);
            $orderDetails->quantity = $content->qty;
            $orderDetails->price = $content->price;
            $orderDetails->save();
            //dd($orderDetails->product);
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
    public function show($id)
    {
        $order = Order::find($id);
        $inquiry = $order->inquiry()->first();
        $page_title = 'Order Details';

        return view('layouts.backend2.pages.orders.show', compact('order', 'inquiry', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use Sentinel;

class OrderController extends Controller
{
	public function index($status)
	{

		$orders = Order::with(['user','order_details'])->where('status', $status)->latest()->get();
		$title = $this->getTitle($status);
		if($title == 'error')
			return back();
		else
			return view('backend.hr.orders.index', compact('orders', 'title'));
	}	

	protected function getTitle($status)
	{
		$title = 'error';
		switch ($status) {
			case 0:
				$title = 'Pending Orders';
				break;
			case 1:
				$title = 'Confirmed Orders';
				break;
			case 2:
				$title = 'Canceled Orders';
				break;		
		}
		return $title;
	}

	public function show(Order $order)
	{
		//dd($order);
		$title = "Details";
		return view('backend.hr.orders.show', compact('order', 'title'));
	}   

	public function change_status(Request $request, Order $order)
	{
		$order->status = $request->status;
		$order->payment_status = $request->p_status;
		$order->save();
		return back()->withSuccess('Status Changed Success!');
	} 
}

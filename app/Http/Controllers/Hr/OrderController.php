<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Traits\SentinelTrait;
use App\Order;
use App\OrderDetail;
use Sentinel;

class OrderController extends Controller
{
	use SentinelTrait;


	/**
	* Display a list of customer orders 
	* Only Chairman and Salesman can access this
	* Orders are displayed by 3 difrent status
	*/
	public function index($status)
	{
		if($this->user_authorization('chairman','salesman'))
		{
			$order_status = ['pending'=>0, 'confirmed'=>1, 'canceled'=>2];
			$title = $this->getTitle($status);
			if($title != 'error')
			{
				$orders = Order::with(['user','order_details'])->where('status', $order_status[$status])->latest()->get();	
				return view('backend.hr.orders.index', compact('orders', 'title'));	
			}
		}	
		return back();		
	}	

	private function getTitle($status)
	{
		$title = 'error';
		switch ($status) {
			case 'pending':
				$title = 'Pending Orders';
				break;
			case 'confirmed':
				$title = 'Confirmed Orders';
				break;
			case 'canceled':
				$title = 'Canceled Orders';
				break;		
		}
		return $title;
	}

	public function show(Order $order)
	{
		if($this->user_authorization('chairman','salesman'))
		{
			$title = "Details";
			return view('backend.hr.orders.show', compact('order', 'title'));
		}	
		return back();
		
	}   

	public function change_status(Request $request, Order $order)
	{	
		if($this->user_authorization('chairman','salesman'))
		{
			$order->status = $request->status;
			$order->payment_status = $request->p_status;
			$order->save();
			return back()->withSuccess('Status Changed Success!');
		}	
		return back();
	} 

	public function distroy(Order $order)
	{
		if($this->user_authorization('chairman','salesman'))
		{
			$order->delete();
			return back()->withSuccess('Delation Success!');
		}	
		return back();		
	}
}

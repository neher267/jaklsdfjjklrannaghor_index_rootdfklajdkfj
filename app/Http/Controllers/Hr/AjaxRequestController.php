<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Traits\SentinelTrait;
use App\Order;

class AjaxRequestController extends Controller
{
	use SentinelTrait;

    public function pending_orders()
    {
    	$data['pending_orders_count'] = 0;
    	if($this->user_authorization('chairman','salesman'))
    	{
    		$data = array();
	        $data['pending_orders_count'] = Order::where('status',0)->get()->count();
		} 
		
		return $data;       
    }
}

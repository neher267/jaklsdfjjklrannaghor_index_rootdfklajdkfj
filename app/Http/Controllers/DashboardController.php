<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class DashboardController extends Controller
{
    public function index(){
    	$user_role = Sentinel::getUser()->roles()->first()->slug;
    	if($user_role == 'salesman')
    	{
    		return redirect('dashboard/orders-filter/pending');
    	}
    	return view('backend.index');
    }
}

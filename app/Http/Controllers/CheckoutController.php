<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
    	$page_title = 'Checkout';
    	return view('frontend.pages.checkout', compact('page_title'));
    }
}

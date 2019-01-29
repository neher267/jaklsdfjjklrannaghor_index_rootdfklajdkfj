<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr\Product;
use Cart;

class CartController extends Controller
{
    protected $count;
    protected $subtotal;

    public function __construct()
    {
        $this->count = Cart::count();
        $this->subtotal = Cart::subtotal();
    }

    public function add(Product $product)
    {       
    	Cart::add($product, 1, ['image'=>$product->thumbnail]);
    	return back()->withSuccess('One Item added..');
    }

    public function add_to_cart(Product $product, Request $request)
    {

        Cart::add($product, $request->qty, ['image'=>$product->thumbnail]);        
        return back()->withSuccess($request->qty.'item(s) added.');
    }

    public function cart_update(Request $request)
    {
        $rowId = $request->rowId;     
        $qty = (int) Cart::get($rowId)->qty + (int)$request->qty;   
        $price = (int) Cart::get($rowId)->price * $qty; 
        Cart::update($rowId, $qty);
        return back();
    }

    public function remove_item(Request $request)
    {
        Cart::remove($request->rowId);
        return back()->withSuccess('Removed.');
    }



}

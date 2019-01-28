<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class AjaxRequestController extends Controller
{
    
    public function cart(Request $request)
    {
        switch ($request->type) {
            case 'increase':
                return $this->increase($request->id);
                break;
            case 'decrease':
                return $this->decrease($request->id);
                break;
            case 'remove':
                return $this->remove($request->id);
                break;
        }
    }

    public function increase($rowId)
    {
        $qty = (int) Cart::get($rowId)->qty + 1;   
        Cart::update($rowId, $qty);
        $data = $this->getValues();
        $data['qty'] = $qty;
        return $data;
    }

    protected function decrease($rowId)
    {
        $qty = (int) Cart::get($rowId)->qty - 1;   
        Cart::update($rowId, $qty);
        $data = $this->getValues();
        $data['qty'] = $qty;
        return $data;
    }    

    protected function remove($rowId)
    {
        Cart::remove($rowId);
        $data = $this->getValues();
        $data['qty'] = 0;
        return $data;
    } 

    protected function getValues()
    {
        $data = array();
        $data['totalQty'] = Cart::count();  
        $data['subtotal'] = Cart::subtotal();
        return $data;
    }
}

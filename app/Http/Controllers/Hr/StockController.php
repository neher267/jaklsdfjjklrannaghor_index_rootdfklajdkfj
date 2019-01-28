<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;
use App\Purchase;
use App\Models\Hr\Product;
use Sentinel;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $s_products = Stock::with(['product', 'trets'])->where('branch_id', Sentinel::getUser()->branch_id)->get();
        
        return view('backend.hr.stock.index', compact('s_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchases = Purchase::with('buyer','product')
                    ->where('branch_id', request()->user()->branch_id)
                    ->where('update_stock', false)->get();
        //dd($purchases);
        return view('backend.hr.stock.create', compact('purchases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch_id = Sentinel::getUser()->branch_id;
        if($s_product = $this->check_stock_available_product($branch_id, $request->product_id))
        {
            $s_product->deposit = (int)$s_product->deposit + (int)$request->deposit;
            $s_product->balance = (int)$s_product->balance + (int)$request->deposit;
            $s_product->save();
        }

        else
        {
            $stock  = new Stock;        
            $stock->branch()->associate($branch_id);
            $stock->product()->associate($request->product_id);        
            $stock->deposit = (int)$request->deposit;
            $stock->balance = (int)$request->deposit;
            $stock->save();
        }

        $purchase = Purchase::find($request->purchase_id);
        $purchase->deposit = $request->deposit;
        $purchase->update_stock = true; 
        $purchase->save();
       
       return redirect()->back()->withSuccess('Stock Update Success!');
    }

    private function check_stock_available_product($branch_id, $product_id)
    {
        return Stock::where('branch_id', $branch_id)->where('product_id', $product_id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

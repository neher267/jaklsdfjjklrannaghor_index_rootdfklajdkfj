<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr\Product;
use App\Models\Hr\Price;
use App\Purchase;
use Sentinel;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $purchases = Purchase::with(['buyer', 'merchant', 'product', 'branch'])->latest()->get();
        return view('backend.hr.purchases.index', compact('purchases'));
    }

    public function branchIndex()
    {
        $purchases = Purchase::with(['merchant', 'product'])
                    ->where('branch_id', request()->user()->branch_id)
                    ->latest()->get();
                    
        return view('backend.hr.purchases.individual-index', compact('purchases'));
    }

    public function individualIndex()
    {
        $purchases = request()->user()->purchases()
                    ->with(['merchant', 'product'])
                    ->latest()->get();

        return view('backend.hr.purchases.individual-index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_id = request()->user()->branch_id;
        dd($branch_id);
        $products = Product::orderBy('name', 'asc')->get();
        $merchants = Sentinel::findRoleBySlug('marchant')->users()
                    ->where('branch_id', $branch_id)
                    ->orWhere('branch_id','0')->get(); // 0 for all branch

        return view('backend.hr.purchases.create', compact('products', 'merchants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchese = new Purchase;
        $purchese->buyer_id = $request->user()->id;
        $purchese->merchant_id = $request->merchant_id;
        $purchese->product_id = $request->product_id;
        $purchese->branch_id = $request->user()->branch_id;
        $purchese->quantity = $request->quantity;
        $purchese->price = $request->price;
        $purchese->save();
        return redirect()->back()->withSuccess('Create Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

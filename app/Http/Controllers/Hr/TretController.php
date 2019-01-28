<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hr\Product;
use App\Tret;
use App\Stock;
use Sentinel;

class TretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trets = Tret::with(['stock.branch', 'stock.product'])->latest()->get();
        return view('backend.hr.tret.index', compact('trets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $s_products = Stock::with('product')->where('branch_id', Sentinel::getUser()->branch_id)->get();
        return view('backend.hr.tret.create', compact('s_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::find($request->stock_id);
        $stock->balance = (int)$stock->balance - (int)$request->quantity;
        $stock->save();

        $tret = new Tret;
        $tret->stock()->associate($stock);
        $tret->reason = $request->reason;
        $tret->quantity = $request->quantity;
        $tret->save();


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
        $stock = Stock::find($id);
        $trets = $stock->trets;
        return view('backend.hr.tret.index', compact('trets'));
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

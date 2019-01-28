<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Gift;
use App\Image;


class GiftController extends Controller
{
    private $path = "images/Gifts";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::orderBy('name', 'asc')->get();
         return view('backend.settings.gift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.gift.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->src->getClientOriginalExtension();
        
        $gift = new Gift;
        $gift->name = $request->name;
        $gift->slug = strtolower(str_replace(' ', '-', $request->name));
        $gift->points = (int)$request->points;
        $gift->thumbnail = $this->path.'/'.$imageName; 
        $gift->save();

        $request->src->move(public_path($this->path), $imageName);
        $image = new Image;
        $image->type = 'Thumbnail';
        $image->src = $this->path.'/'.$imageName;
        $gift->images()->save($image); 

        return back()->withSuccess('Create Success!');
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
    public function edit(Gift $gift)
    {
        $title = 'Edit '.$gift->name;
        return view('backend.settings.gift.edit', compact('title', 'gift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gift $gift)
    {
        $gift->name = $request->name;
        $gift->slug = strtolower(str_replace(' ', '-', $request->name));
        $gift->points = (int)$request->points;
        $gift->save();

        return redirect("gifts")->withSuccess("Edit Successful!");
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

<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Models\Settings\Gift;

class GiftImageController extends Controller
{
    private $path = "images/Gifts";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gift $gift)
    {
        $images = $gift->images()->get();
        $title = $gift->name." All Gifts";
        return view('backend.settings.gift.images.index', compact('images', 'gift', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gift $gift)
    {
        $images = $gift->images()->get();      
        $title = $gift->name.": Add Image";
        return view('backend.settings.gift.images.create', compact('images', 'gift', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gift $gift)
    {
        $request->validate(['src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100']);
        $imageName = time().'.'.$request->src->getClientOriginalExtension();
        $request->src->move(public_path($this->path), $imageName);
        
        $image = new Image;
        $image->type = $request->type;
        $image->src = $this->path.'/'.$imageName;
        $gift->images()->save($image);  

        return back()->withSuccess('You are successfully add an image.');
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
    public function edit(Gift $gift, $image_id)
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
    public function update(Request $request, Gift $gift, $image_id)
    {
        if($request->has('src'))
        {
            $gift->thumbnail = $request->src;
            $gift->save();
        }
        else
        {
            $image->status = $request->status;
            $image->save();
        }              

        return back()->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $gift_id, $image_id)
    {
        unlink($request->avatar);
        $image = Image::find($image_id)->delete();
        return back()->withSuccess("Delation Success!");
    }
}

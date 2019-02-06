<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Models\Hr\Package;
use App\Models\Hr\Product;

class ImageController extends Controller
{
    private $path = "images/site";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::where('imageable_id', null)->get();      
        $title = "All Images";
        return view('backend.hr.images.index', compact('images', 'title'));
    }

    public function type_index($type)
    {
        $images = Image::where('type', $type)->get();       
        $title = "All $type Images";
        return view('backend.hr.images.index', compact('images', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Image";
        return view('backend.hr.images.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:400']);
        $imageName = time().'.'.$request->src->getClientOriginalExtension();
        $request->src->move(public_path($this->path), $imageName);
        
        $image = new Image;
        $image->type = $request->type;
        $image->src = $this->path.'/'.$imageName;
        $image->save();  

        return back()->withSuccess('You have successfully add an image.');
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
    public function update(Request $request, Image $image)
    {
        $image->status = $request->status;
        $image->save();             

        return back()->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Image $image)
    {
        if (is_file($request->avatar)) {
            unlink($request->avatar);
        }
        $image->delete();
        return back()->withSuccess("Delation Success!");
    }
}

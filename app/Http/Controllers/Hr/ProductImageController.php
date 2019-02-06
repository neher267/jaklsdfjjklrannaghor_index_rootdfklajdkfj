<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Models\Hr\Package;
use App\Models\Hr\Product;

class ProductImageController extends Controller
{
    private $path = "images/products";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $images = $product->images()->get();
        $title = $product->name." All Images";
        return view('backend.hr.product.images.index', compact('images', 'product', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $images = $product->images()->get();      
        $title = $product->name.": Add Images";
        return view('backend.hr.product.images.create', compact('images', 'product', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request->validate(['src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100']);
        $imageName = time().'.'.$request->src->getClientOriginalExtension();
        $request->src->move(public_path($this->path), $imageName);
        
        $image = new Image;
        $image->type = $request->type;
        $image->src = $this->path.'/'.$imageName;
        $product->images()->save($image);  

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
    public function edit($product_id, $image_id)
    {
        $image = Image::find($image_id);
        $title = $image->imageable->name.': Edit Image';
        return view('backend.hr.product.images.edit', compact('title', 'product_id', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Image $image)
    {       

        if($request->has('src'))
        {
            $product->thumbnail = $request->src;
            $product->save();
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
    public function destroy(Request $request, $product_id, $image_id)
    {
        if(file_exists('public/'.$request->avatar)){
            unlink('public/'.$request->avatar);
        }
        $image = Image::find($image_id)->delete();
        return back()->withSuccess("Delation Success!");
    }   
}

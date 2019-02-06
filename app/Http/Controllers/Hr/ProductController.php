<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Models\Hr\Product;
use App\Models\Settings\Category;

class ProductController extends Controller
{
    private $path = "images/products";
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('for_sale', true)->latest()->get();
        $title = "All Products";
        return view('backend.hr.product.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.hr.product.create', compact('categories'));
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
        // both side space remove and more than one space to one space
        $product = new Product;
        $product->name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        $product->bn_name = trim(preg_replace('/\s\s+/', ' ', $request->bn_name));
        $product->slug = str_slug($request->name, '-');
        $product->category()->associate($request->category_id);
        $product->price = $request->price;
        $product->old_price = $request->price;
        $product->unit = $request->unit;
        $product->for_sale = true;
        $product->description = $request->description;
        $product->bn_description = $request->bn_description;
        $product->thumbnail = $this->path.'/'.$imageName; 
        $product->save();

        $request->src->move(public_path($this->path), $imageName);
        $image = new Image;
        $image->type = 'Thumbnail';
        $image->src = $this->path.'/'.$imageName;
        $product->images()->save($image); 

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
    public function edit(Product $product)
    {
        $title = 'Edit '.$product->name;
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.hr.product.edit', compact('categories','title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        $product->bn_name = trim(preg_replace('/\s\s+/', ' ', $request->bn_name));
        $product->category()->associate($request->category_id);
        $product->old_price = $product->price;
        $product->price = $request->price;        
        $product->unit = $request->unit;
        $product->for_sale = true;
        $product->description = $request->description;
        $product->bn_description = $request->bn_description;
        $product->save();

        return redirect("dashboard/products")->withSuccess("Update Successful!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->images()->each(function ($item, $key) 
        {
            if(file_exists('public/'.$item->src)){
                unlink('public/'.$item->src);
            }
            $item->delete();
        });

        $product->delete();

        return back()->withSuccess('Deleted Success!');
    }
}

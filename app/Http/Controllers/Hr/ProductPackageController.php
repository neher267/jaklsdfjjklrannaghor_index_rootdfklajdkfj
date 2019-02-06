<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Models\Hr\Package;
use App\Models\Hr\Product;

class ProductPackageController extends Controller
{
    private $path = "images/ProductPackages";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where('packageable_type', 'product')->get();
        return view('backend.hr.package.index', compact('packages'));
    }

    public function packages(Product $product)
    {
        $packages = $product->packages()->get();
        $title = $product->name." All Packages";
        return view('backend.hr.package.index', compact('packages', 'product', 'title'));
    }

    public function create(Product $product)
    {
        $package_for = $product;
        $title = "Create Package For: ".$package_for->name;
        return view('backend.hr.package.create', compact('package_for', 'title'));
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

        $package = new Package;
        $package->title = $request->title;
        $package->bn_title = $request->bn_title;
        $package->slug = time();
        $package->description = $request->description;
        $package->bn_description = $request->bn_description;
        $package->thumbnail = $this->path.'/'.$imageName;

        $product = Product::find($request->product_id);
        $product->packages()->save($package);

        $request->src->move(public_path($this->path), $imageName);
        $image = new Image;
        $image->type = 'Thumbnail';
        $image->src = $this->path.'/'.$imageName;
        $package->images()->save($image); 

        return back()->withSuccess('Saved Successfully!');
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

    public function images($product_id, $package_id)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Package $package)
    {
        $title = "Edit ".$product->name. " Package";
        return view('backend.hr.package.edit', compact('package', 'title','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product, Package $package)
    {
        $package->title = $request->title;
        $package->bn_title = $request->bn_title;
        $package->description = $request->description;
        $package->bn_description = $request->bn_description;
        $package->save();
        
        return redirect("dashboard/products/$product/packages")->withSuccess('Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Package $package)
    {
        $package->images()->each(function ($item, $key) 
        {
            if(file_exists('public/'.$item->src)){
                unlink('public/'.$item->src);
            }
            $item->delete();
        });

        $package->delete();

        return back()->withSuccess('Deleted Success!');
    }
}

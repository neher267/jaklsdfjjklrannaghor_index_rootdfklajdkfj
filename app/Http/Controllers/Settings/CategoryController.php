<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Category;
use App\Models\Settings\Department;
use App\Models\Hr\Product;
use App\Image;

class CategoryController extends Controller
{
    private $path = "images/Category";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.settings.category.index', compact('categories'));
    }

    public function products(Category $category)
    {
        $products = $category->products()->get();
        $title = $category->name.": All Products";
        return view('backend.hr.product.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        return view('backend.settings.category.create', compact('departments'));
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
        $name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        
        $category = new Category;
        $category->name = $name;
        $category->slug = strtolower(str_replace(' ', '-', $name));
        $category->name = $request->name; 
        $category->slug = strtolower(str_replace(' ', '-', $request->name));
        $category->department()->associate($request->department_id);    
        $category->thumbnail = $this->path.'/'.$imageName;             
        $category->save();

        $request->src->move(public_path($this->path), $imageName);
        $image = new Image;
        $image->type = 'Thumbnail';
        $image->src = $this->path.'/'.$imageName;
        $category->images()->save($image); 
        
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
    public function edit(Category $category)
    {
        $title = $category->name.': Edit';
        $departments = Department::orderBy('name', 'asc')->get();
        return view('backend.settings.category.edit', compact('departments', 'category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = trim(preg_replace('/\s\s+/', ' ', $request->name)); 
        $category->department()->associate($request->department_id);    
        $category->save();
        
        return redirect('dashboard/categories')->withSuccess('Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->images()->each(function ($item, $key) {
            if(file_exists('public/'.$item->src))
            {
                unlink('public/'.$item->src);
            }
            $item->delete();
        });

        $category->delete();

        return redirect('categories')->withSuccess('Deleted Success!');
    }
}

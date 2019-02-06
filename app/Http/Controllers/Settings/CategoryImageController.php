<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Models\Settings\Category;

class CategoryImageController extends Controller
{
    private $path = "images/Category";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $images = $category->images()->get();
        $title = $category->name." All Images";
        return view('backend.settings.category.images.index', compact('images', 'category', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $images = $category->images()->get();      
        $title = $category->name.": Add Images";
        return view('backend.settings.category.images.create', compact('images', 'category', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $request->validate(['src' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:400']);
        $imageName = time().'.'.$request->src->getClientOriginalExtension();
        $request->src->move(public_path($this->path), $imageName);
        
        $image = new Image;
        $image->type = $request->type;
        $image->src = $this->path.'/'.$imageName;
        $category->images()->save($image);  

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
    public function edit($category_id, $image_id)
    {
        $image = Image::find($image_id);
        $title = $image->imageable->name.': Edit Image';
        return view('backend.settings.category.images.edit', compact('title', 'category_id', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Image $image)
    {    

        if($request->has('src'))
        {
            $category->thumbnail = $request->src;
            $category->save();
        }
        else
        {
            $image->status = $request->status;
            $image->save();
        }              

        return redirect("dashboard/categories/$category->slug/images")->withSuccess('Success');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $category_id, $image_id)
    {
        if(file_exists('public/'.$request->avatar))
        {
            unlink('public/'.$request->avatar);
        }
        Image::find($image_id)->delete();
        return back()->withSuccess("Delation Success!");
    }
}

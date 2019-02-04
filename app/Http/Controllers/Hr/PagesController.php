<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hr\Page;

class PagesController extends Controller
{
    protected $path = 'backend.hr.pages.';
    protected $route_name = "pages";
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {             
        $page_title = "Pages";
        $name = $this->route_name;
        $pages = Page::orderBy('name', 'asc')->get();
        return view($this->path.'index', compact('name', 'page_title', 'pages'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Page";
        return view($this->path.'create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Page;
        $data->name = $request->name;
        $data->slug = str_slug($request->name, "-");
        $data->description = $request->description;
        $data->save();
        return back()->withSuccess("Success!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //dd($page);
        
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page_title = $page->name.": Edit";
        return view($this->path.'edit', compact('page_title', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $data = $page;
        $data->name = $request->name;
        $data->description = $request->description;        
        $data->save();

        return redirect('dashboard/pages')->withSuccess("Success!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back()->withSuccess("Success!");
    }
}

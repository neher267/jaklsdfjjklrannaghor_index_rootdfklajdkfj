<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\Models\Settings\Area;
use App\Models\Settings\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::orderBy('name', 'asc')->get();
        $title = "All Branches";
        return view('backend.settings.branch.index', compact('branches', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::orderBy('name', 'asc')->get();
        return view('backend.settings.branch.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        
        $branch = new Branch;
        $branch->name = $name;
        $branch->slug = str_slug($name, '-');       
        $branch->area()->associate($request->area_id);
        $branch->save();

        return back()->withSuccess('Create Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $title = $branch->name. ": Edit";
        $areas = Area::orderBy('name', 'asc')->get();
        return view('backend.settings.branch.edit', compact('areas', 'title', 'branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        $branch->area()->associate($request->area_id);
        $branch->save();

        return redirect('branches')->withSuccess('Create Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}

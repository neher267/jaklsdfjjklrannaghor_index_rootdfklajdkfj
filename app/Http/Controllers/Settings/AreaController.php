<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Area;
use App\Models\Settings\District;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('name', 'asc')->get();
        return view('backend.settings.area.index', compact('areas'));
    }

    public function branches(Area $area)
    {
        $branches = $area->branches()->get();
        $title = $area->name. ": All Branches";
        return view('backend.settings.branch.index', compact('branches', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.settings.area.create', compact('districts'));
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
        
        $area = new Area;
        $area->name = $name;
        $area->slug = str_slug($name, '-');
        $area->district()->associate($request->district_id);
        $area->save();
        return back()->withSuccess('Create Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.settings.area.edit', compact('districts', 'area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $area->name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        $area->district()->associate($request->district_id);
        $area->save();
        return redirect('areas')->withSuccess('Create Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return back()->withSuccess('Deleted Success!');
    }
}

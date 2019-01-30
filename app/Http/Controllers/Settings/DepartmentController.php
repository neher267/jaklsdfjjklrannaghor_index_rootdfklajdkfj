<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings\Department;
use App\Models\Hr\Product;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name', 'asc')->get();
         return view('backend.settings.department.index', compact('departments'));
    }

    public function categories(Department $department)
    {
        $categories = $department->categories()->get();
        $title = $department->name.": All Categories";
        return view('backend.settings.category.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.department.create');
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
        
        $department = new Department;
        $department->name = $name;
        $department->slug = str_slug($name, '-');
        $department->save();
        return back()->withSuccess('Create Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $title = $department->name. ': Edit';
        return view('backend.settings.department.edit', compact('department', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        $department->save();

        return redirect('departments')->withSuccess('Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back()->withSuccess('Deleted Success!');
    }
}

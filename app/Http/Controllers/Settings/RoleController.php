<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Roles\EloquentRole as Role;
use Cartalyst\Sentinel\Users\EloquentUser as User;

class RoleController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('weight', 'desc')->get();
        return view('backend.settings.role.index', compact('roles'));
    }

    public function users(Role $role)
    {
        $title = $role->name.': All Users';
        $users = $role->users()->get();
        return view('backend.hr.user.index', compact('users', 'title', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$data = $request->validate([
    		'name' => 'required|string | min:3 | max:50',        
    	]);

        $name = trim(preg_replace('/\s\s+/', ' ', $request->name));
        
        $role = new Role;
        $role->name = $name;
        $role->slug = str_slug($name, '-');
        $role->weight = $request->weight;   
        $role->save();
         
         return back()->withSuccess('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return bank();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $title = 'Edit Role: '.$role->name;
        return view('backend.settings.role.edit', compact('role', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name = trim(preg_replace('/\s\s+/', ' ', $request->name)); 
        $role->weight = $request->weight;   
        $role->save();

        return redirect('roles')->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->withSuccess('Deleted Success!');
    }
}

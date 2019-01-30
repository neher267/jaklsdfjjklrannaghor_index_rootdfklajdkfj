<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRegisterRequest;
use App\Models\Settings\Branch;
use App\Http\Middleware\Traits\SentinelTrait;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Sentinel;

class EmployeeRegisterController extends Controller
{
    use SentinelTrait;

    /**
     * Show the form for creating a new employee.
     * Only Chairman can create employes
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = EloquentRole::orderBy('name', 'asc')->get();
        $branches = Branch::orderBy('name', 'asc')->get();
        return view('auth.register', compact('branches', 'roles'));
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRegisterRequest $request)
    {
        if($this->assigningRoleToEmployee($request->role))
        {
            $role = Sentinel::findRoleBySlug($request->role);
            $user = Sentinel::registerAndActivate($this->checkBranch($request->all()));
            $role->users()->attach($user);
            return back()->withSuccess('Success!');
        }
        else {
            return back()->withError('You Are Not Authorized!');
        }                
    }

    /**
     * If branch_id is not integer that menans this creating cemplyee for all branch
     *
     */

    private function checkBranch($data)
    {
        if($data['branch_id'] == "*")
        {
            $data['branch_id'] = null;
        }
        
        return $data;
    }
    
}

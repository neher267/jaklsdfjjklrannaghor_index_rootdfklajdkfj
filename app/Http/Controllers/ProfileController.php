<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    private $path = "images/users";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Sentinel::getUser();
        $page_title = 'Profile';
        if($user->roles()->first()->slug != 'customer'){
            return back();
        }
        return view('frontend.pages.profile', compact('user','page_title'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Sentinel::getUser();
        $page_title = 'Update Your Profile';
        return view('frontend.pages.update-profile', compact('user','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = Sentinel::getUser();

        if($request->profile_image)
        {
            if(!empty($user->profile_image)){
                unlink($user->profile_image);
            }
            $imageName = time().'.'.$request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path($this->path), $imageName);
            $user->profile_image =  $this->path.'/'.$imageName;
        }
        
        $user->address = $request->address;        
        $user->email = $request->email;        
        $user->interests = $request->interests;  
        $user->save();      

        return redirect('profile')->withSuccess('Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

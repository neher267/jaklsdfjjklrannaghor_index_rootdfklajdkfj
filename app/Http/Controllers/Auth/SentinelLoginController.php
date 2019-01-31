<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;

class SentinelLoginController extends Controller
{

    public function login()
    {
        //return view('auth.login');
        return back();
    }

    public function post_login(Request $request)
    {   
        $signup_url = url('signup');
        $previous_url = $request->session()->get('_previous');
        Sentinel::authenticate($request->all());
    	if( $user = Sentinel::check())
    	{
            if ($user->roles()->first()->slug == 'customer') {
                if ($previous_url['url'] && $previous_url['url'] != $signup_url) {
                    return back()->withSuccess('Log in success!');
                }
                return redirect('checkout')->withSuccess('Log in success!');
            }
            else{
                return redirect('/dashboard');
            }            
    	}
    	else
    		return back()->withError('Your mobile no or password is not correct!');
    }

    public function logout()
    {
        Sentinel::logout(null, true);
        return redirect('/');
    }
}

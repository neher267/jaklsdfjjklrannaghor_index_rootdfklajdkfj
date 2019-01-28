<?php

namespace App\Http\Middleware\Traits;

use Sentinel;

trait SentinelTrait
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function authorize(...$roles)
    {
        if($user = Sentinel::check()){
            $slug = $user->roles()->first()->slug;
            foreach ($roles as  $role) 
            {
                if($slug === strtolower($role))
                {
                    return true;
                    break;
                }                
            }
        }
        
        return false;        
    }

    public function managementAuthorize($roles){
        if($user = Sentinel::check()){
            $slug = $user->roles()->first()->slug;
            foreach ($roles as  $role) 
            {
                if($slug === strtolower($role))
                {
                    return true;
                    break;
                }                
            }
        }
        
        return false; 
    }
}

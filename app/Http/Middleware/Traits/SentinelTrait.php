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
    public function user_authorization(...$roles)
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

    /*
    * Employee Registration
    * Onny Heigher Managemnt can register a lower degignation employee
    */

    public function assigningRoleToEmployee($user_role_slug)
    {
        $authorization = false;

        if($administrator = Sentinel::check()){
            $administrator_role = $administrator->roles()->first();
            if ($user_role = Sentinel::findRoleBySlug($user_role_slug)) {
                if($user_role_slug != 'customer' && $administrator_role->weight > $user_role->weight)
                {
                    $authorization = true;
                }
            }           
        }
        return $authorization; 
    }
}

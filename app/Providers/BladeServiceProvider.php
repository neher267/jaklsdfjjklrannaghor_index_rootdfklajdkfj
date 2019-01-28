<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Sentinel;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('role', function(...$roles)
        {
            if(Sentinel::check())
            {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                foreach ($roles as  $role)
                {
                    if($slug === strtolower($role))
                    {
                        return true;
                        break;
                    }                
                }
                return false;
            }
            else
            {
                return;
            } 
        });

        Blade::if('guest', function(){
            return !Sentinel::check();
        });

        Blade::if('check', function(){
            return Sentinel::check();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

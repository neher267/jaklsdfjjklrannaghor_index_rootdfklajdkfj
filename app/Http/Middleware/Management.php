<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\Traits\SentinelTrait;
use Sentinel;
use Cartalyst\Sentinel\Roles\EloquentRole;

class Management
{
    use SentinelTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $menegement_roloes = EloquentRole::where('slug','!=','customer')->get()->pluck('slug');
        if($this->managementAuthorize($menegement_roloes)){
            return $next($request);
        }
        else{
            return redirect('/');
        }            
    }
}

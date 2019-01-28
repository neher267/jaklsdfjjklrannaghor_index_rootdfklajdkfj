<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Traits\SentinelTrait;
use Closure;

class AdmenMiddleware
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
        if($this->authorize('admen')) 
            return $next($request);
        else
            return redirect()->back();
    }
}

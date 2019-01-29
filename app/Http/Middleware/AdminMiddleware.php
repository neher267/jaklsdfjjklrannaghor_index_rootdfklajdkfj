<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Traits\SentinelTrait;
use Closure;

class AdminMiddleware
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
        if($this->authorize('admin'))
        {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}

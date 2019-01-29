<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use App\Http\Middleware\Traits\SentinelTrait;

class BuyerMiddleware
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
        if($this->user_authorization('admin', 'buyer')) 
            return $next($request);
        else
            return redirect()->back();
    }
}

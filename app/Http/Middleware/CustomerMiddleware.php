<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\Traits\SentinelTrait;

class CustomerMiddleware
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
        if($this->user_authorization('customer'))
        {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}

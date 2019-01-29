<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Traits\SentinelTrait;
use Closure;

class ChairmanMiddleware
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
        if($this->user_authorization('chairman'))
        {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}

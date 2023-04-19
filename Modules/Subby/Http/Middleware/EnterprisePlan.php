<?php

namespace Modules\Subby\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnterprisePlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If the customer has a enterprise subscription
        if (enterprise()) {
            return $next($request);
        }else{
            return redirect()->route('register.pro');
        }
    }
}

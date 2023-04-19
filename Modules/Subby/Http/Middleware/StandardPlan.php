<?php

namespace Modules\Subby\Http\Middleware;

use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Closure;
use Illuminate\Http\Request;

class StandardPlan
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

        // If the customer has a standard subscription
        if (standard()) {
            return $next($request);
        }else{
            return redirect()->route('register.pro');
        }

    }
}

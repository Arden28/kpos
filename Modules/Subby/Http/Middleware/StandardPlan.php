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


        // Get the plan you want to check for
        $standardMonth = Plan::find(1);
        $standardYear = Plan::find(2);

        $mediumMonth = Plan::find(3);
        $mediumYear = Plan::find(4);

        // Get the subscription for the authenticated user and plan
        $standard = PlanSubscription::where('subscriber_id', auth()->user()->id)
        ->whereIn('plan_id', [$standardMonth->id, $standardYear->id, $mediumMonth->id, $mediumYear->id])
        ->first();

        // return $standard;

        // If the customer has a standard subscription
        if ($standard) {
            return $next($request);
        }else{
            return redirect()->route('register.pro');
        }

    }
}

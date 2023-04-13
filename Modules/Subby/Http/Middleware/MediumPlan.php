<?php

namespace Modules\Subby\Http\Middleware;

use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Closure;
use Illuminate\Http\Request;

class MediumPlan
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

        // $user = User::find(auth()->user()->id);

        // // Get the plan you want to check for
        // $mediumMonth = Plan::find(3);
        // $mediumYear = Plan::find(4);

        // // Get the subscription for the authenticated user and plan
        // $medium = PlanSubscription::where('subscriber_id', auth()->user()->id)
        // ->whereIn('plan_id', [$mediumMonth->id, $mediumYear->id])
        // ->first();

        // If the customer has a medium subscription
        if (medium()) {
            return $next($request);
        }else{

            return redirect()->route('register.pro');
        }

    }
}

<?php

namespace Modules\Subby\Http\Middleware;

use App\Models\User;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Subscribed
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
        $user = User::find(auth()->user()->id);

        // $planId = PlanSubscription::where('tag', 'main')
        //     ->where('subscriber_id', $user->id)->first();

        // isSubscribedTo($planId->id)
        if ($user->subscriptions()->count() == 0) {

            return redirect()->route('register.pro');
        }
            return $next($request);

    }
}

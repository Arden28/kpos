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

        if (Auth::check()) {
            $user = User::find(Auth::user()->id);

            if (! subscribed($user->team->id)) {
                return redirect()->route('register.pro');
            }
        }

        // dd('Middleware executed'); // Add this line
        return $next($request);
    }
}

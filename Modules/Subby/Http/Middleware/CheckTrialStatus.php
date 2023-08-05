<?php

namespace Modules\Subby\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckTrialStatus
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
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);
            // Check if the user is on a free trial
            if ($user->onTrial()) {
                // Check if the trial has expired
                $trialEndsAt = $user->trialEndsAt();
                if ($trialEndsAt && Carbon::now()->gte($trialEndsAt)) {
                    // Redirect to payment page or show a payment message
                    return redirect()->route('payment.page');
                }
            }
        }

        return $next($request);
    }
}

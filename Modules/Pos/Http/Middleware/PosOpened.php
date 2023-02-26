<?php

namespace Modules\Pos\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PosOpened
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
       if (session()->has('pos_session')) {

            return $next($request);

        }else{
            session()->flash('message', __('Veuillez démarer une session'));
            return redirect()->route('app.pos.dashboard');
        }
    }
}

<?php

namespace Modules\Pos\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Pos\Entities\Pos;

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
        // $pos = Pos::find(1);
       if (session()->has('pos_session')) {

            return $next($request);

        }else{
            session()->flash('message', __("Veuillez d'abord démarer une session !"));
            return redirect()->route('app.pos.dashboard');
        }
    }
}

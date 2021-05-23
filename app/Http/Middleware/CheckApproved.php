<?php

namespace App\Http\Middleware;

use Closure;

class CheckApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((auth()->user()->approuver == 0 || auth()->user()->approuver == NULL)  && auth()->user()->grade != 'admin') {
            return redirect()->route('approval');
        }

        return $next($request);
    }
}

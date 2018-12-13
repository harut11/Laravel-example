<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotAdmin
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
        if (!Auth::check() || Auth::usher()->is_admin !== 1) {
            return redirect()->route('/');
        }
        return $next($request);
    }
}

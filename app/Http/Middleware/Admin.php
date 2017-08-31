<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(!\Auth::user()->isAdmin()) {
            session()->flash( 'message', 'You do not have sufficient permission');
            session()->flash( 'errors', 'Insufficient Permissions');

            return redirect('dashboard');
        }
        return $next($request);
    }
}

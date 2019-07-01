<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

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
        if(!Auth::user() -> admin)
        {
            Session::flash('only_admin', 'Oops! You do not have permissions to perform this action.');
            return redirect() -> route('home');
        }
        return $next($request);
    }
}

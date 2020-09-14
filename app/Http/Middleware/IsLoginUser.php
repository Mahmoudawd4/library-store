<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsLoginUser
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

        //check user is Login
        if (Auth::check() && Auth::user()->is_Admin == 0  )
        {
            return $next($request);
        }
        return redirect(route('book.list'));

    }
}

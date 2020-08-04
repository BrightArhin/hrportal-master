<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use Closure;
use Illuminate\Support\Facades\Auth;

class isAdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            if (Auth::user()->isAdmin === 0) {
                return redirect('/home');
            }
        }


        return $next($request);
    }
}

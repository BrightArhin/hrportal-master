<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isHrManager
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
        if(Auth::user()){
            if(strtoupper(Auth::user()->job->name) !== strtoupper('DEP. H. R. MANAGER') && strtoupper(Auth::user()->job->name) !== strtoupper('Hr Manager') ){
                return redirect()->back();
            }
        }
        return $next($request);
    }
}

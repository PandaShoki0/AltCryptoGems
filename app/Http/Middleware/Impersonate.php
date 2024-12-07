<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Impersonate
{
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('impersonated'))
        {
            Auth::onceUsingId($request->session()->get('impersonated'));
        }
        
        return $next($request);

     }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{

    public function handle(Request $request, Closure $next)
    {
        
           return $next($request);
    }
}

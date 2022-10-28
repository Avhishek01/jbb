<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App\Models\Employe;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{

    public function handle(Request $request, Closure $next)
    {   

        //dd(Auth::user());
            $Name = Auth::user()->name;
            
            $firstchar = substr($Name,0,1);
            //dd($firstchar);
            if($firstchar == 'A' && auth::check()){
                return $next($request);
            }else{
                return redirect('/dashboard');
            }
        
    }
    }


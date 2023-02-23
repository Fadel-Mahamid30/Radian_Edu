<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // fungsi yang digunakan untuk membatasi user yang sudah mengisi biodata dan belum
    // "no" di peruntukan untuk user yang belum mengisi biodata  
    // "yes" di peruntukan untuk user yang sudah mengisi biodata  
    public function handle(Request $request, Closure $next, $check_profile)
    {
        if($check_profile == "no"){

            if(!Auth()->user()->is_profile_complete){
                return $next($request);
            }if(Auth()->user()->is_profile_complete){
                return redirect()->route("profile");
            }else{
                abort(404);
            }

        }elseif($check_profile == "yes"){

            if(Auth()->user()->is_profile_complete){
                return $next($request);
            } if(!Auth()->user()->is_profile_complete){
                return redirect()->route("biodata.step1");
            }else{
                abort(404);
            }

        }
    }
}
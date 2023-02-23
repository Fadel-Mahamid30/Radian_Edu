<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsProfileComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
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
        abort(404);
    }
}

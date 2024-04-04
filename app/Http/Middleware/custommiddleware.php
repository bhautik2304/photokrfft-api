<?php

namespace App\Http\Middleware;

use App\Models\adminuser;
use App\Models\customer;
use Closure;
use Illuminate\Http\Request;

class custommiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->header("Authorization"));

        if ($request->header("Authorization") == null) {
            return response("bed method", 400);
        }

        $customer = customer::firstWhere("token", $request->header("Authorization"));
        $adminuser = adminuser::firstWhere("token", $request->header("Authorization"));
        if ($customer || $adminuser) {
            return $next($request);
            # code...
        } else {
            return unAuthorized("Unauthenticated");
            # code...
        }
    }
}

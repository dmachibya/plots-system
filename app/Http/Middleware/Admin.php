<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user()) {
            if (Auth::user()->role != 3) {
                if (Auth::user()->role != 1) {
                    return redirect("/dashboard");
                }
                // dd("No permission" . Auth::user()->role);
                // return redirect("/dashboard");
            }
        } else {
            return redirect("/dashboard");
        }
        return $next($request);
    }
}

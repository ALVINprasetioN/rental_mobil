<?php

namespace App\Http\Middleware;
namespace App\Http\Controllers\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facedes\Auth;
use Illuminate\Support\Facedes\Redirect;


class Admins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()||Auth::user()->role != "admin"){
            return abort(403);
        }
        return $next($request);
    }
}

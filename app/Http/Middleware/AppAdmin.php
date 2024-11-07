<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AppAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = "appadmin"): Response
    {
        if (!Auth::guard($guard)->check() || Auth::guard("appuser")->check()) {
            return redirect('/admin/connexion');
        }
        return $next($request);
    }
}
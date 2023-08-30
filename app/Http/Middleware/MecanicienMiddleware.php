<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MecanicienMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'MECANICIEN') {
            return $next($request);
        }

        return redirect()->route('mecanicienpages/dashboard'); // Redirige les autres utilisateurs vers leur tableau de bord
    }
}

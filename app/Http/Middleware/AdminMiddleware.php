<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol == 0) {
            return $next($request);
        }

        return redirect()->route('login'); // Redirige si no es admin
    }
}

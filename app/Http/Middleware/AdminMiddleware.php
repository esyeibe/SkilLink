<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Gunakan helper auth() → ini valid di Laravel 11/12
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!session('user_id')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
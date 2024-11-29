<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Мидлвар проверки на админа
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() and  Auth::user()->is_admin == 1) {
            return $next($request);
        }

        return abort(404);
    }
}

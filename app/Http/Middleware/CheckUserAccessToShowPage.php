<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserAccessToShowPage
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('message', 'Detay sayfasına erişmek için giriş yapmalısınız.');
        }

        return $next($request);
    }
}


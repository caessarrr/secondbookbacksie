<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SellerAuthenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard('seller')->check()) {
            return redirect()->route('seller.login');
        }

        return $next($request);
    }
}

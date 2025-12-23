<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AgenMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('agen')->check()) {
            return redirect('/agen/login')->with('error', 'Silakan login sebagai agen terlebih dahulu.'); //redirect diganti ke halaman login agen 
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('/admin/login')->with('error', 'Silakan login sebagai admin dulu.');  //redirect diganti ke halaman login admin
        }

        return $next($request);
    }
}

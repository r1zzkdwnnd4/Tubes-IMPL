<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BlockManagerFromAdmin
{
    public function handle($request, Closure $next)
    {
        $admin = Auth::guard('admin')->user();

        if ($admin && $admin->Departemen === 'Manager') {
            abort(403, 'Akses admin tidak diperbolehkan untuk Manager');
        }

        return $next($request);
    }
}

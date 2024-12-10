<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Mengecek role user yang login
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika role tidak cocok, redirect ke halaman lain
        return redirect('/home')->with('error', 'Kamu tidak memiliki akses ke halaman ini.');
    }
}

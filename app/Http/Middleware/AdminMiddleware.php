<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the authenticated user has the given role
        if (Auth::check() && Auth::users()->role === $role) {
            return $next($request);
        }

        // If user is not an admin, redirect them
        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}


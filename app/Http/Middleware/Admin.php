<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Or any other route you use for login
        }

        if (Auth::user()->usertype != 'admin') {
            return redirect('/'); // Redirect non-admin users
        }

        return $next($request);
    }
}

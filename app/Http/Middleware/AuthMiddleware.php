<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if ($user->usertype != 1) {
            Auth::logout();
            return redirect('/')->with('error', 'Unauthorized access. Please login with admin credentials.');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::guard('admin')->user();

        // Log user role for debugging
        // Log::info('User Role: ' . $user->role);

        if ($user && $user->role == $role) {
            return $next($request);
        }
        // Log unauthorized access for debugging
        // Log::warning('Unauthorized access attempt for role: ' . $role);

        return redirect('/login')->with('message', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        try {
            $user = Auth::user();

            if (!$user || !$user->hasAnyRole($roles)) {
                return redirect('/')->with('error', 'Unauthorized access.'); 
            }

            return $next($request);
        } catch (\Exception $exception) {
            // Log the exception for debugging purposes
            \Log::error('CheckRole Middleware Error: ' . $exception->getMessage());

            return redirect('/')->with('error', 'An error occurred. Please try again.'); 
        }
    }
}

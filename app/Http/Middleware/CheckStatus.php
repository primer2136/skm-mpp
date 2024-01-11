<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$statuses)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->status, $statuses)) {
            return redirect('/login'); // Sesuaikan dengan halaman login atau halaman yang sesuai
        }

        return $next($request);
    }
}

<?php
// app/Http/Middleware/RoleMiddleware.php

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && $user->roles()->whereIn('name', $roles)->exists()) {
            return $next($request);
        }

        return redirect('/');
    }
}

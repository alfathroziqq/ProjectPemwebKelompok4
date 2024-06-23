<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if ($user && $user->role === $role) {
            return $next($request);
        }

        // Redirect to specific URLs based on the user's role
        if ($user) {
            if ($user->role === 'administrator') {
                return redirect('/administrator');
            } elseif ($user->role === 'admin_wilayah') {
                return redirect('/admin_wilayah');
            }
        }

        abort(403, 'Forbidden');
    }
}

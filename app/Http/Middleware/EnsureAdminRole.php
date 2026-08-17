<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('admin.login');
        }

        if (!in_array($user->role, $roles, true)) {
            abort(403, 'Accès refusé : vous n\'avez pas les droits nécessaires.');
        }

        return $next($request);
    }
}

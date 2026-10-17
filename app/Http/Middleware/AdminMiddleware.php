<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Vérifier si l'utilisateur est connecté
        if (! Auth::check()) {
            return redirect()->guest(route('login'))
                ->with('error', 'Veuillez vous connecter pour accéder à l\'espace d\'administration.');
        }

        // 2. Vérifier si l'utilisateur possède les privilèges administrateur
        if (! Auth::user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN, 'Accès interdit : vous ne possédez pas les autorisations nécessaires pour accéder à l\'espace d\'administration.');
        }

        return $next($request);
    }
}

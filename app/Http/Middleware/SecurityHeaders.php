<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request and append strong security headers to the response.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        // Anti-Clickjacking : interdit l'intégration dans des iframes tierces
        if ($request->is('admin*')) {
            $response->headers->set('X-Frame-Options', 'DENY');
            // Empêche la mise en cache des données sensibles de l'administration dans l'historique du navigateur
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
            $response->headers->set('Pragma', 'no-cache');
        } else {
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        }

        // Anti MIME-Sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Protection XSS standard
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Politique de référent sécurisée
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Restriction des APIs sensibles du navigateur
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(self)');

        return $response;
    }
}

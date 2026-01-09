<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptimizeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Add caching headers for static assets
        if ($this->isStaticAsset($request)) {
            $response->header('Cache-Control', 'public, max-age=31536000'); // 1 year
        }

        // Add compression headers
        if (!$response->headers->has('Content-Encoding')) {
            $response->header('Vary', 'Accept-Encoding');
        }

        // Security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        return $response;
    }

    /**
     * Check if the request is for a static asset
     */
    private function isStaticAsset(Request $request): bool
    {
        $path = $request->path();
        
        return preg_match('/\.(jpg|jpeg|png|gif|webp|svg|css|js|woff|woff2|ttf|eot|ico)$/i', $path);
    }
}

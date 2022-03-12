<?php

declare(strict_types = 1);

namespace App\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class SecurityHeadersMiddleware
{
    protected $corsWhitelist = [
        'my-production-domain.com'
    ];

    /**
     * Handle correlation id headers from request.
     *
     * @param  Request $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (method_exists($response, 'header')) {
          $domains = '*';
          if ($request->getHost() !== 'localhost') {
              $domains = implode(', ', $this->corsWhitelist);
          }
          $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
          $response->header('Access-Control-Allow-Origin', $domains);
          $response->header('X-Frame-Options', 'SAMEORIGIN');
          $response->header('Expires', '0');
          $response->header('X-Content-Type-Options', 'nosniff');
          $response->header('Cache-Control', 'no-cache, no-store, must-revalidate, max-age=0');
          $response->header('Pragma', 'no-cache');
          $response->header('X-XSS-Protection', '1; mode=block');
          $response->header('Referrer-Policy', 'same-origin');
          $response->header('Content-Security-Policy', "script-src 'self'");
        }
        return $response;
    }
}

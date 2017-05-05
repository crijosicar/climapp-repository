<?php namespace App\Http\Middleware;

use Closure;

class ResponseMiddleware {
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        // Perform action
        
        return $response;
    }
}
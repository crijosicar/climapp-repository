<?php namespace App\Http\Middleware;

use Closure;

class AfterMiddleware {
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        dd($response);

        // Perform action

        return $response;
    }
}
<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if ($request->headers->all()['api-key'][0] != env('APP_KEY')) {
                throw new \Exception();
            }
            return $next($request);
        } catch (\Exception $e) {
            return response()->json('Unauthorized', 401);
        }
    }
}

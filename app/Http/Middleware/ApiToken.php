<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
{


    protected $middleware = [
        'cors_profile' => Spatie\Cors\CorsProfile\DefaultProfile::class,

        'default_profile' => [

            'allow_origins' => [
                '*',
            ],

            'allow_methods' => [
                'POST',
                'GET',
                'OPTIONS',
                'PUT',
                'PATCH',
                'DELETE',
            ],

            'allow_headers' => [
                'Content-Type',
                'X-Auth-Token',
                'Origin',
                'Authorization',
                'api-key',
            ],
            'max_age' => 60 * 60 * 24,
        ],
    ];

    protected $apikey = '';

    /**
     * ApiToken constructor.
     * @param array $middleware
     */
    public function __construct()
    {
        $this->apikey = env('API_KEY');
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
//        try {
//            if ($request->headers->all()['api-key'][0] != env('API_KEY')) {
//                throw new \Exception();
//            }
//            return $next($request);
//        } catch (\Exception $e) {
//            return response()->json('Unauthorized', 401);
//        }
    }
}

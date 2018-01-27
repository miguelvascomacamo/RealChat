<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $dominios = ['http://localhost:8081', 'http://localhost:8080', 'http://localhost:4200'];

        if (isset($request->server()['HTTP_ORIGIN'])) {
            $origin = $request->server()['HTTP_ORIGIN'];
            if (in_array($origin, $dominios)) {
                header('Access-Control-Allow-Origin: '.$origin);
                header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
                header('Access-Control-Allow-Methods', 'PUT, GET, DELETE, PATCH, POST, OPTIONS ');
            }
        }
        return $next($request);
    }
}

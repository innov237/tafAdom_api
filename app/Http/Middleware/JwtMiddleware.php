<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $controller = new Controller();
        try {
            $user = JWTAuth::parseToken()->authenticate();

        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return $controller->jwt(false,'INVALID_TOKEN');
            } else if ($e instanceof TokenExpiredException) {
                return $controller->jwt(false,'TOKEN_EXPIRED');
            } else if ($e instanceof TokenBlacklistedException) {
                return $controller->jwt(false,'BLACK_LISTED_TOKEN');
            } else {
                return $controller->jwt(false,'NO_TOKEN');
            }
        }
        return $next($request);
    }
} 
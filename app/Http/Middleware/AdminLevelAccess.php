<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;

class AdminLevelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if ( auth()->guard('api')->user() && auth()->guard('api')->user()->isAdmin()) {
            return $next($request);
        }

        return (new Controller())->reply(false,"NOT AUTHORIZED","Only Admin can perform this action");
    }
}

<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if ($this->auth->guard($guards)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                $msg = "Please Login First";
                return response()->json($msg, 401);
            }

            return redirect()->guest(route('login'));
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SponsorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next, $role = null, $guard = null)
    {
        if(Auth::guard('sponsor')->check()){

            return $next($request);
        }

        return redirect()->route('error.page')->with([
            'errorCode' => 403,
            'errorMessage' => 'Unauthorized Action'
        ]);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminsOnly
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
        /*check if the user has the role title of the admin, if not then a Response instance will be given in which the
        user will be sent to a HTTP_FORBIDDEN page  */
        if (auth()->user()->role->title !== 'admin'){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request); //continue with the request
    }
}

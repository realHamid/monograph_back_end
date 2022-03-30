<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class ApiCustomAuth
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

        $user = User::where(['api_token' => $request->api_token]);
        if(empty($request->token) || $request->token != "b58ac01c6c7a9fb5ffd1a5d9c7d68955" || $user->get()->count() <= 0 ){
            return redirect("/api/notallowed");
        }

        return $next($request);
    }
}

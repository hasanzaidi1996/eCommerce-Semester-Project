<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        // check if the user is on signup path and the session is "user", then
        // the user will redirect to the home page
        if(($request->path() == "signup" || $request->path() == "login") && $request->session()->has('user')) {
            return redirect("/home");
        }
        
        // $user_name = $request->session()->get('user_name');
        // if($request->path() == "/signup" && $request->user() == $user_name) {
        //     return redirect("/home");
        // }
        return $next($request);
    }
}

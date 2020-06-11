<?php

namespace TestCMS\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleOrSuperadmin
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

        $user = Auth::user();
        if ($request->ip() !== $user->ip && $user->ip !== "*"){
            abort(403,"Forbidden");
        }

        if ($user->faculty_id !== 0 || $user->roles->count() > 0){
            view()->share('authUser',Auth::user());
            return $next($request);
        }else{
            dd("You Not Have Permissions Please Contact Site Administrator");
        }
    }
}

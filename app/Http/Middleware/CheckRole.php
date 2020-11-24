<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($role == 'guest'){
            if(!Auth::guest())
                return redirect(route('home'));
        }
        elseif(Auth::user()->role != $role)
            return redirect(route('home'));

        return $next($request);
    }
}

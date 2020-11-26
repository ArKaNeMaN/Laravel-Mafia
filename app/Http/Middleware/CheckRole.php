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
        switch ($role) {
            case 'any':
                if(!Auth::check())
                    return redirect(route('login'));
            break;

            case 'guest':
                if(!Auth::guest())
                    return redirect(route('home'));
            break;

            default:
                if(!Auth::check())
                    return redirect(route('login'));
                if(Auth::user()->role != $role)
                    return redirect(route('home'));
            break;
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Role
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
        if (!Auth::check()) {
            return redirect('signIn');
        }
        $user = Auth::user();

        if ($user->isAdministrator()) {
            return $next($request);
        }
        return redirect('signIn');
    }
}

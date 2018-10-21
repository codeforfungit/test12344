<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            $authUser = Auth::user();

            if ($authUser->authUserRoleCount() > 1) {

                if ($authUser->isRoleInSession()) {

                    return $next($request);
                }

                return redirect('select-role-list');
            }

            if ($authUser->authUserRoleCount() == 1) {

                if ($authUser->isRoleInSession()) {

                    return $next($request);
                }

                $authUser->setRoleInSession($authUser->userHasOneRole()->id);

                return $next($request);
            }

            Auth::logout();

            return redirect('/login');
        }
        return redirect('/');

    }
}

<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        $models = ['addresses', 'roles'];
        $user = User::with($models)->find(Auth::id());
        $role = $user->roles->name;
        // dd($role);
        $role_array = explode("|", $roles);
        if (in_array($role, $role_array)) {
            return $next($request);
        }

        return redirect('/');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class PublishPosts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu người dùng đã đăng nhập và có vai trò admin hoặc editor
        if (Auth::check()) {
            $user = Auth::user();
            $isAdminOrEditor = $user->role === Role::ROLE_ADMIN || $user->role === Role::ROLE_EDITOR;

            if ($isAdminOrEditor) {
                return $next($request);
            }
        }

         // Người dùng không có quyền, trả về lỗi 403
         return response()->json(['error' => 'Access denied.'], 403);
    }
}

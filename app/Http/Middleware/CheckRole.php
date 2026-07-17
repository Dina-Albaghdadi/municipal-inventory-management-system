<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        // التحقق من تسجيل الدخول ومن أن دور المستخدم ضمن الأدوار المسموحة 
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            abort(403, 'Unauthorized action. This page is for ' . implode(' or ', $roles) . ' only.');
        }

        return $next($request);
    }
}
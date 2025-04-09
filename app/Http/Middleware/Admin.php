<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // استخدام الحارس الافتراضي أو حارس مخصص
        if (!Auth::guard('web')->check()) {
            return redirect('/etharadmin')->with('error', 'You must be logged in to access this page.');
        }

        // التحقق مما إذا كان المستخدم الحالي ليس Admin
        if (Auth::guard('web')->user()->role !== 'admin') {
            return redirect('/etharadmin')->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}

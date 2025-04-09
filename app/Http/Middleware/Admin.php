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
        if (!Auth::guard('admin')->check()) {
            return redirect('/etharadmin')->with('error', 'You must be logged in as an admin to access this page.');
        }

        // الحصول على المستخدم من guard الخاص بالأدمن
        $user = Auth::guard('admin')->user();

        // التحقق مما إذا كان هذا المستخدم موجود في جدول الـ admins
        if (!\App\Models\Admin::find($user->id)) {  // يمكن هنا فحصه إذا كان موجودًا في جدول الـ admins
            return redirect('/etharadmin')->with('error', 'You are not authorized to access this page.');
        }

        // إذا كان كل شيء صحيح، يمكن متابعة الطلب
        return $next($request);
    }
}


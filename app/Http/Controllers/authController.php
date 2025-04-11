<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\User as AppUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerificationCodeMail;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'verifyCode', 'resendVerificationCode']]);
    }

    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */


    public function register(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(), // كل الرسائل في Array
            ], 422);
        }
        

        // توليد كود التحقق
        $verificationCode = Str::random(6); // مثال: "a8B3fK"

        // إنشاء المستخدم بدون تسجيل الدخول
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'verification_code' => $verificationCode,
            'is_verified' => false,
        ]);


        Mail::to($request->email)->send(new VerificationCodeMail($verificationCode));


        return response()->json([
            'message' => 'تم إرسال كود التحقق إلى بريدك الإلكتروني.',
        ]);
    }


    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
        ]);

        // البحث عن المستخدم بناءً على البريد والكود
        $user = User::where('email', $request->email)
            ->where('verification_code', $request->code)
            ->first();

        if (!$user) {
            return response()->json(['error' => 'الكود غير صحيح أو البريد غير موجود.'], 400);
        }

        // إذا تم التحقق من الكود، قم بتحديث حالة المستخدم
        $user->is_verified = true;
        $user->verification_code = null;
        $user->save();

        $token = Auth::login($user);

        return $this->respondWithToken($token);
    }

    public function resendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // البحث عن المستخدم بناءً على البريد
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'البريد غير موجود.'], 400);
        }

        // توليد كود التحقق جديد
        $verificationCode = Str::random(6); // مثال: "a8B3fK"
        $user->verification_code = $verificationCode;
        $user->save();

        Mail::to($request->email)->send(new VerificationCodeMail($verificationCode));

        return response()->json([
            'message' => 'تم إرسال كود التحقق إلى بريدك الإلكتروني.',
        ]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all(), // كل الرسائل في Array
            ], 422);
        }
        
        $credentials = $request->only('email', 'password');

        if ($token = Auth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(Auth::user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => Auth::user(),
        ]);
    }
}

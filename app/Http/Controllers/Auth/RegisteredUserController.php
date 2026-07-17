<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // 1. التحقق من البيانات المرسلة من فورم التسجيل
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. حفظ البيانات (السطر 30 الذي كان يسبب الايرور في صورتك [1])
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'full_name' => $request->name, // استخدام الاسم كـ Full Name مؤقتاً
            'password' => Hash::make($request->password),
            'role' => 'worker',    // القيمة الافتراضية كما في الـ ERD [2]
            'status' => 'active', // حالة الحساب الافتراضية
            'warehouse_id' => null, // اتركيه null إذا كانت قاعدة البيانات تسمح بذلك
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}
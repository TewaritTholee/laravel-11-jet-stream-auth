<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // ตรวจสอบอินพุต
        $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        // ตรวจสอบว่าอินพุตเป็นอีเมลหรือชื่อผู้ใช้
        $login = $request->input('login');
        $credentials = ['password' => $request->input('password')];

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $login;
        } else {
            $credentials['username'] = $login;
        }



        // พยายามเข้าสู่ระบบผู้ใช้
        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'login' => __('ข้อมูลประจำตัวที่ให้ไว้ ไม่ตรงกับบันทึกภายในระบบ'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');

    }


    public function destroy(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}


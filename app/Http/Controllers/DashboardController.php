<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     // กำหนด middleware auth เพื่อป้องกันผู้ใช้ที่ไม่ได้เข้าสู่ระบบ
    //     $this->middleware('auth');
    // }


    public function index()
    {
        // ดึงข้อมูลผู้ใช้ที่ล็อกอิน
        $user = Auth::user();

        // ส่งข้อมูลผู้ใช้ไปยังวิว
        return view('user.dashboard', [
            'name' => $user->name,
            'email' => $user->email,
            'username' => $user->username,
            'phone' => $user->phone,
            'position' => $user->position,
        ]);
    }

}


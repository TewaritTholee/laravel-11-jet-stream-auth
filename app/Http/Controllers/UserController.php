<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('user.register');
    }

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'phone' => 'required|string|max:20|unique:users',
    //         'username' => 'required|string|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->route('user.register')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect()->route('user.register')->with('success', 'สมัครสมาชิกลูกค้าสำเร็จ');
    // }



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return Response::json([
            'success' => true,
            'message' => 'เพิ่มข้อมูลลูกค้าสำเร็จ'
        ]);
    }


    // public function updateProfile(Request $request)
    // {
    //     // ตรวจสอบคำขอที่เข้ามา
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'username' => 'required|string|max:255',
    //         'phone' => 'required|string|max:20',
    //         'position' => 'required|string|in:user,admin,manager,staff',
    //     ]);

    //     // อัพเดตโปรไฟล์ผู้ใช้ในฐานข้อมูล
    //     $user = auth()->user(); // หรือดึงข้อมูลผู้ใช้ด้วย ID หากจำเป็น
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->username = $request->input('username');
    //     $user->phone = $request->input('phone');
    //     $user->position = $request->input('position');
    //     $user->save();

    //    // เปลี่ยนเส้นทางกลับพร้อมข้อความแสดงความสำเร็จ
    //     return redirect()->back()->with('success', 'ข้อมูลได้ถูกอัพเดตเรียบร้อยแล้ว');
    // }


    public function updateProfile(Request $request)
    {
        // ตรวจสอบคำขอที่เข้ามา
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|in:user,admin,manager,staff',
        ]);

        // อัพเดตโปรไฟล์ผู้ใช้ในฐานข้อมูล
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->position = $request->input('position');
        $user->save();

        // ส่งกลับข้อมูลในรูปแบบ JSON
        return Response::json([
            'success' => true,
            'message' => 'ข้อมูลได้ถูกอัพเดตเรียบร้อยแล้ว',
            'user' => $user
        ]);
    }
}


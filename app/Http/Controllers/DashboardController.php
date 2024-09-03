<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class DashboardController extends Controller
// {
//     /**
//      * Show the dashboard.
//      *
//      * @return \Illuminate\View\View
//      */
//     public function index()
//     {
//         // Return the view for the dashboard
//         return view('dashboard');
//     }
// }


class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     // กำหนด middleware auth เพื่อป้องกันผู้ใช้ที่ไม่ได้เข้าสู่ระบบ
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('dashboard');
    }
}


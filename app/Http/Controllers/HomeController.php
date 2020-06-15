<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // auth()->user()->role == 'admin';
        // return view('admin.home-admin');

        if (Auth::user()->user_status == 1) {

            if (Auth::user()->role == 'admin') {
                // dd(Auth::user()->name);
                $active = User::where('user_status', '0')->get();
                return view('admin.home-admin', compact('active'));
            } elseif (Auth::user()->role == 'personal') {
                // dd(Auth::user()->name);
                $news = News::all();
                $user = User::all();
                return view('user.home-user', compact('news', 'user'));
            } elseif (Auth::user()->role == 'student') {
                // dd(Auth::user()->name);
                $news = News::all();
                $user = User::all();
                return view('user.home-user', compact('news', 'user'));
            }
        } elseif (Auth::user()->user_status == 0) {
            Auth::logout();
            return redirect()->route('login')->with('message', 'กรุณารอ การยืนยันการสมัคร จากแอดมิน!!');
        }

        // else {
        //     return redirect()->back()->withErrors('อีเมล หรือ รหัสผ่าน ไม่ถูกต้อง!! กรุณากรอกข้อมูลให้ถูกต้อง');
        // }
    }
}

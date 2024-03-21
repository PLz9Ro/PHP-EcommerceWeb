<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function login_admin()
    {

        if (!empty(Auth::check() && Auth::user()->role == 1)) {
        }
        return view("admin.login");
    }
    public function auth_login_admin(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password, 'role' => 1 , 'status'=> 1])) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Please entrer current email and password');
        }
    }
    public function logout_admin()
    {
        Auth::logout();
        return redirect("admin");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // fungsi yang digunakan untuk menampilkan form login
    public function form_login(){
        return view("auth.login", [
            "title" => "Radian Edu"
        ]);
    }

    // fungsi yang digunakan untuk melakukan login
    public function authentication(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:100'],
            'password' => ['required', "min:6"],
        ]);
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/profile');
        }
 
        return back()->withErrors([
            'email' => 'Akun yang dimasukan tidak terdaftar!',
        ])->onlyInput('email');

    }
}


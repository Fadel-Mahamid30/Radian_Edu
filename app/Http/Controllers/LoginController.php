<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("auth.login", [
            "title" => "Login"
        ]);
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'Akun yang dimasukan tidak terdaftar!',
        ])->onlyInput('email');

    }
}


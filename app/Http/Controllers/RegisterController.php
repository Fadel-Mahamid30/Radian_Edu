<?php

namespace App\Http\Controllers;

use App\Models\Confirm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // merupakan sebuah variable yang menampung pesan yang akan di keluarkan ketika inputan error.
    protected $massage = [
        "nama.required" => "Kolom nama harus diisi.",
        "nama.max" => "Karakter yang di inputkan terlalu banyak.",

        "email.required" => "Kolom email haru diisi.",
        "email.max" => "Karakter yang di inputkan terlalu banyak.",
        "email.unique" => "Email sudah terdaftar.",
        "email.email" => "Email tidak valid.",

        "no_telepon.required" => "Kolom nomor telepon tidak boleh kosong.",
        "no_telepon.min" => "Masukan nomor minimal 10 angka.",
        "no_telepon.numeric" => "Data yang di inpuntkan tidak valid.",
        "no_telepon.unique" => "Nomor HP sudah terdaftar.",

        "password.required" => "Kolom password tidak boleh kosong.",
        "password.min" => "Masukan minimal 6 karakter.",
        "password.max" => "Karakter yang di inputkan terlalu banyak."
    ];

    // fungsi yang digunakan untuk menampilkan form registrasi
    public function form_registrasi(){
        return view("auth.register", [
            "title" => "Register"
        ]);
    }

    // fungsi yang digunakan untuk melakukan registrasi
    public function create_user(Request $request){

        $validate = $request->validate([
            "nama" => "required|max:255",
            "email" => "required|max:100|unique:users|email",
            "no_telepon" => "required|min:11|numeric|unique:users",
            "password" => "required|min:6|max:255"
        ], $this->massage);

        try {

            $password = Hash::make($request->password);
            $user = User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "no_telepon" => $request->no_telepon,
                "password" => $password
            ]);

            return redirect()->route("login")->with("success", "Registrasi berhasil, sekarang anda bisa login");

        } catch (\Throwable $th) {

            return redirect()->route("register")->with("failed", "Registrasi gagal, mohon untuk registrasi ulang.");
            
        }

    }
}

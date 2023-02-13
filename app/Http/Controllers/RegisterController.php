<?php

namespace App\Http\Controllers;

use App\Models\Confirm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
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

    public function index(){
        return view("auth.register", [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){

        $validate = $request->validate([
            "nama" => "required|max:100",
            "email" => "required|max:100|unique:users|email:dns",
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

            Confirm::create([
                "user_id" => $user->id
            ]);

            return redirect()->route("login")->with("success", "Regiter berhasil, sekarang anda bisa login");

        } catch (\Throwable $th) {
            // return response()->json("failed".$th);
            return redirect()->route("register")->with("failed", "Regitrasi gagal, mohon untuk register ulang.");
        }

    }
}

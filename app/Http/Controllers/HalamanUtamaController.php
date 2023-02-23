<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanUtamaController extends Controller
{
    public function halaman_utama(){
        return view("home.halaman_utama", [
            "title" => "Radian Edu"
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HalamanUtamaController extends Controller
{
    public function halaman_utama(){
        
        if($harga = Price::first()){
            $result = $harga;
        }else{
            $result = [
                "min_harga" => 0,
                "max_harga" => 9999999,
                "keuntungan" => 10
            ];
        }

        $guru = User::latest()->CariGuru([""])->where("is_profile_complete", true)->where("is_micro_teaching_complete", true)->paginate(8)
        ->withQueryString(request("domisili"), request("mata_pelajaran"));
                
        return view("home.halaman_utama", [
            "title" => "Radian Edu",
            "guru" => $guru,
            "keuntungan" => $result->keuntungan,
        ]);
    }

    public function daftar_guru(Request $request){

        if($harga = Price::first()){
            $result = $harga;
        }else{
            $result = [
                "min_harga" => 0,
                "max_harga" => 9999999,
                "keuntungan" => 10
            ];
        }
        
        $guru = User::latest()->CariGuru([
            "domisili" => $request->domisili,
            "mata_pelajaran" => $request->mata_pelajaran
        ])->where("is_profile_complete", true)->paginate(16)
        ->withQueryString(request("domisili"), request("mata_pelajaran"));

        return view("home.daftar_guru", [
            "title" => "Radian Edu",
            "guru" => $guru,
            "keuntungan" => $result->keuntungan,
            "domisili" => $request->domisili,
            "mata_pelajaran" => $request->mata_pelajaran,
        ]);
    }

    public function detail_guru($key){
        try {

            $key = decrypt($key);
            $guru = User::with(["domisili_mengajar.kecamatan", "minat_mengajar.mata_pelajaran.tingkatan"])
                    ->where("id", $key)->where("is_profile_complete", true)
                    ->whereHas("roles", function($query){
                        $query->where("name", "user");
                    })->first();
            
            if($guru){

                if($harga = Price::first()){
                    $result = $harga;
                }else{
                    $result = [
                        "min_harga" => 0,
                        "max_harga" => 9999999,
                        "keuntungan" => 10
                    ];
                }

                return view("home.detail_guru", [
                    "title" => "Radian Edu",
                    "guru" => $guru,
                    "keuntungan" => $result->keuntungan,
                ]);
            }
            abort(404);

        } catch (\Throwable $th) {
            abort(404);
        }
    }

}

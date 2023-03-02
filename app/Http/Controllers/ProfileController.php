<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    // menampilkan profile guru 
    public function profile(){

        $user = auth()->user();
        $this->authorize("is_profile_complete_yes", $user);

        return view("profile.profile", [
            "title" => "Radian Edu",
            "user" => $user
        ]);

    }

    // untuk menampilkan form edit profil
    public function profile_edit(){

        $user = auth()->user();
        $this->authorize("is_profile_complete_yes", $user);

        $mata_pelajaran = Subjects::latest()->paginate(10);
        $domisili = DB::table("provinces")
                ->join("regencies", "provinces.id", "=", "regencies.province_id")
                ->join("districts", "regencies.id", "=", "districts.regency_id")
                ->select("provinces.name as provinsi" ,"regencies.name as kabupaten", "districts.name as kecamatan")->paginate("30");
        
        if ($mata_pelajaran && $domisili) {
            return view("profile.profile_edit", [
                "title" => "Radian Edu",
                "user" => $user,
                "mata_pelajaran" => $mata_pelajaran,
                "domisili" => $domisili
            ]);
        }else{
            abort(404);
        }

    }

    public function exp(Request $request){
        return $request->all();
    }
}

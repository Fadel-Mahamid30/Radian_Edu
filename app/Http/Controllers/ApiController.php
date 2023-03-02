<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    // untuk select domisili pada form biodata 2 dan select domisili mengajar pada form biodata 2
    public function getkabupaten(Request $request){
        $get_kabuptan = DB::table("provinces")
                        ->join("regencies", "provinces.id", "=", "regencies.province_id")
                        ->select("regencies.id", "regencies.name")
                        ->where("provinces.name", $request->provinsi)->get();
        
        return response()->json($get_kabuptan);
    }

    // untuk select domisili pada form biodata 2
    public function getkecamatan(Request $request){
        $get_kecamatan = DB::table("regencies")
                        ->join("districts", "regencies.id", "=", "districts.regency_id")
                        ->select("districts.id", "districts.name")
                        ->where("regencies.name", "like", $request->kabupaten)->get();
        
        return response()->json($get_kecamatan);
    }

    // untuk select kabupaten pada domisili mengajar pada form biodata 2
    public function getkabupatenMengajar(Request $request){
        $get_kabuptan = DB::table("provinces")
                        ->join("regencies", "provinces.id", "=", "regencies.province_id")
                        ->select("regencies.id", "regencies.name")
                        ->where("provinces.name", $request->provinsi)->get();
        
        return response()->json($get_kabuptan);
    }

    // untuk select kecamatan pada domisili mengajar pada form biodata 2
    public function getAllDataDomicile(Request $request){
        $get_data = DB::table("provinces")
                        ->join("regencies", "provinces.id", "=", "regencies.province_id")
                        ->join("districts", "regencies.id", "=", "districts.regency_id")
                        ->select("provinces.name as provinsi", "regencies.name as kabupaten", "districts.name as kecamatan", "districts.id")
                        ->where("regencies.name", $request->kabupaten)->get();;

        return response()->json($get_data);
    }

    // untuk select minat mengajar pada form biodata 2
    public function getmapel(Request $request){
        $tingkatan = explode("#-#", $request->tingkatan);
        $get_mapel = DB::table("educational_levels")
                        ->join("subjects", "educational_levels.id", "=", "subjects.tingkatan_id")
                        ->select("educational_levels.tingkatan","subjects.id", "subjects.mata_pelajaran")
                        ->where("educational_levels.id", $tingkatan[0])->get();

        return response()->json($get_mapel);
    }
    
    public function getdomisili_mengajar(Request $request){

        $domisili = DB::table("provinces")
                ->join("regencies", "provinces.id", "=", "regencies.province_id")
                ->join("districts", "regencies.id", "=", "districts.regency_id")
                ->select("provinces.name as provinsi" ,"regencies.name as kabupaten", "districts.name as kecamatan", "districts.id as kecamatan_id")
                ->where("provinces.name", "like", "%" . request("q") . "%")
                ->orWhere("regencies.name", "like", "%" . request("q") . "%")
                ->orWhere("districts.name", "like", "%" . request("q") . "%")
                ->paginate("30");

        return response()->json($domisili);
    }

    public function getminat_mengajar(Request $request){
        $mapel = DB::table("educational_levels")
                ->join("subjects", "educational_levels.id", "=", "subjects.tingkatan_id")
                ->select("educational_levels.tingkatan as tingkatan","subjects.id as mapel_id", "subjects.mata_pelajaran as mata_pelajaran")
                ->where("educational_levels.tingkatan", "like", "%" . request("q") . "%")
                ->orWhere("subjects.mata_pelajaran", "like", "%" . request("q") . "%")
                ->paginate(20);

        return response()->json($mapel);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\EducationalLevel;
use App\Models\KegiatanMengajar;
use App\Models\Province;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class BiodataController extends Controller
{

    public function biodata_step1(){
        return view("biodata.biodata_step1",[
            "title" => "Biodata"
        ]);
    }

    // !jangan lupa tambah auth untuk nama dan email
    public function biodata_step2(Request $request){
        $biodata = $request->session()->get('biodata');
        return view("biodata.biodata_step2",[
            "title" => "Biodata",
            "provinsi" => Province::all(),
            "biodata" => $biodata
        ]);
    }

    public function biodata_create2(Request $request){
        
        if($request->aktivitas == null && $request->lainnya == true){
            $data = [
                "foto" => "required|max:2024|file|mimes:png,jpeg,jpg",
                "cv" => "required|max:2024|file|mimes:pdf",
                "tanggal_lahir" => "required|date",
                "asal_ptn" => "required|max:100",
                "jurusan" => "required|max:100",
                "ipk" => "required|numeric",
                "provinsi" => "required|max:100",
                "kabupaten" => "required|max:100",
                "kecamatan" => "required|max:100",
                "alamat" => "required",
                "apply" => "required|max:100",
                "empty_activity" => "required",
                "aktivitas_lainnya" => "required",
            ];
        }elseif($request->aktivitas == null){
            $data = [
                "foto" => "required|max:2024|file|mimes:png,jpeg,jpg",
                "cv" => "required|max:2024|file|mimes:pdf",
                "tanggal_lahir" => "required|date",
                "asal_ptn" => "required|max:100",
                "jurusan" => "required|max:100",
                "ipk" => "required|numeric",
                "provinsi" => "required|max:100",
                "kabupaten" => "required|max:100",
                "kecamatan" => "required|max:100",
                "alamat" => "required",
                "apply" => "required|max:100",
                "empty_activity" => "required",
            ];
        }elseif($request->lainnya == true){
            $data = [
                "foto" => "required|max:2024|file|mimes:png,jpeg,jpg",
                "cv" => "required|max:2024|file|mimes:pdf",
                "tanggal_lahir" => "required|date",
                "asal_ptn" => "required|max:100",
                "jurusan" => "required|max:100",
                "ipk" => "required|numeric",
                "provinsi" => "required|max:100",
                "kabupaten" => "required|max:100",
                "kecamatan" => "required|max:100",
                "alamat" => "required",
                "apply" => "required|max:100",
                "aktivitas_lainnya" => "required",
            ];
        }else{
            $data = [
                "foto" => "required|max:2024|file|mimes:png,jpeg,jpg",
                "cv" => "required|max:2024|file|mimes:pdf",
                "tanggal_lahir" => "required|date",
                "asal_ptn" => "required|max:100",
                "jurusan" => "required|max:100",
                "ipk" => "required|numeric",
                "provinsi" => "required|max:100",
                "kabupaten" => "required|max:100",
                "kecamatan" => "required|max:100",
                "alamat" => "required",
                "apply" => "required|max:100",
                "aktivitas.*" => "max:100",
            ];
        }

        $validate = $request->validate($data);
        if($request->file("foto") && $request->file("cv")){
            $cv = $request->file("cv")->getClientOriginalName();
            $cv = explode(".", $cv);
            $cv = $cv[0] . "_" . time()  . "_" .  round(microtime(true) * 1000) . "." . $request->file("cv")->getClientOriginalExtension();

            $foto = $request->file("foto")->getClientOriginalName();
            $foto = explode(".", $foto);
            $foto = $foto[0] . "_" . time()  . "_" .  round(microtime(true) * 1000) . "." . $request->file("foto")->getClientOriginalExtension();
        }else{
            $foto = "";
            $cv = "";
        }
        
        try {

            $data_aktivitas = $request->aktivitas;
            if($request->aktivitas_lainnya){
                $data_aktivitas[] = $request->aktivitas_lainnya;
                $aktivitas_lainnya = $request->aktivitas_lainnya;
            }

            $aktivitas = [];
            for($i = 0; $i < count($data_aktivitas); $i++){
                $aktivitas[] = $data_aktivitas[$i];
            }

            $data = [
                "foto" => $foto,
                "cv" => $cv,
                "tanggal_lahir" => $request->tanggal_lahir,
                "asal_ptn" => $request->asal_ptn,
                "jurusan" => $request->jurusan,
                "ipk" => $request->ipk,
                "provinsi" => $request->provinsi,
                "kabupaten" => $request->kabupaten,
                "kecamatan" => $request->kecamatan,
                "alamat" => $request->alamat,
                "aktvitas" => $aktivitas
            ];

            if($request->lainnya == true){
                $data["aktivitas_lainnya"] = $aktivitas_lainnya;
                $data["lainnya"] = $request->lainnya; 
            }

            if(empty($request->session()->get('product'))){
                $biodata = new Biodata();
                $biodata->fill($data);
                $request->session()->put('biodata', $biodata);
            }else{
                $biodata = $request->session()->get('biodata');
                $biodata->fill($data);
                $request->session()->put('biodata', $biodata);
            }

            return redirect("/biodata/step3");

        } catch (\Throwable $th) {
            return response()->json(["error" => "failed" . $th]);
        }
    }

    public function biodata_step3(){
        return view("biodata.biodata_step3",[
            "title" => "Biodata",
            "provinsi" => Province::all(),
            "tingkatan" => EducationalLevel::all(),
            "kegiatan_mengajar" => KegiatanMengajar::all()
        ]);
    }

    public function tes(){
        return view("biodata.tes",[
            "title" => "Biodata",
            "tingkatan" => EducationalLevel::all(),
            "provinsi" => Province::all()
        ]);
    }

    public function tesvalue(Request $request){
        $clear = array_unique($request->list_mapel);
        
        $minat_belajar = [];
        for ($i=0; $i < count($clear); $i++) { 
            $filter = explode("-",$clear[$i]);
            $minat_belajar[] = [
                "tingkatan" => $filter[0],
                "mapel" => $filter[1],
            ];
        }

        return $minat_belajar;
    }

    public function remove(Request $request){
        $biodata = $request->session()->get('biodata');
        $cek = $request->session()->remove('biodata', $biodata);
        if($cek){
            return $cek;
        }else{
            return $biodata;
        }
    }
}

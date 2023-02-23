<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Biodata;
use App\Models\District;
use App\Models\EducationalLevel;
use App\Models\Experience;
use App\Models\InterestTeaching;
use App\Models\KegiatanMengajar;
use App\Models\Price;
use App\Models\Province;
use App\Models\Subjects;
use App\Models\TeachingDomicile;
use App\Models\Tingkatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Subset;

class BiodataController extends Controller
{
    // merupakan sebuah variable yang menampung pesan yang akan di keluarkan ketika inputan error.
    protected $massage = [

        // foto
        "foto.required" => "Kolom ini tidak boleh kosong.",
        "foto.max" => "Maksimal ukuran file 2mb.",
        "foto.file" => "Data yang dimasukkan harus berupa file.",
        "foto.mimes" => "File yang dimasukkan harus memiliki format png,jpeg,jpg.",

        // cv
        "cv.required" => "Kolom ini tidak boleh kosong.",
        "cv.max" => "Maksimal ukuran file 2mb.",
        "cv.file" => "Data yang dimasukkan harus berupa file.",
        "cv.mimes" => "File yang dimasukkan harus memiliki format pdf.",

        // nama
        "nama.required" => "Kolom ini tidak boleh kosong.",
        "nama.max" => "Data yang dimasukkan terlalu banyak.",
        
        // no_telepon
        "no_telepon.required" => "Kolom ini tidak boleh kosong.",
        "no_telepon.numeric" => "Data harus berupa angka.",
        
        // jenis_kelamin
        "jenis_kelamin.required" => "Kolom ini tidak boleh kosong.",
        "jenis_kelamin.max" => "Data yang dimasukkan terlalu banyak.",
        
        // tanggal_lahir
        "tanggal_lahir.required" => "Kolom ini tidak boleh kosong.",
        "tanggal_lahir.date" => "Data yang dimasukkan harus berupa tanggal.",
        
        // dari_pendidikan
        "dari_pendidikan.required" => "Kolom ini tidak boleh kosong.",
        "dari_pendidikan.date" => "Data yang dimasukkan harus berupa tanggal.",
        
        // sampai_pendidikan
        "sampai_pendidikan.required" => "Kolom ini tidak boleh kosong.",
        "sampai_pendidikan.date" => "Data yang dimasukkan harus berupa tanggal.",
        
        // universitas 
        "universitas.required" => "Kolom ini tidak boleh kosong.",
        "universitas.max" => "Data yang dimasukkan terlalu banyak.",

        // deskripsi_pendidikan
        "deskripsi_pendidikan.required" => "Kolom ini tidak boleh kosong.",

        // asal_ptn
        "asal_ptn.required" => "Kolom ini tidak boleh kosong.",
        "asal_ptn.max" => "Data yang dimasukkan terlalu banyak.",

        // jurusan
        "jurusan.required" => "Kolom ini tidak boleh kosong.",
        "jurusan.max" => "Data yang dimasukkan terlalu banyak.",

        // ipk
        "ipk.required" => "Kolom ini tidak boleh kosong.",
        "ipk.numeric" => "Data harus berupa angka.",

        // provinsi
        "provinsi.required" => "Kolom ini tidak boleh kosong.",
        "provinsi.max" => "Data yang dimasukkan terlalu banyak.",

        // kabupaten
        "kabupaten.required" => "Kolom ini tidak boleh kosong.",
        "kabupaten.max" => "Data yang dimasukkan terlalu banyak.",

        // kecamatan
        "kecamatan.required" => "Kolom ini tidak boleh kosong.",
        "kecamatan.max" => "Data yang dimasukkan terlalu banyak.",

        // alamat
        "alamat.required" => "Kolom ini tidak boleh kosong.",
        "alamat.max" => "Data yang dimasukkan terlalu banyak.",

        // posisi dilamar
        "posisi_dilamar.required" => "Kolom ini tidak boleh kosong.",
        "posisi_dilamar.max" => "Data yang dimasukkan terlalu banyak.",

        // kegiatan_mengajar
        "kegiatan_mengajar.required" => "Kolom ini tidak boleh kosong.",
        "kegiatan_mengajar.max" => "Data yang dimasukkan terlalu banyak.",

        // deskripsi_diri
        "deskripsi_diri.required" => "Kolom ini tidak boleh kosong.",

        // harga 
        "harga.required" => "Kolom ini tidak boleh kosong.",
        "harga.numeric" => "Data yang dimasikan harus berupa angka.",

        // dari_pengalaman.*
        "dari_pengalaman.*.required" => "Kolom ini tidak boleh kosong.",
        "dari_pengalaman.*.date" => "Data yang dimasukkan harus berupa tanggal.",

        // sampai_pengalaman.*
        "sampai_pengalaman.*.required" => "Kolom ini tidak boleh kosong.",
        "sampai_pengalaman.*.date" => "Data yang dimasukkan harus berupa tanggal.",

        // perusahaan.*
        "perusahaan.*.required" => "Kolom ini tidak boleh kosong.",
        "perusahaan.*.max" => "Data yang dimasukkan terlalu banyak.",

        // deskripsi_pengalaman.*
        "deskripsi_pengalaman.*.required" => "Kolom ini tidak boleh kosong.",

        // empty_activity
        "empty_activity.required" => "Pilih salah satu pada list kegiatan saat ini",

        // aktivitas_lainnya
        "kegiatan_lainnya.required" => "Kolom ini tidak boleh kosong.",
        "kegiatan_lainnya.max" => "Data yang dimasukkan terlalu banyak.",

        // list_minat_mengajar
        "list_minat_mengajar.required" =>  "List minat mengajar tidak boleh kosong.",

        // list_domisili_mengajar
        "list_domisili_mengajar.required" =>  "List domisili mengajar tidak boleh kosong.",

    ];

    // fungsi yang digunakan untuk meanambahkan data ke table yang saling berelasi yaitu activities(kegiatan), 
    // experiencies(pengalaman), teaching_domiciles(domisili mengajar), interest_teaching(minat mengajar)
    // serta mengupdate/membuat biodata pada tabel user.

    function createBiodata($data_user, $data_pengalaman, $data_kegiatan, $data_minat_mengajar, $data_domisili_mengajar){
        $result = DB::transaction(function () use ($data_user, $data_pengalaman, $data_kegiatan, $data_minat_mengajar, $data_domisili_mengajar){
            try {
                User::where("id", auth()->user()->id)->update($data_user);
                Activity::insert($data_kegiatan);
                InterestTeaching::insert($data_minat_mengajar);
                TeachingDomicile::insert($data_domisili_mengajar);
                Experience::insert($data_pengalaman);
  
                DB::commit();
                return true;
                
            } catch (\Throwable $th) {
                DB::rollBack();
                return false;
            }  
          });

          return $result;
    }

    // fungsi yang digunakan untuk menampilkan page informasi 1 dengan nama file biodata_step1
    public function biodata_step1(){

        $user = auth()->user();
        $this->authorize("is_profile_complete_no", $user);

        return view("biodata.biodata_step1",[
            "title" => "Biodata"
        ]);
    }

    // fungsi yang digunakan untuk menampilkan page form biodata dengan nama file biodata_step2
    public function biodata_step2(){

        $user = auth()->user();
        $this->authorize("is_profile_complete_no", $user);

        if($cek_harga = Price::first()){
            $result = $cek_harga;
        }else{
            $result = [
                "min_harga" => 0,
                "max_harga" => 9999999,
                "keuntungan" => 10
            ];
        }

        $min_harga = "Rp. ".number_format($result["min_harga"], 0, ",", "."); 
        $max_harga = "Rp. ".number_format($result["max_harga"], 0, ",", "."); 

        $harga = [
            "min_harga" => $min_harga,
            "max_harga" => $max_harga 
        ];

        return view("biodata.biodata_step2",[
            "title" => "Biodata",
            "user" => $user,
            "provinsi" => Province::all(),
            "tingkatan" => EducationalLevel::all(),
            "harga" => $harga
        ]);
    }

    public function biodata_create2(Request $request){
    
        $user = auth()->user();

        if($cek_harga = Price::first()){
            $harga = $cek_harga;
        }else{
            $harga = [
                "max_harga" => 0,
                "min_harga" => 9999999,
                "keuntungan" => 10
            ];
        }

        $min_harga = $harga["min_harga"];
        $max_harga = $harga["max_harga"];

        // untuk menambakan pesan validasi/error yang akan di gunakan untuk input harga;
        $massage_validata = $this->massage;
        $min = "Rp. ".number_format($min_harga, 0, ",", "."); 
        $max = "Rp. ".number_format($max_harga, 0, ",", "."); 
        $massage_validata["harga.min"] = "Minimal harga yang bisa di ajukan $min";
        $massage_validata["harga.max"] = "Maksimal harga yang bisa di ajukan $max";

        // merupakan variable yang menampung validasi data
        $data = [
            "foto" => "required|max:2024|file|mimes:png,jpeg,jpg",
            "cv" => "required|max:2024|file|mimes:pdf",
            "nama" => "required|max:255",
            "no_telepon" => "required|numeric",
            "jenis_kelamin" => "required|max:255",
            "tanggal_lahir" => "required|date",
            "dari_pendidikan" => "required|date",
            "sampai_pendidikan" => "required|date",
            "universitas" => "required|max:255",
            "deskripsi_pendidikan" => "required",
            "asal_ptn" => "required|max:255",
            "jurusan" => "required|max:255",
            "ipk" => "required|numeric|min:1|max:4",
            "provinsi" => "required|max:255",
            "kabupaten" => "required|max:255",
            "kecamatan" => "required|max:255",
            "alamat" => "required",
            "posisi_dilamar" => "required|max:255",
            "kegiatan_mengajar" => "required|max:255",
            "deskripsi_diri" => "required",
            "harga" => "numeric|min:$min_harga|max:$max_harga",

            "minat_mengajar" => "required",
            "domisili_mengajar" => "required",

            "dari_pengalaman.*" => "required|date",
            "sampai_pengalaman.*" => "required|date",
            "perusahaan.*" => "required|max:255",
            "deskripsi_pengalaman.*" => "required"
        ];

        if ($request->kegiatan == null && $request->checkbox_kegiatan_lainnya == false) {
            $data["empty_activity"] = "required";
        }

        if($request->checkbox_kegiatan_lainnya == true){
            $data["kegiatan_lainnya"] = "required|max:255";
        }

        if($request->minat_mengajar == null){
            $data["list_minat_mengajar"] = "required";
        }

        if($request->domisili_mengajar == null){
            $data["list_domisili_mengajar"] = "required";
        }

        // melakukan validasi data
        $validate = $request->validate($data, $massage_validata);

        // mengelola data file
        if($request->file("foto") && $request->file("cv")){
            $foto = $request->file("foto")->store("Images");
            $cv = $request->file("cv")->store("CV");
        }

        // mengelola data user
        $data_user = [
            "nama" => $request->nama,
            "no_telepon" => $request->no_telepon,
            "foto" => $foto,
            "cv" => $cv,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "dari_pendidikan" => $request->dari_pendidikan,
            "sampai_pendidikan" => $request->sampai_pendidikan,
            "universitas" => $request->universitas,
            "deskripsi_pendidikan" => $request->deskripsi_pendidikan,
            "asal_ptn" => $request->asal_ptn,
            "jurusan" => $request->jurusan,
            "ipk" => $request->ipk,
            "provinsi" => $request->provinsi,
            "kabupaten" => $request->kabupaten,
            "kecamatan" => $request->kecamatan,
            "alamat" => $request->alamat,
            "posisi_dilamar" => $request->posisi_dilamar,
            "deskripsi_diri" => $request->deskripsi_diri,
            "kegiatan_mengajar" => $request->kegiatan_mengajar,
            "harga" => $request->harga,
            "is_profile_complete" => true
        ];

        // mengelola data pengalaman
        $data_pengalaman = [];
        for ($i=0; $i < count($request->exp_input); $i++) { 
            $data_pengalaman[] = [
                "dari_pengalaman" => $request->dari_pengalaman[$i],
                "sampai_pengalaman" => $request->sampai_pengalaman[$i],
                "perusahaan" => $request->perusahaan[$i],
                "deskripsi_pengalaman" => $request->deskripsi_pengalaman[$i],
                "user_id" => $user->id,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }

        // mengelola data kegiatan
        $data_kegiatan = [];
        foreach($request->kegiatan as $rows => $row){
            $data_kegiatan[] = [
                "kegiatan" => $row,
                "user_id" => $user->id,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }

        if ($request->kegiatan_lainnya) {
            $data_kegiatan[] = [
                "kegiatan" => $request->kegiatan_lainnya,
                "user_id" => $user->id,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }

        // mengelola data minat mengajar
        $arr_minat_mengajar = array_unique($request->minat_mengajar);
        $data_minat_mengajar = [];

        foreach($arr_minat_mengajar as $rows => $row){
            $filter = explode("#-#", $row);
            if (Subjects::find($filter)) {
                $data_minat_mengajar[] = [
                    "mata_pelajaran_id" => $filter[0],
                    "user_id" => $user->id,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }


        // mengelola data domisili mengajar 
        $arr_domisili_mengajar = array_unique($request->domisili_mengajar);
        $data_domisili_mengajar = [];

        foreach ($arr_domisili_mengajar as $rows => $row) {
            $filter = explode("#-#", $row);
            if(District::find($filter)){
                $data_domisili_mengajar[] = [
                    "kecamatan_id" => $filter[0],
                    "user_id" => $user->id,
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }
        }
       
        $create_biodata = $this->createBiodata($data_user, $data_pengalaman, $data_kegiatan, $data_minat_mengajar, $data_domisili_mengajar);
        
        if(!$create_biodata){
            if($request->foto && $request->cv){
                Storage::delete($foto);
                Storage::delete($cv);
            }
            return redirect()->route("biodata.step2")->with("failed", "Gagal mengisi biodata, mohon isi kembali dengan benar");
        }

        $key = encrypt($user->email);
        return redirect()->route("biodata.step3", [$key])->with("success", "Biodata berhasil ditambahkan.");

    }

    // fungsi yang digunakan untuk menampilkan page form biodata dengan nama file biodata_step3
    public function biodata_step3($key){
        $user = auth()->user();
        $this->authorize("is_profile_complete_yes", $user);
        $this->authorize("micro_teaching_no_complete", $user);

        try {

            // melakukan pemeriksaan apakah key sama dengan email pengguna
            $key = decrypt($key);
            if($user->email !== $key){
                abort(404);
            }

            return view("biodata.biodata_step3",[
                "title" => "Biodata"
            ]);

        } catch (\Throwable $th) {
            abort(404);
        }
    }

    
}

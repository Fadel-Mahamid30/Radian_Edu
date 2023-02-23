<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        "foto",
        "cv",
        "tanggal_lahir",
        "jenis_kelamin",
        "dari_pendidikan",
        "sampai_pendidikan",
        "universitas",
        "deskripsi_pendidikan",
        "asal_ptn",
        "jurusan",
        "ipk",
        "provinsi",
        "kabupaten",
        "kecamatan",
        "alamat",
        "apply",
        "deskripsi_diri",
        "kegiatan_mengajar",
        "harga",
        // "user_id",
        "aktivitas"
    ];

    // public function aktivitas(){
    //     return $this->hasMany(Activity::class, "biodata_id");
    // }

    // public function pengalaman(){
    //     return $this->hasMany(Experience::class, "biodata_id");
    // }
    
    // public function pendidiakn(){
    //     return $this->hasOne(Education::class, "biodata_id");
    // }
    
    // public function minat_mengajar(){
    //     return $this->hasMany(InterestTeaching::class, "biodata_id");
    // }

    // public function domisili_mengajar(){
    //     return $this->hasMany(TeachingDomicile::class, "biodata_id");
    // }
}

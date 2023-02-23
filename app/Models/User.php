<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "nama",
        "email",
        "password",
        "no_telepon",
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
        "posisi_dilamar",
        "deskripsi_diri",
        "kegiatan_mengajar",
        "harga",
        "is_micro_teaching_complete",
        "status",
        "top_star",
        "is_profile_complete"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        "password",
        "remember_token",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function kegiatan(){
        return $this->hasMany(Activity::class, "user_id");
    }

    public function pengalaman(){
        return $this->hasMany(Experience::class, "user_id");
    }
    
    public function minat_mengajar(){
        return $this->hasMany(InterestTeaching::class, "user_id");
    }

    public function domisili_mengajar(){
        return $this->hasMany(TeachingDomicile::class, "user_id");
    }
}

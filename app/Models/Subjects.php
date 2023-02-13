<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        "mata_pelajaran",
        "tingkatan_id"
    ];

    public function tingkatan(){
        return $this->belongsTo(EducationalLevel::class);
    }

    public function minat_mengajar(){
        return $this->hasMany(InterestTeaching::class, "mata_pelajaran_id");
    }
}

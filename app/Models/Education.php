<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        "mulai_pendidikan",
        "sampai_pendidikan",
        "universitas",
        "deskripsi_pendidikan",
        "biodata_id"
    ];

    public function biodata(){
        return $this->belongsTo(Biodata::class);
    }
}

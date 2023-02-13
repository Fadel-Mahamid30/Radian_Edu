<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        "mulai_pengalaman",
        "sampai_pengalaman",
        "lembaga",
        "deskripsi_pengalaman",
        "biodata_id"
    ];

    public function biodata(){
       return $this->belongsTo(Biodata::class);
    }
}

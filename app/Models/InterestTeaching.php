<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestTeaching extends Model
{
    use HasFactory;

    protected $fillable = [
        "mata_pelajaran_id",
        "biodata_id"
    ];

    public function mata_pelajaran(){
        return $this->belongsTo(Subjects::class);
    }

    public function biodata(){
        return $this->belongsTo(Biodata::class);
    }
}

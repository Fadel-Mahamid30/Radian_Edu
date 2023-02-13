<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        "aktivitas",
        "biodata_id",
        
        // hanya digunakan sebagai session untuk step form biodata 
        "aktivitas_lainnya",
        "lainnya",
    ];

    public function biodata(){
        return $this->belongsTo(Biodata::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingDomicile extends Model
{
    use HasFactory;

    protected $fillable = [
        "kecamatan_id",
        "boiodata_id"
    ];

    
    public function district(){
        return $this->belongsTo(District::class);
    }
}

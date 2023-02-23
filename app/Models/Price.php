<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        "max_harga",
        "min_harga",
        "keuntungan"
    ];

    
    public function regency(){
        return $this->belongsTo(Regency::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        "kebupaten_id",
        "harga"
    ];

    
    public function regency(){
        return $this->belongsTo(Regency::class);
    }
}

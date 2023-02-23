<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingDomicile extends Model
{
    use HasFactory;

    protected $fillable = [
        "kecamatan_id",
        "user_id",
    ];


    public function kecamatan(){
        return $this->belongsTo(District::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

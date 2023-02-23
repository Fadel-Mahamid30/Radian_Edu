<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestTeaching extends Model
{
    use HasFactory;

    protected $fillable = [
        "mata_pelajaran_id",
        "user_id"
    ];

    public function mata_pelajaran(){
        return $this->belongsTo(Subjects::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

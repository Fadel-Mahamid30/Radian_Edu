<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        "dari_pengalaman",
        "sampai_pengalaman",
        "perusahaan",
        "deskripsi_pengalaman",
        "user_id"
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }
}

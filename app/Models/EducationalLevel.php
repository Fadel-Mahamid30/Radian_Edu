<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        "tingkatan"
    ];

    public function mata_pelajaran(){
        return $this->hasMany(Subjects::class, "Tingkatan_id");
    }
}

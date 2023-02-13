<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    use HasFactory;

    protected $fillable = [
        "confirm1",
        "confirm2",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

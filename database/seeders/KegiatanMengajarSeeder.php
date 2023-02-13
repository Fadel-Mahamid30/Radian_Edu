<?php

namespace Database\Seeders;

use App\Models\KegiatanMengajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanMengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatan_mengajar = [
            "Online", 
            "Offiline", 
            "Online dan Offline"
        ];

        foreach($kegiatan_mengajar as $key => $value){
            KegiatanMengajar::create([
                "kegiatan_mengajar" => $value
            ]);
        }
    }
}

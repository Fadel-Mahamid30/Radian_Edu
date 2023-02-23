<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subjects;
use App\Models\EducationalLevel;

class TingkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EducationalLevel::create([
                "tingkatan" => "TK"
            ]);
        EducationalLevel::create([
                "tingkatan" => "SD"
            ]);
        EducationalLevel::create([
                "tingkatan" => "SMP"
            ]);
        
        
        //-- TK
        Subjects::create([
                "mata_pelajaran" => "Tematik",
                "tingkatan_id" => 1
            ]);

        Subjects::create([
                "mata_pelajaran" => "Membaca",
                "tingkatan_id" => 1
            ]);

        Subjects::create([
                "mata_pelajaran" => "Mengaji",
                "tingkatan_id" => 1
            ]);

        //---- SD
        Subjects::create([
                "mata_pelajaran" => "Tematik",
                "tingkatan_id" => 2
            ]);

        Subjects::create([
                "mata_pelajaran" => "Matematika",
                "tingkatan_id" => 2
            ]);

        Subjects::create([
                "mata_pelajaran" => "Bahasa Indonesia",
                "tingkatan_id" => 2
            ]);

        //---- SMP
        Subjects::create([
                "mata_pelajaran" => "Matematika",
                "tingkatan_id" => 3
            ]);

        Subjects::create([
                "mata_pelajaran" => "Bahasa Inggris",
                "tingkatan_id" => 3
            ]);

        Subjects::create([
                "mata_pelajaran" => "IPA",
                "tingkatan_id" => 3
            ]);
    }
}

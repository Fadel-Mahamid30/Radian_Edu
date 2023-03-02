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

        // tingkatan 
        $tk = EducationalLevel::create([
                "tingkatan" => "TK"
            ]);
        $sd = EducationalLevel::create([
                "tingkatan" => "SD"
            ]);
        $smp = EducationalLevel::create([
                "tingkatan" => "SMP"
            ]);
        
        
        //-- TK
        Subjects::create([
                "mata_pelajaran" => "Tematik",
                "tingkatan_id" => $tk->id
            ]);

        Subjects::create([
                "mata_pelajaran" => "Membaca",
                "tingkatan_id" => $tk->id
            ]);

        Subjects::create([
                "mata_pelajaran" => "Mengaji",
                "tingkatan_id" => $tk->id
            ]);

        //---- SD
        Subjects::create([
                "mata_pelajaran" => "Tematik",
                "tingkatan_id" => $sd->id
            ]);

        Subjects::create([
                "mata_pelajaran" => "Matematika",
                "tingkatan_id" => $sd->id
            ]);

        Subjects::create([
                "mata_pelajaran" => "Bahasa Indonesia",
                "tingkatan_id" => $sd->id
            ]);

        //---- SMP
        Subjects::create([
                "mata_pelajaran" => "Matematika",
                "tingkatan_id" => $smp->id
            ]);

        Subjects::create([
                "mata_pelajaran" => "Bahasa Inggris",
                "tingkatan_id" => $smp->id
            ]);

        Subjects::create([
                "mata_pelajaran" => "IPA",
                "tingkatan_id" => $smp->id
            ]);
    }
}

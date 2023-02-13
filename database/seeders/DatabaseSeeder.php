<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\EducationalLevel;
use App\Models\MataPelajaran;
use App\Models\Subjects;
use App\Models\Tingkatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        EducationalLevel::create([
            "tingkatan" => "TK"
        ]);
        EducationalLevel::create([
            "tingkatan" => "SD"
        ]);
        EducationalLevel::create([
            "tingkatan" => "SMP"
        ]);
        

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

        //----
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

        //----
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

<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            "email" => "fadelmahamid107@gmail.com",
            "kontak_micro_teaching" => "085158955369",
            "kontak_pesan_guru" => "085158955369"
        ]);
    }
}

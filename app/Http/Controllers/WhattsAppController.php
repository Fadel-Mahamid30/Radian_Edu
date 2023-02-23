<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class WhattsAppController extends Controller
{

    // fungsi ini digunakan jika user ingin melakukan micro teaching 
    public function micro_teaching(Request $request){
        $user = auth()->user();
        $this->authorize("is_profile_complete_yes", $user);
        $this->authorize("micro_teaching_no_complete", $user);

        if($request->submit){

            // biodata singkat 
            $nama = $user->nama;
            $jenis_kelamin = $user->jenis_kelamin;
            $tanggal_lahir = date("d M Y", strtotime($user->tanggal_lahir));
            $no_telepon = $user->no_telepon;
            $email = $user->email;
            $alamat = $user->alamat;

            // mengambil kontak(untuk micro teaching)
            $kontak = Contact::first();
            
            if($kontak){

                // mengubah awalan angka 0 pada nomor hp menjadi +62
                $kontak = substr_replace($kontak->kontak_micro_teaching, "+62", 0, 1);

                // keterangan %20 : untuk spasi, %0A : untuk enter
                $pesan = "Saya%20siap%20mengikuti%20Micro%20Teaching%20yang%20dilaksanakan%20oleh%20Yayasan%20Radian%20Edu%20Solution,%20dengan%20mengikuti%20Micro%20Teaching%20ini%20saya%20harap%20dapat%20memperlihatkan%20kemampuan%20saya.%20berikut%20biodata%20singkat%20dari%20saya%20:%0A%0ANama%20:%20$nama%0AJenis kelamin%20:%20$jenis_kelamin%0ATanggal Lahir%20:%20$tanggal_lahir%0ANomor HP%20:%20$no_telepon%0AEmail%20:%20$email%0AAlamat%20:%20$alamat%0A%0ADengan%20ini%20saya%20siap%20mengituti%20micro%20Teaching%20terima%20kasih.";
                return redirect("https://api.whatsapp.com/send?phone=".$kontak."&text=".$pesan);

            }else{
                abort(404);
            }

        }else{
            abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    
    protected $message = [

        // nama
        "nama.required" => "Kolom ini tidak boleh kosong.",
        "nama.max" => "Data yang dimasukkan terlalu banyak.",

        // jumlah sesi
        "jumlah_sesi.required" => "Kolom ini tidak boleh kosong.",
        "jumlah_sesi.numeric" => "Data harus berupa angka.",

        // ajukan tanggal 
        "ajukan_tanggal.required" => "Kolom ini tidak boleh kosong.",
        "ajukan_tanggal.date" => "Data yang dimasukkan harus berupa tanggal.",

        // mata pelajaran
        "mata_pelajaran.required" => "Kolom ini tidak boleh kosong."

    ];

    // fungsi ini digunakan jika user ingin melakukan micro teaching 
    public function micro_teaching(Request $request){
        
        $user = auth()->user();

        // mengambil kontak(untuk micro teaching)
        $kontak = Contact::first();

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

    public function pesan_guru(Request $request){

        // mengambil kontak(pesan guru)
        $kontak = Contact::first();

        $validata = $request->validate([
            "nama" => "required|max:255",
            "jumlah_sesi" => "required|numeric",
            "ajukan_tanggal" => "required|date",
            "mata_pelajaran" => "required|max:255",
            "nama_guru" => "required|max:255",
            "key" => "required",
            "jumlah_bayar" => "required|numeric"
        ], $this->message);

        if($request->submit){
            if($kontak){

                $kontak = substr_replace($kontak->kontak_pesan_guru, "+62", 0, 1);

                $nama = $request->nama;
                $jumlah_sesi = $request->jumlah_sesi;
                $ajukan_tanggal = date("d M Y", strtotime($request->ajukan_tanggal));
                $mata_pelajaran = $request->mata_pelajaran;

                $nama_guru = $request->nama_guru;
                $url_guru = route('detail.guru', [$request->key]);

                // keterangan %20 : untuk spasi, %0A : untuk enter
                $pesan = "Hallo%20Radian,%20nama%20saya%20*$nama*,%20saya%20ingin%20memesan%20jasa%20guru%20bernama%20*$nama_guru*%20untuk%20mata%20pelajaran%20*$mata_pelajaran*%20dengan%20durasi%20*$jumlah_sesi%20sesi*,%20untuk%20tanggal%20*$ajukan_tanggal*.%20Mohon%20agar%20pesanan%20saya%20dicatat%20dan%20informasi%20mengenai%20tagihan%20yang%20harus%20saya%20bayarkan%20dapat%20diberikan%20kembali.%0A%0ATerima%20Kasih%0ALink%20detail%20guru%20:%20$url_guru";
                return redirect("https://api.whatsapp.com/send?phone=".$kontak."&text=".$pesan);

            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class experimentController extends Controller
{
    public function tesform(Request $request){
        if($request->aktivitas == null){
           $data = [
             "empty_activity" => "required",
             "tanggal_lahir" => "required"
           ];
        }else{
            $data = [
                "tanggal_lahir" => "required"
            ];
        }

        $validate = $request->validate($data);

        return $request->all();
    }

    public function tesform2(Request $request){
        $validate = $request->validate([
            "list_minat_mengajar" => "required"]);

        return $request->all();
    }

    public function removeUser($id){
        $cek = User::findOrFail($id);

        if ($cek) {
            if($cek->foto && $cek->cv){
                Storage::delete($cek->foto);
                Storage::delete($cek->cv);
            }

            $cek->delete();
            return "hapus berhasil";
        }else{
            return "hapus gagal";
        }
    }

    

}

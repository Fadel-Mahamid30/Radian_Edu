<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

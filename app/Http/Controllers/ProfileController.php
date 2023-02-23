<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){

        $user = auth()->user();
        $this->authorize("is_profile_complete_yes", $user);

        return view("profile.profile", [
            "title" => "Profile",
            "user" => $user
        ]);
    }
}

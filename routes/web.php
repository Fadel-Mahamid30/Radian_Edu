<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\experimentController;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WhattsAppController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route login, logout dan registrasi
Route::get("/login", [LoginController::class, "form_login"])->middleware("guest")->name("login");
Route::post("/login", [LoginController::class, "authentication"]);
Route::get("/registrasi", [RegisterController::class, "form_registrasi"])->middleware("guest")->name("registrasi");
Route::post("/registrasi", [RegisterController::class, "create_user"])->name("create.user");
Route::post("/logout", LogoutController::class);

// route API internal (digunakan untuk multiple select pada form biodata)
Route::post("/getkabupaten", [ApiController::class, "getkabupaten"])->name("get.kabupaten");
Route::post("/getkecamatan", [ApiController::class, "getkecamatan"])->name("get.kecamatan");
Route::post("/getkabupatenMengajar", [ApiController::class, "getkabupatenMengajar"])->name("get.kabupaten.mengajar");
Route::post("/getAllDataDomicile", [ApiController::class, "getAllDataDomicile"])->name("get.all.domicile");
Route::post("/getmapel", [ApiController::class, "getmapel"])->name("get.mepel");

// route biodata
Route::get("/biodata/step1", [BiodataController::class, "biodata_step1"])->middleware(["auth", "is.profile.complete:no"])->name("biodata.step1");
Route::get("/biodata/step2", [BiodataController::class, "biodata_step2"])->middleware(["auth", "is.profile.complete:no"])->name("biodata.step2");
Route::post("/biodata/step2", [BiodataController::class, "biodata_create2"])->middleware("auth")->name("biodata.create");
Route::get("/biodata/step3/{key}", [BiodataController::class, "biodata_step3"])->middleware(["auth", "is.profile.complete:yes"])->name("biodata.step3");

Route::middleware(["auth", "is.profile.complete:yes"])->group(function(){
   
    // route unmengirim pesan (siap micro teaching)
    Route::post("/micro_teaching", [WhattsAppController::class, "micro_teaching"])->name("micro.teaching");

    // route profile 
    Route::get("/profile", [ProfileController::class, "profile"])->name("profile");

   
});



// route untuk experiment
Route::get("/halaman_utama", [HalamanUtamaController::class, "halaman_utama"]);
Route::get("/biodata/step4/{key}", [BiodataController::class, "biodata_step4"]);
Route::get("/hapusSession", [BiodataController::class, "remove"]);

Route::post("/tesform", [experimentController::class, "tesform"]);
Route::post("/tesform2", [experimentController::class, "tesform2"]);
Route::get("/removeUser/{id}", [experimentController::class, "removeUser"]);

Route::middleware("auth")->group(function(){

    Route::get("/home", function(){
        return view("auth.menu2",[
            "auth" => auth()->user()
        ]);
    })->name("home");    
    
});

Route::get("/tes", function(){
    return view("biodata.form_biodata_1");
});

Route::get("/tes2", function(){
    return view("biodata.form_biodata_2");
});

Route::get('/', function () {
    return view('welcome');
});



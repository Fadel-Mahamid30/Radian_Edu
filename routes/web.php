<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\experimentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::middleware("guest")->group(function(){
    Route::get("/login", [LoginController::class, "index"])->name("login");
    Route::get("/register", [RegisterController::class, "index"])->name("register");
    Route::post("/register", [RegisterController::class, "store"]);
    Route::post("/login", [LoginController::class, "login"]);
});

Route::get("/biodata/step1", [BiodataController::class, "biodata_step1"]);

Route::get("/biodata/step2", [BiodataController::class, "biodata_step2"]);
Route::post("/biodata/step2", [BiodataController::class, "biodata_create2"]);

Route::get("/biodata/step3", [BiodataController::class, "biodata_step3"]);

Route::get("/hapusSession", [BiodataController::class, "remove"]);

// untuk experiment
Route::get("/tess", [BiodataController::class, "tes"]);
Route::get("/tesValue", [BiodataController::class, "tesvalue"]);
Route::post("/tesform", [experimentController::class, "tesform"]);
Route::post("/tesform2", [experimentController::class, "tesform2"]);

Route::post("/getkabupaten", [ApiController::class, "getkabupaten"]);
Route::post("/getkecamatan", [ApiController::class, "getkecamatan"]);
Route::post("/getAllDataDomicile", [ApiController::class, "getAllDataDomicile"]);
Route::post("/getmapel", [ApiController::class, "getmapel"]);



Route::middleware("auth")->group(function(){

    Route::get("/home", function(){
        return view("auth.menu2",[
            "auth" => auth()->user()
        ]);
    })->name("home");

    Route::post("/logout", LogoutController::class);
    
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



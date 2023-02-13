<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->text("foto");
            $table->text("cv");
            $table->enum("jenis_kelamin", ["Pria", "Wanita"]);
            $table->date("tanggal_lahir");
            $table->string("asal_ptn", 100);
            $table->string("jurusan", 100);
            $table->float("ipk");
            $table->string("provinsi", 100);
            $table->string("kabupaten", 100);
            $table->string("kecamatan", 100);
            $table->text("alamat");
            $table->string("apply");
            $table->text("deskripsi_diri");
            $table->enum("kegiatan_mengajar", ["Online", "Offline", "Online dan Offline"]);
            $table->unsignedBigInteger("harga");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
    }
};

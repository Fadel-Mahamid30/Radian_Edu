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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->date("mulai_pendidikan");
            $table->date("sampai_pendidikan");
            $table->string("universitas", 100);
            $table->text("deskripsi_pendidikan");
            $table->unsignedBigInteger('biodata_id');
            $table->foreign('biodata_id')->references('id')->on('biodatas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('education');
    }
};

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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->date("mulai_pengalaman");
            $table->date("sampai_pengalaman");
            $table->string("lembaga", 100);
            $table->text("deskripsi_pengalaman");
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
        Schema::dropIfExists('experiences');
    }
};

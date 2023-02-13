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
        Schema::create('interest_teachings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->foreign('mata_pelajaran_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->unsignedBigInteger('biodata_id');
            $table->foreign('biodata_id')->references('id')->on('biodatas')->onDelete('cascade');
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
        Schema::dropIfExists('interest_teachings');
    }
};

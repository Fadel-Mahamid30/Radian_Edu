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
        Schema::create('teaching_domiciles', function (Blueprint $table) {
            $table->id();
            $table->char('kecamatan_id', 7);
            $table->foreign('kecamatan_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('teaching_domiciles');
    }
};

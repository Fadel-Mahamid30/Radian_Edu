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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('password');
            $table->string('no_telepon', 30);
            $table->string('email', 100);
            $table->text('foto')->nullable();
            $table->text('cv')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->date('dari_pendidikan')->nullable();
            $table->date('sampai_pendidikan')->nullable();
            $table->string('universitas')->nullable();
            $table->text('deskripsi_pendidikan')->nullable();
            $table->string('asal_ptn')->nullable();
            $table->string('jurusan')->nullable();
            $table->float('ipk')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('posisi_dilamar')->nullable();
            $table->text('deskripsi_diri')->nullable();
            $table->enum('kegiatan_mengajar', ['Online', 'Offline', 'Online dan Offline'])->nullable();
            $table->unsignedBigInteger('harga')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_micro_teaching_complete')->default(0);
            $table->boolean('top_star')->default(0);
            $table->boolean('is_profile_complete')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

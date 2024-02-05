<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_anggota')->nullable();
            $table->string('nama')->nullable();
            $table->enum('jk', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->enum('sts_keluarga', ['Ya', 'Tidak'])->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kecamatan')->nullable();
            $table->enum('goldar', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('gambar')->nullable();
            $table->string('srt_baptis')->nullable();
            $table->string('srt_sidi')->nullable();
            $table->string('akte_lahir')->nullable();
            $table->string('srt_atestasi')->nullable();
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
        Schema::dropIfExists('anggota');
    }
}

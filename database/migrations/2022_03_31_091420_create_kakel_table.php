<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKakelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kakel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_anggota')->unsigned();
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_sekwil')->unsigned();
            $table->foreign('id_sekwil')->references('id')->on('sekwil')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tempat_nikah')->nullable();
            $table->date('tgl_nikah')->nullable();
            $table->string('srt_kk')->nullable();
            $table->string('srt_gereja')->nullable();
            $table->string('srt_sipil')->nullable();
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
        Schema::dropIfExists('kakel');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKakelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kakel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kakel')->unsigned();
            $table->foreign('id_kakel')->references('id')->on('kakel')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_anggota')->unsigned();
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('sts_keluarga', ['Anak', 'Istri']);
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
        Schema::dropIfExists('detail_kakel');
    }
}

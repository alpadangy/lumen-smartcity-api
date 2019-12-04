<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenginapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penginapan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_penginapan');
            $table->string('image_url');
            $table->text('deskripsi');
            $table->text('harga');
            $table->string('waktu_buka');
            $table->string('waktu_tutup');
            $table->string('no_telepon');
            $table->string('website');
            $table->string('ratting');
            $table->integer('lokasi_id')->unsigned();
            $table->foreign('lokasi_id')->references('id')->on('lokasi');
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
        Schema::dropIfExists('penginapan');
    }
}

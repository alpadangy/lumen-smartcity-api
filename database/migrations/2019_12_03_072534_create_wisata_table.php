<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tempat');
            $table->string('image_url');
            $table->text('deskripsi');
            $table->string('waktu_buka');
            $table->string('waktu_tutup');
            $table->string('no_telepon');
            $table->string('website');
            $table->string('ratting');
            $table->integer('kategori_id')->unsigned();
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->integer('lokasi_id')->unsigned();
            $table->foreign('lokasi_id')->references('id')->on('lokasi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
    }
}

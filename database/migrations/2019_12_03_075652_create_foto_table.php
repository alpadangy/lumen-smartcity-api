<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_foto');
            $table->string('image_url'); 
            $table->integer('wisata_id')->unsigned();
            $table->foreign('wisata_id')->references('id')->on('wisata');

            $table->integer('penginapan_id')->unsigned();
            $table->foreign('penginapan_id')->references('id')->on('penginapan');
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
        Schema::dropIfExists('foto');
    }
}

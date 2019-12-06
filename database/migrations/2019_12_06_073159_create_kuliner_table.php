<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKulinerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuliner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kuliner');
            $table->string('image_url');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->integer('status');
            $table->integer('jeniskuliner_id')->unsigned();
            $table->foreign('jeniskuliner_id')->references('id')->on('jeniskuliner');

            $table->integer('tempatkuliner_id')->unsigned();
            $table->foreign('tempatkuliner_id')->references('id')->on('tempatkuliner');
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
        Schema::dropIfExists('kuliner');
    }
}

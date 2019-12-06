<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatkulinerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempatkuliner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tempat');
            $table->string('nama_pemilik');
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('image_url');
            $table->string('waktu_buka');
            $table->string('waktu_tutup');
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
        Schema::dropIfExists('tempatkuliner');
    }
}

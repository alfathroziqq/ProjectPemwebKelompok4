<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahsTable extends Migration
{
    public function up()
    {
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kartu_keluarga_id');
            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluargas')->onDelete('CASCADE');
            $table->string('alamat');
            $table->integer('luas_rumah');
            $table->integer('jumlah_kamar');
            $table->string('spesifikasi_rumah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rumahs');
    }
}

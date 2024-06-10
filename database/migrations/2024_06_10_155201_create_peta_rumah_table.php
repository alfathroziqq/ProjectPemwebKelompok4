<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peta_rumah', function (Blueprint $table) {
            $table->id('id_peta')->primary();
            $table->unsignedBigInteger('id_wilayah');
            $table->string('kecamatan');
            $table->integer('jumlah_rumah_sehat');
            $table->integer('jumlah_rumah_tidaksehat');
            $table->integer('jumlah_rumah_tidaklayak');
            $table->timestamps();

            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peta_rumah');
    }
};

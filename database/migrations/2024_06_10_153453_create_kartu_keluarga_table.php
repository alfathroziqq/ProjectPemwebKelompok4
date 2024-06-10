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
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id('id_kk')->primary();
            $table->integer('nomor_kk');
            $table->string('kepala_keluarga');
            $table->string('alamat');
            $table->unsignedBigInteger('id_wilayah');
            $table->timestamps();

            $table->foreign('id_wilayah')->references('id_wilayah')->on('wilayah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluarga');
    }
};

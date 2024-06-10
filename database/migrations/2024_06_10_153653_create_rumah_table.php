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
        Schema::create('rumah', function (Blueprint $table) {
            $table->id('id_rumah')->primary();
            $table->unsignedBigInteger('id_kk');
            $table->string('alamat');
            $table->float('luas_rumah');
            $table->integer('jumlah_kamar');
            $table->timestamps();

            $table->foreign('id_kk')->references('id_kk')->on('kartu_keluarga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumah');
    }
};

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
        Schema::create('riwayat_perubahan_rumah', function (Blueprint $table) {
            $table->id('id_riwayat')->primary();
            $table->unsignedBigInteger('id_rumah');
            $table->text('perubahan');
            $table->date('tanggal_perubahan');
            $table->timestamps();

            $table->foreign('id_rumah')->references('id_rumah')->on('rumah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_perubahan_rumah');
    }
};

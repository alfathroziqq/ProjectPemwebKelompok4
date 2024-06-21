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
        Schema::create('riwayat_perubahan_rumahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rumah_id');
            $table->foreign('rumah_id')->references('id')->on('rumahs')->onDelete('CASCADE');
            $table->string('perubahan');
            $table->date('tanggal_perubahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_perubahan_rumahs');
    }
};

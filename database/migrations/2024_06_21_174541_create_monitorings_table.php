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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->text('deskripsi');
            $table->integer('rumah_sehat');
            $table->integer('rumah_tidak_sehat');
            $table->integer('rumah_tidak_layak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitorings');
    }
};

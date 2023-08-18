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
        Schema::create('waktu_presensis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('nama');
            $table->string('hari', 45);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('jenis', 45);
            $table->tinyInteger('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waktu_presensis');
    }
};

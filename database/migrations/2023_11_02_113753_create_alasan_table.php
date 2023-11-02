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
        Schema::create('alasan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pegawai_id');
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreignUuid('jenis_alasan_id');
            // $table->foreign('jenis_alasan_id')->references('id')->on('jenis_alasan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status',['valid','novalid','waiting'])->default('waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alasan');
    }
};

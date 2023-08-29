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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pegawai_id')->index();
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('gol_darah', 10)->nullable();
            $table->bigInteger('rt')->nullable();
            $table->bigInteger('rw')->nullable();
            $table->string('blok', 10)->nullable();
            $table->bigInteger('no_rumah')->nullable();
            $table->bigInteger('kode_pos')->nullable();
            $table->text('alamat_di_jambi')->nullable();
            $table->text('kode_post_di_jambi')->nullable();
            $table->string('email', 100)->nullable();
            $table->bigInteger('no_hp')->nullable();
            $table->text('website')->nullable();
            $table->bigInteger('no_ktp')->nullable();
            $table->string('file_ktp', 255)->nullable();
            $table->string('file_foto', 255)->nullable();
            $table->string('npwp', 50)->nullable();
            $table->string('file_npwp', 255)->nullable();
            $table->string('file_karpeg', 255)->nullable();
            $table->text('alamat_asal')->nullable();
            $table->bigInteger('no_rekening')->nullable();
            $table->string('file_rekening', 255)->nullable();
            $table->text('nama_desa_asal')->nullable();
            $table->text('nama_rekening')->nullable();
            $table->string('id_sinta', 100)->nullable();
            $table->string('id_scopus', 100)->nullable();
            $table->string('id_google_scholar', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};

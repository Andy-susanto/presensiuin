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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('nama_pegawai');
            $table->string('gelar_depan', 45)->nullable();
            $table->string('gelar_belakang', 45)->nullable();
            $table->string('nip', 100);
            $table->string('jenis_no_induk', 100);
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->foreignUuid('unit_kerjas_id')->index();
            $table->foreignUuid('status_kerjas_id')->index();
            $table->foreignUuid('status_kepegawaians_id')->index();
            $table->foreignUuid('pangkat_golongans_id')->index();
            $table->foreignUuid('status_keaktifan_pegawais_id')->index();
            $table->foreignUuid('jabatans_id')->index();
            $table->foreignUuid('jenjang_pendidikans_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};

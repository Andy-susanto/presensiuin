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
        Schema::table('pegawais', function (Blueprint $table) {
            $table->string('nip_baru', 100)->nullable();
            $table->text('nama_lengkap', 100)->nullable();
            $table->string('kode_level_jabatan', 100)->nullable();
            $table->string('level_jabatan', 100)->nullable();
            $table->string('pangkat', 100)->nullable();
            $table->string('gol_ruang', 100)->nullable();
            $table->string('tipe_jabatan', 100)->nullable();
            $table->string('kode_jabatan', 100)->nullable();
            $table->string('tampil_jabatan', 100)->nullable();
            $table->string('tmt_jabatan', 100)->nullable();
            $table->string('kode_satker_1', 100)->nullable();
            $table->string('satker_1', 100)->nullable();
            $table->string('kode_satker_2', 100)->nullable();
            $table->string('satker_2', 100)->nullable();
            $table->string('kode_satker_3', 100)->nullable();
            $table->string('satker_3', 100)->nullable();
            $table->string('kode_satker_4', 100)->nullable();
            $table->string('satker_4', 100)->nullable();
            $table->string('kode_satker_5', 100)->nullable();
            $table->string('satker_5', 100)->nullable();
            $table->text('satuan_kerja', 100)->nullable();
            $table->string('kode_pangkat', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('tmt_pangkat_yad')->nullable();
            $table->date('tmt_kgb_yad')->nullable();
            $table->date('tmt_pensiun')->nullable();
            $table->string('kode_kua', 100)->nullable();
            $table->string('nsm', 100)->nullable();
            $table->string('npsm', 100)->nullable();
            $table->string('status_pegawai', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

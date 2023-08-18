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
        Schema::table('biodatas', function (Blueprint $table) {
            $table->string('agama', 100)->nullable();
            $table->string('jenis_kelamin', 100)->nullable();
            $table->string('pendidikan', 100)->nullable();
            $table->string('masa_kerja_tahun', 100)->nullable();
            $table->string('masa_kerja_bulan', 100)->nullable();
            $table->text('alamat_1')->nullable();
            $table->text('alamat_2')->nullable();
            $table->string('telepon', 100)->nullable();
            $table->string('kab_kota', 100)->nullable();
            $table->string('provinsi', 100)->nullable();
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

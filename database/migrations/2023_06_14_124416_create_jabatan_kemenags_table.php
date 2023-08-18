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
        Schema::create('jabatan_kemenags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_jabatan', 100);
            $table->text('jabatan');
            $table->text('tampil_jabatan');
            $table->integer('usia_pensiun');
            $table->integer('tunjangan');
            $table->integer('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan_kemenags');
    }
};

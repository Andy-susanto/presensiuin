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
        Schema::create('kategori_unit_kerjas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('nama_kategori');
            $table->foreignUuid('jenis_unit_kerjas_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_unit_kerjas');
    }
};

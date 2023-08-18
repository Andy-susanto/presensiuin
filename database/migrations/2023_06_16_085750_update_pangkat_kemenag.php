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
        Schema::table('pangkat_kemenags', function (Blueprint $table) {
            $table->uuid('id')->change();
            $table->string('kode_pangkat', 100);
            $table->string('pangkat', 100);
            $table->string('gol_ruang', 100);
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

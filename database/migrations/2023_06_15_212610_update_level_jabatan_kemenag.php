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
        Schema::table('level_jabatan_kemenags', function (Blueprint $table) {
            $table->uuid('id')->change();
            $table->string('kode_level_jabatan', 100)->change();
            $table->string('level_jabatan', 100)->change();
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

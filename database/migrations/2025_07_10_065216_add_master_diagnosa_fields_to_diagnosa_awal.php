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
        Schema::table('diagnosa_awal', function (Blueprint $table) {
            $table->foreignId('master_diagnosa_id')->nullable()->constrained('master_diagnosa');
            $table->string('jenis_diagnosa')->nullable();
            $table->string('kasus')->nullable();
            $table->foreignId('pelayanan_id')->nullable()->constrained('pelayanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diagnosa_awal', function (Blueprint $table) {
            $table->dropForeign(['master_diagnosa_id']);
            $table->dropForeign(['pelayanan_id']);
            $table->dropColumn(['master_diagnosa_id', 'jenis_diagnosa', 'kasus', 'pelayanan_id']);
        });
    }
};

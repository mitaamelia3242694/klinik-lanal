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
        Schema::create('perawat_dokter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perawat_id'); // pegawai
            $table->unsignedBigInteger('dokter_id');  // users
            $table->timestamps();

            $table->foreign('perawat_id')->references('id')->on('users');
            $table->foreign('dokter_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawat_dokter');
    }
};

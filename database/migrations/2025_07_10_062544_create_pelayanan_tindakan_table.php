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
        Schema::create('pelayanan_tindakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelayanan_id');
            $table->unsignedBigInteger('tindakan_id');
            $table->timestamps();

            $table->foreign('pelayanan_id')->references('id')->on('pelayanan');
            $table->foreign('tindakan_id')->references('id')->on('tindakan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayanan_tindakan');
    }
};

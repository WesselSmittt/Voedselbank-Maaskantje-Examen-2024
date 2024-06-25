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
        Schema::create('pakket_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('pakket_id');
            $table->foreign('pakket_id')->references('id')->on('voedsel_pakkets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakket_details');
    }
};

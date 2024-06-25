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
        Schema::create('voedsel_pakkets', function (Blueprint $table) {
            $table->id('pakket_id');
            $table->date('samenstelling_datum');
            $table->date('uitgifte_datum')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('producten');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voedsel_pakkets');
    }
};

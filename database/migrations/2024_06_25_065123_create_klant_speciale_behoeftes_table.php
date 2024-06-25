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
        Schema::create('klant_speciale_behoeftes', function (Blueprint $table) {
            $table->unsignedBigInteger('klant_id');
            $table->foreign('klant_id')->references('klant_id')->on('klanten');
            $table->unsignedBigInteger('behoefte_id');
            $table->foreign('behoefte_id')->references('behoefte_id')->on('speciale_behoeftes');
            $table->primary(['klant_id', 'behoefte_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klant_speciale_behoeftes');
    }
};

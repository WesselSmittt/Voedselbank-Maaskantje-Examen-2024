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
        Schema::create('producten', function (Blueprint $table) {
            $table->id('id');
            $table->string('product_naam', 100)->unique();
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->string('ean', 13)->unique();
            $table->integer('hoeveelheid')->default(0);
            $table->unsignedBigInteger('leverancier_id')->nullable();
            $table->foreign('leverancier_id')->references('id')->on('leveranciers');
            $table->unsignedBigInteger('klant_id')->nullable();
            $table->foreign('klant_id')->references('klant_id')->on('klanten');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producten');
    }
};

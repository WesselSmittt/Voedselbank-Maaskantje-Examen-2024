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
        Schema::create('leveranciers', function (Blueprint $table) {
            $table->id('id');
            $table->string('bedrijfsnaam', 100);
            $table->string('straatnaam')->nullable();
            $table->string('huisnummer')->nullable();
            $table->string('postcode')->nullable();
            $table->string('land')->nullable();
            $table->string('contactpersoon', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefoon', 20)->nullable();
            $table->date('volgende_levering')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leveranciers');
    }
};

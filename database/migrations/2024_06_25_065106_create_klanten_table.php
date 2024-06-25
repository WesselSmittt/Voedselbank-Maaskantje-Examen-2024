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
        Schema::create('klanten', function (Blueprint $table) {
            $table->id('klant_id');
            $table->string('voornaam', 100);
            $table->string('achternaam', 100);
            $table->string('adres')->nullable();
            $table->string('telefoon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('volwassenen')->default(0);
            $table->integer('kinderen')->default(0);
            $table->integer('babys')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klanten');
    }
};

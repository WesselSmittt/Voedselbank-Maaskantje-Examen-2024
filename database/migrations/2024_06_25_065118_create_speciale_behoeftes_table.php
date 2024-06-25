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
        Schema::create('speciale_behoeftes', function (Blueprint $table) {
            $table->id('behoefte_id');
            $table->boolean('geen_varkensvlees')->default(false);
            $table->boolean('veganistisch')->default(false);
            $table->boolean('vegetarisch')->default(false);
            $table->boolean('allergisch_gluten')->default(false);
            $table->boolean('allergisch_pindas')->default(false);
            $table->boolean('allergisch_schaaldieren')->default(false);
            $table->boolean('allergisch_hazelnoten')->default(false);
            $table->boolean('allergisch_lactose')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speciale_behoeftes');
    }
};

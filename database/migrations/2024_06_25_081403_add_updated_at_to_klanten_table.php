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
        Schema::table('klanten', function (Blueprint $table) {
            // Add the updated_at column
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable(); // Ensure this is also added if not already present
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klanten', function (Blueprint $table) {
            // Remove the columns if rolling back
            $table->dropColumn(['updated_at', 'created_at']);
        });
    }
};

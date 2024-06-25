<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('klanten', function (Blueprint $table) {
            $table->boolean('blocked')->default(false); // Adds the 'blocked' column
        });
    }

    public function down()
    {
        Schema::table('klanten', function (Blueprint $table) {
            $table->dropColumn('blocked'); // Removes the 'blocked' column if the migration is rolled back
        });
    }
};
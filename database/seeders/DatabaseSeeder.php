<?php

namespace Database\Seeders;

use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\LeveranciersTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductenTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call other seeders
        $this->call(ProductenTableSeeder::class);
        $this->call(LeveranciersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(KlantenTableSeeder::class);
        $this->call(RollenTableSeeder::class);
    }
}

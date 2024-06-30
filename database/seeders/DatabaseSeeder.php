<?php

namespace Database\Seeders;

use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\LeveranciersTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductenTableSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\RollenTableSeeder;
use App\Models\Voedselpakket;
use App\Models\Product;
use App\Models\Leverancier;
use App\Models\Klant;
use App\Models\PakketDetail;
use App\Models\Categorie;  // Add this if you need categories

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Call other seeders
        $this->call(ProductenTableSeeder::class);
        $this->call(LeveranciersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(KlantenTableSeeder::class);
        $this->call(RollenTableSeeder::class);
        // // Create 5 categories
        // \App\Models\Categorie::factory(5)->create();

        $this->call(RollenTableSeeder::class);


        \App\Models\Leverancier::factory(10)->create();
        // // Create 10 leveranciers (suppliers)
        // \App\Models\Leverancier::factory(10)->create();

        // Create 10 klanten (customers)
        \App\Models\Klant::factory(10)->create();

        // Create 20 products
        \App\Models\Product::factory(20)->create();

        // Create 10 voedselpakketten (food packages)
        \App\Models\Voedselpakket::factory(10)->create();

        // Create 30 pakket details
        \App\Models\PakketDetail::factory(30)->create();


        // $this->call(RollenTableSeeder::class);
    }
}

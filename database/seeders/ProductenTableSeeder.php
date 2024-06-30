<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class ProductenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('producten')->insert([
            'product_naam' => 'Voorbeeld Product Naam',
            'categorie_id' => 1,
            'ean' => Str::random(13),
            'hoeveelheid' => 100,
            'leverancier_id' => 1,
            'klant_id' => 1,
        ]);
    }
}

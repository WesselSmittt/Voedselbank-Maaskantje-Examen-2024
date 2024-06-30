<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Voorraad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoedselPakketsSeeder extends Seeder
{
    public function run()
    {
        // Get an existing product ID for the foreign key constraint
        $productId = Voorraad::first()->id; // Updated to use 'id'

        // Insert a few example records into the voedsel_pakkets table
        DB::table('voedsel_pakkets')->insert([
            [
                'samenstelling_datum' => Carbon::now()->subDays(10),
                'uitgifte_datum' => Carbon::now(),
                'product_id' => $productId,
            ],
        ]);
    }
}

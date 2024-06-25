<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeveranciersTableSeeder extends Seeder
{
    public function run()
    {
        $leveranciers = [
            [
                'bedrijfsnaam' => 'Leverancier A',
                'straatnaam' => 'Straat A',
                'huisnummer' => '1A',
                'postcode' => '1234AB',
                'land' => 'Nederland',
                'contactpersoon' => 'Jan de Vries',
                'email' => 'jan@leveranciera.nl',
                'telefoon' => '0123456789',
                'volgende_levering' => Carbon::now()->addWeeks(1)->format('Y-m-d'),
            ],
            [
                'bedrijfsnaam' => 'Leverancier B',
                'straatnaam' => 'Straat B',
                'huisnummer' => '2B',
                'postcode' => '5678CD',
                'land' => 'Nederland',
                'contactpersoon' => 'Piet Jansen',
                'email' => 'piet@leverancierb.nl',
                'telefoon' => '9876543210',
                'volgende_levering' => Carbon::now()->addWeeks(2)->format('Y-m-d'),
            ],
        ];

        DB::table('leveranciers')->insert($leveranciers);
    }
}

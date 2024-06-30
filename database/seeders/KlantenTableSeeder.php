<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KlantenTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('klanten')->insert([
            'voornaam' => 'John',
            'achternaam' => 'Doe',
            'adres' => 'Voorbeeldstraat 123',
            'telefoon' => '0612345678',
            'email' => 'john.doe@example.com',
            'volwassenen' => 2,
            'kinderen' => 1,
            'babys' => 0,
        ]);
    }
}

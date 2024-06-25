<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RollenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('rollen')->insert([
            ['rol_id' => 1, 'rol_naam' => 'directie'],
            ['rol_id' => 2, 'rol_naam' => 'magazijn medewerker'],
            ['rol_id' => 3, 'rol_naam' => 'vrijwilliger'],
        ]);
    }
}
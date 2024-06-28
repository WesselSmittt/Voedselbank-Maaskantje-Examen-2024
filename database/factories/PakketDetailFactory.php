<?php

namespace Database\Factories;

use App\Models\PakketDetail;
use App\Models\Voedselpakket;
use Illuminate\Database\Eloquent\Factories\Factory;

class PakketDetailFactory extends Factory
{
    protected $model = PakketDetail::class;

    public function definition()
    {
        return [
            'pakket_id' => Voedselpakket::factory(),
        ];
    }
}

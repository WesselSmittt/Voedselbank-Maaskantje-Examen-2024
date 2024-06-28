<?php

namespace Database\Factories;

use App\Models\Klant;
use App\Models\Product;
use App\Models\Voedselpakket;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VoedselpakketFactory extends Factory
{
    protected $model = Voedselpakket::class;

    public function definition()
    {
        return [
            'samenstelling_datum' => $this->faker->date(),
            'uitgifte_datum' => $this->faker->optional()->date(),
            'product_id' => Product::factory(),
            'klant_id' => Klant::factory(),
        ];
    }
}

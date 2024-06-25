<?php

namespace Database\Factories;

use App\Models\Voedselpakket;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VoedselpakketFactory extends Factory
{
    protected $model = Voedselpakket::class;

    public function definition()
    {
        return [
            'samenstelling_datum' => $this->faker->date(),
            'uitgifte_datum' => $this->faker->optional()->date(),
            'product_id' => Product::factory(),
        ];
    }
}

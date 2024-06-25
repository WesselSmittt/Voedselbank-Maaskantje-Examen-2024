<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Leverancier;
use App\Models\Klant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    
    protected $model = Product::class;

    public function definition()
    {
        return [
            'product_naam' => $this->faker->unique()->word(),
            'categorie_id' => Categorie::factory(),
            'ean' => $this->faker->unique()->ean13(),
            'hoeveelheid' => $this->faker->numberBetween(1, 100),
            'leverancier_id' => Leverancier::factory(),
            'klant_id' => Klant::factory(),
        ];
    }
}

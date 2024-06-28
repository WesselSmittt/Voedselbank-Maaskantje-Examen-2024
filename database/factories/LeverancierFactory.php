<?php

namespace Database\Factories;

use App\Models\Leverancier;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeverancierFactory extends Factory
{
    protected $model = Leverancier::class;

    public function definition()
    {
        return [
            'bedrijfsnaam' => $this->faker->company(),
            'straatnaam' => $this->faker->streetName(),
            'huisnummer' => $this->faker->buildingNumber(),
            'postcode' => $this->faker->postcode(),
            'land' => $this->faker->country(),
            'contactpersoon' => $this->faker->name(),
            'email' => $this->faker->unique()->companyEmail(),
            'telefoon' => $this->faker->phoneNumber(),
            'volgende_levering' => $this->faker->optional()->date(),
        ];
    }
}

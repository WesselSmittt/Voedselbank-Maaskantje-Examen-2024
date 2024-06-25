<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leverancier>
 */
class LeverancierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bedrijfsnaam' => $this->faker->company,
            'straatnaam' => $this->faker->streetName,
            'huisnummer' => $this->faker->buildingNumber,
            'postcode' => $this->faker->postcode,
            'land' => $this->faker->country,
            'contactpersoon' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'telefoon' => $this->faker->phoneNumber,
            'volgende_levering' => $this->faker->date,
        ];
    }
}

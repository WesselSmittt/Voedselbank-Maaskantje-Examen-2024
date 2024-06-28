<?php

namespace Database\Factories;

use App\Models\Klant;
use Illuminate\Database\Eloquent\Factories\Factory;

class KlantFactory extends Factory
{
    protected $model = Klant::class;

    public function definition()
    {
        return [
            'voornaam' => $this->faker->firstName(),
            'achternaam' => $this->faker->lastName(),
            'adres' => $this->faker->address(),
            'telefoon' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->email(),
            'volwassenen' => $this->faker->numberBetween(0, 2), 
            'kinderen' => $this->faker->numberBetween(0, 3),
            'babys' => $this->faker->numberBetween(0, 2),
        ];
    }
}

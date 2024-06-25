<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Leverancier;
use App\Models\User;

class LeverancierControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_returns_leveranciers_sorted_by_volgende_levering()
    {

        $user = User::factory()->create(); // Ensure you have a User factory or equivalent
        $this->actingAs($user);

        // Act: Maak een GET request naar de index route
        $response = $this->get(route('leverancier.index'));
        // Arrange: Maak een paar leveranciers aan met verschillende 'volgende_levering' data
        $leverancier1 = Leverancier::factory()->create(['volgende_levering' => now()->addDays(1)]);
        $leverancier2 = Leverancier::factory()->create(['volgende_levering' => now()->addDays(2)]);
        $leverancier3 = Leverancier::factory()->create(['volgende_levering' => now()->addDays(3)]);

        // Act: Maak een GET request naar de index route
        $response = $this->get(route('leverancier.index'));

        

        // Assert: Controleer of de view de leveranciers bevat in de juiste volgorde
        $leveranciersInView = $response->viewData('leveranciers');
        $this->assertEquals([$leverancier1->id, $leverancier2->id, $leverancier3->id], $leveranciersInView->pluck('id')->toArray());
    }
}
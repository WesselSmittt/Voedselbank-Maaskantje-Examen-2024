<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Voorraad;
use App\Models\Categorie;
use App\Models\Leverancier;
use App\Models\Klant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class VoorraadbeheerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test updating an existing inventory item.
     *
     * @return void
     */
    public function test_update_voorraad()
    {
        // Create related models
        $categorie = Categorie::factory()->create();
        $leverancier = Leverancier::factory()->create();
        $klant = Klant::factory()->create();

        // Create a voorraad item
        $voorraad = Voorraad::factory()->create([
            'categorie_id' => $categorie->categorie_id,
            'leverancier_id' => $leverancier->leverancier_id,
            'klant_id' => $klant->klant_id,
        ]);

        // Data to update
        $updateData = [
            'product_naam' => 'Updated Product Naam',
            'hoeveelheid' => 99,
            'categorie_id' => $categorie->categorie_id,
            'leverancier_id' => $leverancier->leverancier_id,
            'klant_id' => $klant->klant_id,
        ];

        // Send a PUT request to update the voorraad item
        $response = $this->put(route('voorraadbeheer.update', $voorraad->product_id), $updateData);

        // Assert the response status
        $response->assertStatus(302);

        // Assert the item was updated in the database
        $this->assertDatabaseHas('producten', $updateData);

        // Assert the success message is in the session
        $response->assertSessionHas('success', 'Voorraadartikel succesvol bijgewerkt.');
    }
}

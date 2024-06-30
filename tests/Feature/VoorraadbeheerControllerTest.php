<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Voorraad;
use App\Models\Categorie;
use App\Models\Leverancier;
use App\Models\Klant;

class VoorraadbeheerControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_create_a_voorraad_item()
    {
        $categorie = Categorie::factory()->create();
        $leverancier = Leverancier::factory()->create();
        $klant = Klant::factory()->create();

        $response = $this->post(route('voorraadbeheer.store'), [
            'product_naam' => 'Test Product',
            'hoeveelheid' => 10,
            'categorie_id' => $categorie->id,
            'leverancier_id' => $leverancier->id,
            'klant_id' => $klant->id,
            'ean' => '1234567890123',
        ]);

        $response->assertRedirect(route('voorraadbeheer.index'));
        $response->assertSessionHas('success', 'Voorraadartikel succesvol aangemaakt.');
        $this->assertDatabaseHas('voorraads', [
            'product_naam' => 'Test Product',
            'hoeveelheid' => 10,
            'categorie_id' => $categorie->id,
            'leverancier_id' => $leverancier->id,
            'klant_id' => $klant->id,
            'ean' => '1234567890123',
        ]);
    }

    /** @test */
    public function it_validates_the_store_request()
    {
        $response = $this->post(route('voorraadbeheer.store'), []);

        $response->assertSessionHasErrors(['product_naam', 'hoeveelheid', 'categorie_id', 'leverancier_id', 'klant_id']);
    }
}

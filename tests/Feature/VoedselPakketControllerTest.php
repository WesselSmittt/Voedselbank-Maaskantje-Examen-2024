<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Klant;
use App\Models\Product;
use App\Models\VoedselPakket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoedselPakketControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        
        // Optional: Set up your test data
        Klant::factory()->create([
            'id' => 1,
            'voornaam' => 'Test',
            'achternaam' => 'Klant',
            'volwassenen' => 2,
            'kinderen' => 1,
            'babys' => 1,
        ]);

        Product::factory()->create([
            'id' => 1,
            'naam' => 'Test Product',
        ]);
    }

    public function testCreatePageLoadsCorrectly()
    {
        $response = $this->get(route('voedselpakket.create'));
        $response->assertStatus(200);
        $response->assertSee('Selecteer Klant');
    }

    public function testStoreNewVoedselPakket()
    {
        $response = $this->post(route('voedselpakket.store'), [
            'klant_id' => 1,
            'samenstelling_datum' => '2024-06-12',
            'uitgifte_datum' => '2024-06-28',
            'product_id' => [1], // Note: array for multiple products
        ]);

        $response->assertRedirect(route('voedselpakket.index'));
        $this->assertDatabaseHas('voedsel_pakkets', [
            'klant_id' => 1,
            'samenstelling_datum' => '2024-06-12',
            'uitgifte_datum' => '2024-06-28',
        ]);
    }

    public function testSearchVoedselPakketByKlantAchternaam()
    {
        $klant = Klant::factory()->create(['achternaam' => 'Doe']);
        $voedselpakket = VoedselPakket::factory()->create(['klant_id' => $klant->id]);

        $response = $this->get(route('voedselpakket.search', ['search' => 'Doe']));
        $response->assertStatus(200);
        $response->assertSee($voedselpakket->id);
    }

    public function testShowVoedselPakketDetails()
    {
        $klant = Klant::factory()->create();
        $voedselpakket = VoedselPakket::factory()->create(['klant_id' => $klant->id]);

        $response = $this->get(route('voedselpakket.show', $voedselpakket->id));
        $response->assertStatus(200);
        $response->assertSee($voedselpakket->id);
        $response->assertSee($klant->achternaam);
    }

    // Add tests for update and delete functions
    public function testUpdateVoedselPakket()
    {
        $klant = Klant::factory()->create();
        $voedselpakket = VoedselPakket::factory()->create(['klant_id' => $klant->id]);

        $response = $this->put(route('voedselpakket.update', $voedselpakket->id), [
            'klant_id' => $klant->id,
            'samenstelling_datum' => '2024-06-13',
            'uitgifte_datum' => '2024-06-29',
            'product_id' => [1],
        ]);

        $response->assertRedirect(route('voedselpakket.index'));
        $this->assertDatabaseHas('voedsel_pakkets', [
            'id' => $voedselpakket->id,
            'samenstelling_datum' => '2024-06-13',
            'uitgifte_datum' => '2024-06-29',
        ]);
    }

    public function testDeleteVoedselPakket()
    {
        $klant = Klant::factory()->create();
        $voedselpakket = VoedselPakket::factory()->create(['klant_id' => $klant->id]);

        $response = $this->delete(route('voedselpakket.destroy', $voedselpakket->id));
        $response->assertRedirect(route('voedselpakket.index'));
        $this->assertDatabaseMissing('voedsel_pakkets', ['id' => $voedselpakket->id]);
    }
}

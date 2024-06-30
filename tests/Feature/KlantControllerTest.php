<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Klant;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KlantControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_all_customers_when_no_search_term()
    {
        Klant::factory()->count(5)->create();

        $response = $this->get(route('klant.index'));

        $response->assertStatus(200);
        $response->assertViewHas('klanten', function ($klanten) {
            return count($klanten) === 5;
        });
    }

    /** @test */
    public function it_shows_filtered_customers_based_on_search_term()
    {
        Klant::factory()->create(['voornaam' => 'John', 'achternaam' => 'Doe']);
        Klant::factory()->create(['voornaam' => 'Jane', 'achternaam' => 'Doe']);
        Klant::factory()->create(['voornaam' => 'Alice', 'achternaam' => 'Smith']);

        $response = $this->get(route('klant.index', ['zoekterm' => 'Doe']));

        $response->assertStatus(200);
        $response->assertViewHas('klanten', function ($klanten) {
            return count($klanten) === 2;
        });
    }

    /** @test */
    public function it_creates_a_new_customer()
    {
        $response = $this->post(route('klant.store'), [
            'voornaam' => 'John',
            'achternaam' => 'Doe',
            'adres' => '123 Main St',
            'telefoon' => '1234567890',
            'email' => 'john.doe@example.com',
            'volwassenen' => 2,
            'kinderen' => 1,
            'babys' => 1
        ]);

        $response->assertRedirect(route('klantoverzicht'));
        $this->assertDatabaseHas('klanten', [
            'voornaam' => 'John',
            'achternaam' => 'Doe',
        ]);
    }

    /** @test */
    public function it_updates_an_existing_customer()
    {
        $klant = Klant::factory()->create();

        $response = $this->put(route('klant.update', $klant->id), [
            'voornaam' => 'Updated',
            'achternaam' => 'Customer',
            'adres' => '123 Updated St',
            'telefoon' => '0987654321',
            'email' => 'updated.customer@example.com',
            'volwassenen' => 3,
            'kinderen' => 2,
            'babys' => 0
        ]);

        $response->assertRedirect(route('klantoverzicht'));
        $this->assertDatabaseHas('klanten', [
            'id' => $klant->id,
            'voornaam' => 'Updated',
            'achternaam' => 'Customer',
        ]);
    }

    /** @test */
    public function it_deletes_a_customer()
    {
        $klant = Klant::factory()->create();

        $response = $this->delete(route('klant.destroy', $klant->id));

        $response->assertRedirect(route('klantoverzicht'));
        $this->assertDatabaseMissing('klanten', [
            'id' => $klant->id,
        ]);
    }
}

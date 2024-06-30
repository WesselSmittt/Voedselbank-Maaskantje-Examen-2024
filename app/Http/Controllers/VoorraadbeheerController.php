<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use App\Models\Voorraad;
use App\Models\Categorie;
use App\Models\Leverancier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoorraadbeheerController extends Controller
{
    // Toont een lijst van alle voorraadartikelen
    public function index(Request $request)
    {
        // Haalt de zoekterm op uit de request
        $search = $request->input('search');

        // Haalt alle voorraadartikelen op, inclusief gerelateerde categorie, leverancier en klant
        $producten = Voorraad::with(['categorie', 'leverancier', 'klant'])
            ->when($search, function ($query, $search) {
                return $query->where('ean', 'like', "%{$search}%");
            })
            ->get();

        // Geeft de index view terug met de opgehaalde producten
        return view('voorraadbeheer.index', compact('producten', 'search'));
    }

    // Toont het formulier voor het aanmaken van een nieuw voorraadartikel
    public function create()
    {
        // Haalt alle categorieën, leveranciers en klanten op
        $categories = Categorie::all();
        $leveranciers = Leverancier::all();
        $klanten = Klant::all();
        // Geeft de create view terug met de opgehaalde data
        return view('voorraadbeheer.create', compact('categories', 'leveranciers', 'klanten'));
    }

    // Slaat een nieuw voorraadartikel op in de database
    public function store(Request $request)
    {
        // Valideert de ingevoerde gegevens
        $request->validate([
            'product_naam' => 'required|string|max:255',
            'hoeveelheid' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,categorie_id',
            'leverancier_id' => 'required|exists:leveranciers,leverancier_id',
        ]);

        // Controleert of het product al bestaat
        $bestaatAl = Voorraad::where('product_naam', $request->input('product_naam'))->exists();

        if ($bestaatAl) {
            return back()->withErrors('Product bestaat al.');
        }

        // Genereert een EAN-code als deze niet is ingevoerd
        $ean = $request->input('ean') ?: $this->generateEAN();

        try {
            // Maakt een nieuw voorraadartikel aan met de ingevoerde gegevens
            Voorraad::create([
                'product_naam' => $request->input('product_naam'),
                'hoeveelheid' => $request->input('hoeveelheid'),
                'ean' => $ean,
                'categorie_id' => $request->input('categorie_id'),
                'leverancier_id' => $request->input('leverancier_id'),
                'klant_id' => $request->input('klant_id'),
            ]);

            // Redirect naar de index pagina met een succesmelding
            return redirect()->route('voorraadbeheer.index')->with('success', 'Voorraadartikel succesvol aangemaakt.');
        } catch (\Exception $e) {
            // Logt de fout en geeft een foutmelding terug
            Log::error('Fout bij het aanmaken van voorraadartikel: ' . $e->getMessage());
            return back()->withErrors('Er is een fout opgetreden bij het aanmaken van het voorraadartikel.');
        }
    }

    // Genereert een EAN-code
    private function generateEAN()
    {
        $ean = '';
        for ($i = 0; $i < 13; $i++) {
            $ean .= rand(0, 9);
        }
        return $ean;
    }

    // Toont een specifiek voorraadartikel
    public function show(Voorraad $voorraad)
    {
        // Implementatie om een specifiek voorraadartikel weer te geven
    }

    // Toont het formulier voor het bewerken van een bestaand voorraadartikel
    public function edit(Voorraad $voorraad)
    {
        $categories = Categorie::all();
        $leveranciers = Leverancier::all();
        $klanten = Klant::all();
        return view('voorraadbeheer.edit', compact('voorraad', 'categories', 'leveranciers', 'klanten'));
    }

    // Werkt een bestaand voorraadartikel bij in de database
    public function update(Request $request, Voorraad $voorraad)
    {
        // Valideert de ingevoerde gegevens
        $request->validate([
            'product_naam' => 'required|string|max:255',
            'hoeveelheid' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,categorie_id',
            'leverancier_id' => 'required|exists:leveranciers,leverancier_id',
        ]);

        try {
            // Werkt het voorraadartikel bij met de ingevoerde gegevens
            $voorraad->update([
                'product_naam' => $request->input('product_naam'),
                'hoeveelheid' => $request->input('hoeveelheid'),
                'categorie_id' => $request->input('categorie_id'),
                'leverancier_id' => $request->input('leverancier_id'),
                'klant_id' => $request->input('klant_id'),
            ]);

            // Redirect naar de index pagina met een succesmelding
            return redirect()->route('voorraadbeheer.index')->with('success', 'Voorraadartikel succesvol bijgewerkt.');
        } catch (\Exception $e) {
            // Logt de fout en geeft een foutmelding terug
            Log::error('Fout bij het bijwerken van voorraadartikel: ' . $e->getMessage());
            Log::error('Request data: ' . json_encode($request->all()));
            Log::error('Voorraad data: ' . json_encode($voorraad->toArray()));

            return back()->withErrors('Er is een fout opgetreden bij het bijwerken van het voorraadartikel.');
        }
    }

    // Verwijdert een specifiek voorraadartikel uit de database
    public function destroy(Voorraad $voorraad)
    {
        try {
            // Verwijdert het voorraadartikel
            $voorraad->delete();
            // Redirect naar de index pagina met een succesmelding
            return redirect()->route('voorraadbeheer.index')->with('success', 'Voorraadartikel succesvol verwijderd.');
        } catch (\Exception $e) {
            // Logt de fout en geeft een foutmelding terug
            Log::error('Fout bij het verwijderen van voorraadartikel: ' . $e->getMessage());
            return back()->withErrors('Er is een fout opgetreden bij het verwijderen van het voorraadartikel.');
        }
    }
}

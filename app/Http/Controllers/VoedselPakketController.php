<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\VoedselPakket;

class VoedselPakketController extends Controller
{
    // Weergave van het overzicht van voedselpakketten
    public function index()
    {
        $voedselpakketten = VoedselPakket::with('klant')->get();
        return view('voedselpakket.index', compact('voedselpakketten'));
    }

    // Weergave van het formulier om een nieuw voedselpakket aan te maken
    public function create()
    {
        $klanten = Klant::all(); // Fetch all klanten from the database
        $products = Product::all(); // Fetch all products from the database

        return view('voedselpakket.create', compact('klanten', 'products'));;
    }

    // Opslaan van een nieuw voedselpakket
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'samenstelling_datum' => 'required|date',
            'uitgifte_datum' => 'required|date',
            'product_id' => 'required|exists:producten,id',
        ]);

        // Create voedsel_pakket
        VoedselPakket::create($validatedData);

        return redirect()->route('voedselpakket.index')->with('success', 'Voedsel pakket successfully created.');
    }

    // Zoeken op klantnaam in voedselpakketten
    public function search(Request $request)
    {
        // Example search query in your controller
$searchTerm = $request->input('search');
$voedselpakketten = VoedselPakket::whereHas('klant', function ($query) use ($searchTerm) {
    $query->where('achternaam', 'like', '%' . $searchTerm . '%');
})->get();


        return view('voedselpakket.index', compact('voedselpakketten'));
    }

    // Weergave van details van een voedselpakket
    public function show($id)
    {
        $voedselpakket = VoedselPakket::findOrFail($id);
        return view('voedselpakket.show', compact('voedselpakket'));
    }
}

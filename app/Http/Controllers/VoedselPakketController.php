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
        $voedselpakketten = VoedselPakket::with('product')->get();
        return view('voedselpakket.index', compact('voedselpakketten'));
    }

    // Weergave van het formulier om een nieuw voedselpakket aan te maken
    public function create(Request $request)
    {
        $klanten = Klant::all(); // Fetch all klanten from the database
        $products = Product::all(); // Fetch all products from the database
        $selectedKlant = null;

        if ($request->isMethod('post')) {
            $selectedKlant = Klant::find($request->input('klant_id'));
        }

        return view('voedselpakket.create', compact('klanten', 'products', 'selectedKlant'));;
    }

    // Opslaan van een nieuw voedselpakket
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'samenstelling_datum' => 'required|date',
            'uitgifte_datum' => 'required|date',
            'product_id' => 'required|exists:producten,id',
            'klant_id' => 'required|exists:klanten,id', // Add klant_id to the validation rules
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

    public function destroy($id)
    {
        $voedselpakket = VoedselPakket::findOrFail($id);
        
        // Perform authorization check if necessary
        
        $voedselpakket->delete();
        
        return redirect()->route('voedselpakket.index')->with('success', 'Voedselpakket successfully deleted.');
    }

    public function edit($id)
    {
        $voedselpakket = VoedselPakket::findOrFail($id);
        $products = Product::all(); // Fetch all products from the database
        
        // Haal eventueel extra data op die nodig is voor het formulier
        
        return view('voedselpakket.edit', compact('voedselpakket', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'samenstelling_datum' => 'required|date',
            'uitgifte_datum' => 'required|date',
            'product_id' => 'required|exists:producten,id', // Validatie voor het product
        ]);
        
        $voedselpakket = VoedselPakket::findOrFail($id);
        $voedselpakket->update($validatedData);
        
        return redirect()->route('voedselpakket.index')->with('success', 'Voedselpakket succesvol bijgewerkt.');
    }
}

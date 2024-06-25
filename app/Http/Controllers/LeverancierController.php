<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Illuminate\Http\Request;

class LeverancierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
        // Haal alle leveranciers op uit de database
         $leveranciers = Leverancier::all(); // Haalt alle leveranciers op uit de database
     
         return view('leverancier.index', compact('leveranciers')); // Stuurt de data naar de view
     }

    public function show($id)
    {
        // Haal de leverancier op uit de database
        $leverancier = Leverancier::findOrFail($id);
        return view('leverancier.show', compact('leverancier'));
    }

    public function edit($id)
    {
        // Haal de leverancier op uit de database
        $leverancier = Leverancier::findOrFail($id);
        return view('leverancier.edit', compact('leverancier'));
    }

    public function update(Request $request, $id)
    {
        // Valideer de data die binnenkomt
        $validatedData = $request->validate([
            'bedrijfsnaam' => 'required|unique:leveranciers|max:255',
            'contactpersoon' => 'required|max:255',
            'telefoon' => 'required|numeric',
            'volgende_levering' => 'required|date|after_or_equal:today',
            'straatnaam' => 'required',
            'huisnummer' => 'required|numeric',
            'postcode' => 'required',
            'land' => 'required',
            'email' => 'required|email',

            // Voeg hier meer validatieregels toe
        ], [
            'bedrijfsnaam.required' => 'Een bedrijfsnaam is verplicht.',
            'bedrijfsnaam.unique' => 'Deze bedrijfsnaam is al in gebruik.',
            'bedrijfsnaam.max' => 'De bedrijfsnaam mag niet meer dan 255 tekens bevatten.',
            'contactpersoon.required' => 'Een contactpersoon is verplicht.',
            'contactpersoon.max' => 'De contactpersoon mag niet meer dan 255 tekens bevatten.',
            'telefoon.required' => 'Een telefoonnummer is ongeldig.',
            'telefoon.numeric' => 'Het telefoonnummer moet numeriek zijn.',
            'volgende_levering.required' => 'De datum van de volgende levering is verplicht.',
            'volgende_levering.date' => 'De datum van de volgende levering moet een geldige datum zijn.',
            'volgende_levering.after_or_equal' => 'De datum van de volgende levering moet in de toekomst liggen.',
            'straatnaam.required' => 'Een straatnaam is verplicht.',
            'huisnummer.required' => 'Een huisnummer is verplicht.',
            'huisnummer.numeric' => 'Het huisnummer moet numeriek zijn.',
            'postcode.required' => 'Een postcode is verplicht.',
            'land.required' => 'Een land is verplicht.',
            'email.required' => 'Een e-mailadres is verplicht.',
            'email.email' => 'Het e-mailadres moet een geldig e-mailadres zijn.',

            // Voeg hier meer aangepaste foutberichten toe
        ]);
    
        $leverancier = new Leverancier();
        $leverancier->bedrijfsnaam = $validatedData['bedrijfsnaam'];
        $leverancier->contactpersoon = $validatedData['contactpersoon'];
        $leverancier->telefoon = $validatedData['telefoon'];
        $leverancier->volgende_levering = $validatedData['volgende_levering'];
        $leverancier->straatnaam = $validatedData['straatnaam'];
        $leverancier->huisnummer = $validatedData['huisnummer'];
        $leverancier->postcode = $validatedData['postcode'];
        $leverancier->land = $validatedData['land'];
        $leverancier->email = $validatedData['email'];
        

        // Vul de rest van de velden in
    
        $leverancier->save();
    
    
        return redirect()->route('leveranciers.index')->with('success', 'Leverancier succesvol bijgewerkt.');
    }

    public function destroy($id)
    {
        // Haal de leverancier op uit de database
        $leverancier = Leverancier::findOrFail($id);
        $leverancier->delete();
        return redirect()->route('leverancier.index');
    }

    public function create()
    {
        // Laat het formulier zien om een nieuwe leverancier toe te voegen
        return view('leverancier.create');
    }

    public function store(Request $request)
    {
        // Valideer de data die binnenkomt
        $validatedData = $request->validate([
            'bedrijfsnaam' => 'required|unique:leveranciers|max:255',
            'contactpersoon' => 'required|max:255',
            'telefoon' => 'required|numeric',
            'volgende_levering' => 'required|date|after_or_equal:today',
            'straatnaam' => 'required',
            'huisnummer' => 'required|numeric',
            'postcode' => 'required',
            'land' => 'required',
            'email' => 'required|email',

            // Voeg hier meer validatieregels toe
        ], [
            'bedrijfsnaam.required' => 'Een bedrijfsnaam is verplicht.',
            'bedrijfsnaam.unique' => 'Deze bedrijfsnaam is al in gebruik.',
            'bedrijfsnaam.max' => 'De bedrijfsnaam mag niet meer dan 255 tekens bevatten.',
            'contactpersoon.required' => 'Een contactpersoon is verplicht.',
            'contactpersoon.max' => 'De contactpersoon mag niet meer dan 255 tekens bevatten.',
            'telefoon.required' => 'Een telefoonnummer is ongeldig.',
            'telefoon.numeric' => 'Het telefoonnummer moet numeriek zijn.',
            'volgende_levering.required' => 'De datum van de volgende levering is verplicht.',
            'volgende_levering.date' => 'De datum van de volgende levering moet een geldige datum zijn.',
            'volgende_levering.after_or_equal' => 'De datum van de volgende levering moet in de toekomst liggen.',
            'straatnaam.required' => 'Een straatnaam is verplicht.',
            'huisnummer.required' => 'Een huisnummer is verplicht.',
            'huisnummer.numeric' => 'Het huisnummer moet numeriek zijn.',
            'postcode.required' => 'Een postcode is verplicht.',
            'land.required' => 'Een land is verplicht.',
            'email.required' => 'Een e-mailadres is verplicht.',
            'email.email' => 'Het e-mailadres moet een geldig e-mailadres zijn.',

            // Voeg hier meer aangepaste foutberichten toe
        ]);
    
        $leverancier = new Leverancier();
        $leverancier->bedrijfsnaam = $validatedData['bedrijfsnaam'];
        $leverancier->contactpersoon = $validatedData['contactpersoon'];
        $leverancier->telefoon = $validatedData['telefoon'];
        $leverancier->volgende_levering = $validatedData['volgende_levering'];
        $leverancier->straatnaam = $validatedData['straatnaam'];
        $leverancier->huisnummer = $validatedData['huisnummer'];
        $leverancier->postcode = $validatedData['postcode'];
        $leverancier->land = $validatedData['land'];
        $leverancier->email = $validatedData['email'];


        // Vul de rest van de velden in
    
        $leverancier->save();
    
        return redirect()->route('leverancier.index')->with('success', 'Leverancier succesvol toegevoegd.');
    }

}

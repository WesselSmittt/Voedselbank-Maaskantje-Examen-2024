<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $zoekterm = $request->input('zoekterm');

        if (!empty($zoekterm)) {
            // Voer de zoekopdracht uit als er een zoekterm is.
            $klanten = Klant::where('voornaam', 'like', '%' . $zoekterm . '%')
                             ->orWhere('achternaam', 'like', '%' . $zoekterm . '%')
                             ->get();
        } else {
            // Haal alle klanten op als er geen zoekterm is.
            $klanten = Klant::all();
        }

        return view('klant.klantoverzicht', compact('klanten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('klant.klanttoevoegen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $klant = new Klant();
        $klant->voornaam = $request->voornaam;
        $klant->achternaam = $request->achternaam;
        $klant->adres = $request->adres;
        $klant->telefoon = $request->telefoon;
        $klant->email = $request->email;
        $klant->volwassenen = $request->volwassenen;
        $klant->kinderen = $request->kinderen;
        $klant->babys = $request->babys;
        $klant->save();
    
        // Redirect naar de klantoverzicht view na het opslaan
        return redirect()->route('klantoverzicht');
    }

    /**
     * Display the specified resource.
     */
    public function show(Klant $klant)
    {
        
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($klant_id)
    {
        $klant = Klant::find($klant_id);
        return view('klant.klantedit', compact('klant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $klant_id)
    {
        $request->validate([
            'voornaam' => 'required',
            'achternaam' => 'required',
            'adres' => 'required',
            'telefoon' => 'required',
            'email' => 'required|email',
            'volwassenen' => 'required|integer',
            'kinderen' => 'required|integer',
            'babys' => 'required|integer',
        ]);
        
        $klant = Klant::find($klant_id);
        $klant->voornaam = $request->voornaam;
        $klant->achternaam = $request->achternaam;
        $klant->adres = $request->adres;
        $klant->telefoon = $request->telefoon;
        $klant->email = $request->email;
        $klant->volwassenen = $request->volwassenen;
        $klant->kinderen = $request->kinderen;
        $klant->babys = $request->babys;
    
        $klant->save();
    
        return redirect()->route('klantoverzicht')->with('success', 'Klant succesvol bijgewerkt.');
        }

    /**
     * Remove the specified resource from storage.
     */


    

    
    public function destroy($klantId)
    {
        $klant = Klant::find($klantId);
    
        if ($klant === null) {
            return redirect()->back()->withErrors(['message' => 'Klant not found.']);
        }
    
        $klant->delete();
        return redirect()->route('klantoverzicht');
    }
}

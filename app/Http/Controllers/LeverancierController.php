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
         $leveranciers = Leverancier::all(); // Haalt alle leveranciers op uit de database
     
         return view('leverancier.index', compact('leveranciers')); // Stuurt de data naar de view
     }

    public function show($id)
    {
        $leverancier = Leverancier::findOrFail($id);
        return view('leverancier.show', compact('leverancier'));
    }

    public function edit($id)
    {
        $leverancier = Leverancier::findOrFail($id);
        return view('leverancier.edit', compact('leverancier'));
    }

    public function update(Request $request, $id)
    {
        $leverancier = Leverancier::findOrFail($id);
        $leverancier->update($request->all());
        return redirect()->route('leverancier.show', $leverancier->id);
    }

    public function destroy($id)
    {
        $leverancier = Leverancier::findOrFail($id);
        $leverancier->delete();
        return redirect()->route('leverancier.index');
    }

}

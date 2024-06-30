<?php

namespace App\Http\Controllers;

use App\Models\SpecialeBehoefte;
use Illuminate\Http\Request;

class SpecialeBehoefteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SpecialeBehoefte $specialeBehoefte)
    {
        $specialeBehoeften = SpecialeBehoefte::all(); // Zorg ervoor dat je het model gebruikt om data op te halen
        return view('specifiekewensen', compact('specialeBehoeften'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpecialeBehoefte $specialeBehoefte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpecialeBehoefte $specialeBehoefte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpecialeBehoefte $specialeBehoefte)
    {
        //
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Voedselpakket Aanmaken</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nieuw Voedselpakket Aanmaken
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl font-bold mb-4">Nieuw Voedselpakket Aanmaken</h1>

                        <form action="{{ route('voedselpakket.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="klant_id" class="block text-sm font-medium text-gray-700">Selecteer Klant:</label>
                                <select name="klant_id" id="klant_id" onchange="this.form.submit()" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">-- Kies een klant --</option>
                                    @foreach ($klanten as $klant)
                                        <option value="{{ $klant->id }}" {{ isset($selectedKlant) && $selectedKlant->id == $klant->id ? 'selected' : '' }}>
                                            {{ $klant->voornaam }} {{ $klant->achternaam }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @if (isset($selectedKlant))
                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold">Klantinformatie</h3>
                                    <p>Volwassenen: {{ $selectedKlant->volwassenen }}</p>
                                    <p>Kinderen: {{ $selectedKlant->kinderen }}</p>
                                    <p>Baby's: {{ $selectedKlant->babys }}</p>
                                </div>
                            @endif

                            <div class="mb-4">
                                <label for="samenstelling_datum" class="block text-sm font-medium text-gray-700">Datum van Samenstelling:</label>
                                <input type="date" name="samenstelling_datum" id="samenstelling_datum" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="mb-4">
                                <label for="uitgifte_datum" class="block text-sm font-medium text-gray-700">Datum van Uitgave:</label>
                                <input type="date" name="uitgifte_datum" id="uitgifte_datum" required class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="mb-4">
                                <label for="product_id" class="block text-sm font-medium text-gray-700">Select Product:</label>
                                <select name="product_id" id="product_id" class="form-select mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="">Select a product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-stock="{{ $product->hoeveelheid }}">
                                            {{ $product->product_naam }} (In Stock: {{ $product->hoeveelheid }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Additional fields for creating, depending on your requirements -->

                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Opslaan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>

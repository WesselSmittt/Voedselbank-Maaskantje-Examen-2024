<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Voedselpakket Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Voedselpakket Details</h1>

                    <div class="mb-4">
                        <p class="text-sm"><strong>Voedselpakket ID:</strong> {{ $voedselpakket->id }}</p>
                        <p class="text-sm"><strong>Klant:</strong> {{ $voedselpakket->klant->voornaam }} {{ $voedselpakket->klant->achternaam }}</p>
                        <p class="text-sm"><strong>Datum van Samenstelling:</strong> {{ $voedselpakket->samenstelling_datum }}</p>
                        <p class="text-sm"><strong>Datum van Uitgave:</strong> {{ $voedselpakket->uitgifte_datum }}</p>
                        <p class="text-sm"><strong>Product ID:</strong> {{ $voedselpakket->product_id }}</p>
                    </div>

                    <a href="{{ route('voedselpakket.index') }}" class="text-blue-500 hover:underline">Terug naar Voedselpakketten Overzicht</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

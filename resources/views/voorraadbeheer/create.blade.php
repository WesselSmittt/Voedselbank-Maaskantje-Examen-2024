<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                    <div class="mb-4">
                        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('voorraadbeheer.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="product_naam" class="block text-sm font-medium text-gray-700">Product Naam</label>
                            <input type="text" name="product_naam" id="product_naam" class="mt-1 block w-full" value="{{ old('product_naam') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="hoeveelheid" class="block text-sm font-medium text-gray-700">Hoeveelheid</label>
                            <input type="number" name="hoeveelheid" id="hoeveelheid" class="mt-1 block w-full" value="{{ old('hoeveelheid') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="categorie_id" class="block text-sm font-medium text-gray-700">Categorie</label>
                            <select name="categorie_id" id="categorie_id" class="mt-1 block w-full" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->categorie_id }}">{{ $category->categorie_naam }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="leverancier_id" class="block text-sm font-medium text-gray-700">Leverancier</label>
                            <select name="leverancier_id" id="leverancier_id" class="mt-1 block w-full" required>
                                @foreach($leveranciers as $leverancier)
                                <option value="{{ $leverancier->leverancier_id }}">{{ $leverancier->bedrijfsnaam }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="klant_id" class="block text-sm font-medium text-gray-700">Klant</label>
                            <select name="klant_id" id="klant_id" class="mt-1 block w-full" required>
                                @foreach($klanten as $klant)
                                <option value="{{ $klant->klant_id }}">{{ $klant->voornaam }} {{ $klant->achternaam }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="ean" class="block text-sm font-medium text-gray-700">EAN</label>
                            <div class="flex">
                                <input type="text" name="ean" id="ean" class="mt-1 block w-full" value="{{ old('ean') }}" readonly>
                                <button type="button" class="ml-2 px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="generateEAN()">
                                    {{ __('Generate EAN') }}
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function generateEAN() {
        let ean = '';
        for (let i = 0; i < 13; i++) {
            ean += Math.floor(Math.random() * 10);
        }
        document.getElementById('ean').value = ean;
    }
</script>
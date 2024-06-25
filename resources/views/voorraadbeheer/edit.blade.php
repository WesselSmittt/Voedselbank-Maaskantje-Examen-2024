    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Product') }}
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

                        <form method="POST" action="{{ route('voorraadbeheer.update', ['voorraad' => $voorraad->product_id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="product_naam" class="block text-sm font-medium text-gray-700">Product Naam</label>
                                <input type="text" name="product_naam" id="product_naam" class="mt-1 block w-full" value="{{ old('product_naam', $voorraad->product_naam) }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="hoeveelheid" class="block text-sm font-medium text-gray-700">Hoeveelheid</label>
                                <input type="number" name="hoeveelheid" id="hoeveelheid" class="mt-1 block w-full" value="{{ old('hoeveelheid', $voorraad->hoeveelheid) }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="leverancier" class="block text-sm font-medium text-gray-700">Leverancier</label>
                                <input type="text" name="leverancier" id="leverancier" class="mt-1 block w-full" value="{{ old('leverancier', $voorraad->leverancier->bedrijfsnaam) }}" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="klant" class="block text-sm font-medium text-gray-700">Klant</label>
                                <input type="text" name="klant" id="klant" class="mt-1 block w-full" value="{{ old('klant', $voorraad->klant->voornaam . ' ' . $voorraad->klant->achternaam) }}" readonly>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
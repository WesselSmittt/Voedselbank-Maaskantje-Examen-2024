<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Klant bijwerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('klant.update', ['id' => $klant->id]) }}" method="post">                        
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="voornaam" class="block text-gray-700 text-sm font-bold mb-2">Voornaam:</label>
                            <input type="text" name="voornaam" id="voornaam" value="{{ $klant->voornaam }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="achternaam" class="block text-gray-700 text-sm font-bold mb-2">Achternaam:</label>
                            <input type="text" name="achternaam" id="achternaam" value="{{ $klant->achternaam }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="adres" class="block text-gray-700 text-sm font-bold mb-2">Adres:</label>
                            <input type="text" name="adres" id="adres" value="{{ $klant->adres }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="telefoon" class="block text-gray-700 text-sm font-bold mb-2">Telefoon:</label>
                            <input type="tel" name="telefoon" id="telefoon" value="{{ $klant->telefoon }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" value="{{ $klant->email }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="volwassenen" class="block text-gray-700 text-sm font-bold mb-2">Volwassenen:</label>
                            <input type="number" name="volwassenen" id="volwassenen" value="{{ $klant->volwassenen }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="kinderen" class="block text-gray-700 text-sm font-bold mb-2">Kinderen:</label>
                            <input type="number" name="kinderen" id="kinderen" value="{{ $klant->kinderen }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="babys" class="block text-gray-700 text-sm font-bold mb-2">Babys:</label>
                            <input type="number" name="babys" id="babys" value="{{ $klant->babys }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Opslaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
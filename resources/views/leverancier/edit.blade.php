<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bewerk Leverancier
        </h2>
    </x-slot>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('leverancier.index') }}" style="background-color: #00D656; color: #FFFFFF;" class="font-bold py-2 px-4 rounded">Terug</a>   
                </div>    
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('leverancier.update', $leverancier->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col">
                            <label for="bedrijfsnaam" class="mb-2 font-semibold">Bedrijfsnaam:</label>
                            <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" value="{{ $leverancier->bedrijfsnaam }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="contactpersoon" class="mb-2 font-semibold">Contactpersoon:</label>
                            <input type="text" id="contactpersoon" name="contactpersoon" value="{{ $leverancier->contactpersoon }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="email" class="mb-2 font-semibold">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $leverancier->email }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="telefoon" class="mb-2 font-semibold">Telefoon:</label>
                            <input type="tel" id="telefoon" name="telefoon" value="{{ $leverancier->telefoon }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="straatnaam" class="mb-2 font-semibold">Straatnaam:</label>
                            <input type="text" id="straatnaam" name="straatnaam" value="{{ $leverancier->straatnaam }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="huisnummer" class="mb-2 font-semibold">Huisnummer:</label>
                            <input type="text" id="huisnummer" name="huisnummer" value="{{ $leverancier->huisnummer }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="postcode" class="mb-2 font-semibold">Postcode:</label>
                            <input type="text" id="postcode" name="postcode" value="{{ $leverancier->postcode }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="land" class="mb-2 font-semibold">Land:</label>
                            <input type="text" id="land" name="land" value="{{ $leverancier->land }}" required class="form-input">
                        </div>

                        <div class="flex flex-col">
                            <label for="volgende_levering" class="mb-2 font-semibold">Volgende Levering:</label>
                            <input type="date" id="volgende_levering" name="volgende_levering" value="{{ $leverancier->volgende_levering }}" required class="form-input">
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded hover:bg-blue-700 transition duration-300">Bijwerken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
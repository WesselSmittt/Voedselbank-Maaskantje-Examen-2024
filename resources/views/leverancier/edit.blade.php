<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bewerk Leverancier
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('leverancier.index') }}" style="background-color: #00D656; color: #FFFFFF;" class="font-bold py-2 px-4 rounded">Terug</a>   
                </div>    
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('leverancier.update', $leverancier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="bedrijfsnaam">Bedrijfsnaam:</label>
                            <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" value="{{ $leverancier->bedrijfsnaam }}" required>
                        </div>

                        <div>
                            <label for="contactpersoon">Contactpersoon:</label>
                            <input type="text" id="contactpersoon" name="contactpersoon" value="{{ $leverancier->contactpersoon }}" required>
                        </div>

                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $leverancier->email }}" required>
                        </div>

                        <div>
                            <label for="telefoon">Telefoon:</label>
                            <input type="tel" id="telefoon" name="telefoon" value="{{ $leverancier->telefoon }}" required>
                        </div>

                        <div>
                            <label for="straatnaam">Straatnaam:</label>
                            <input type="text" id="straatnaam" name="straatnaam" value="{{ $leverancier->straatnaam }}" required>
                        </div>

                        <div>
                            <label for="huisnummer">Huisnummer:</label>
                            <input type="text" id="huisnummer" name="huisnummer" value="{{ $leverancier->huisnummer }}" required>
                        </div> 

                        <div>
                            <label for="postcode">Postcode:</label>
                            <input type="text" id="postcode" name="postcode" value="{{ $leverancier->postcode }}" required>
                        </div>

                        <div>
                            <label for="land">Land:</label>
                            <input type="text" id="land" name="land" value="{{ $leverancier->land }}" required>
                        </div>

                        <div>
                            <label for="volgende_levering">Volgende Levering:</label>
                            <input type="date" id="volgende_levering" name="volgende_levering" value="{{ $leverancier->volgende_levering }}" required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Bijwerken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
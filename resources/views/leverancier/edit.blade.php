<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bewerk Leverancier
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

                        <!-- Voeg meer velden toe zoals nodig -->

                        <div>
                            <button type="submit" class="btn btn-primary">Bijwerken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe Leverancier Toevoegen
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="flex justify-center items-center">
            <div class="bg-green-500 text-white font-semibold p-4 mt-4 rounded-lg max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="flex justify-center items-center">
        <div class="bg-red-500 text-white font-semibold p-4 mt-4 rounded-lg max-w-2xl mx-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <a href="{{ route('leverancier.index') }}" style="background-color: #00D656; color: #FFFFFF;" class="font-bold py-2 px-4 rounded">Terug</a>   
                </div> 
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('leverancier.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="bedrijfsnaam" class="block text-sm font-medium text-gray-700">Bedrijfsnaam</label>
                            <input type="text" name="bedrijfsnaam" id="bedrijfsnaam" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="contactpersoon" class="block text-sm font-medium text-gray-700">Contactpersoon</label>
                            <input type="text" name="contactpersoon" id="contactpersoon" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="telefoon" class="block text-sm font-medium text-gray-700">Telefoon</label>
                            <input type="tel" name="telefoon" id="telefoon" class="mt-1 focus ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="straatnaam" class="block text-sm font-medium text-gray-700">Straatnaam</label>
                            <input type="text" name="straatnaam" id="straatnaam" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="huisnummer" class="block text-sm font-medium text-gray-700">Huisnummer</label>
                            <input type="text" name="huisnummer" id="huisnummer" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                            <input type="text" name="postcode" id="postcode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="land" class="block text-sm font-medium text-gray-700">Land</label>
                            <input type="text" name="land" id="land" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="volgende_levering" class="block text-sm font-medium text-gray-700">Volgende Levering</label>
                            <input type="date" name="volgende_levering" id="volgende_levering" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>

                        <!-- Additional fields here -->

                        <div>
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
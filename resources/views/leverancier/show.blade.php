<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leverancier Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('leverancier.index') }}" style="background-color: #00D656; color: #FFFFFF;" class="font-bold py-2 px-4 rounded">Terug</a>                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $leverancier->bedrijfsnaam }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Straatnaam: {{ $leverancier->straatnaam }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Huisnummer: {{ $leverancier->huisnummer }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Postcode: {{ $leverancier->postcode }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Land: {{ $leverancier->land }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Contactpersoon: {{ $leverancier->contactpersoon }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Email: {{ $leverancier->email }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Telefoon: {{ $leverancier->telefoon }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Volgende Levering: 
                        @if($leverancier->volgende_levering && strtotime($leverancier->volgende_levering))
                            {{ \Carbon\Carbon::parse($leverancier->volgende_levering)->toFormattedDateString() }}
                        @else
                            N/A
                        @endif
                    </p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('leverancier.edit', $leverancier->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">✏️</a>
                                        <form action="{{ route('leverancier.destroy', $leverancier->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">🗑️</button>
            </div>
        </div>
    </div>
</x-app-layout>
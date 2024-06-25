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
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $leverancier->bedrijfsnaam }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Contactpersoon: {{ $leverancier->contactpersoon }}
                    </p>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Email: {{ $leverancier->email }}
                    </p>
                    <!-- Voeg meer details toe zoals nodig -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voedselpakket Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Voedselpakket Overzicht') }}
            </h2>
        </x-slot>

        <!-- Success message -->
        @if(session('success'))
            <div class="flex justify-center items-center mt-4">
                <div class="bg-green-500 text-white font-semibold py-2 px-4 rounded-lg">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Error message -->
        @if(session('error'))
            <div class="flex justify-center items-center mt-4">
                <div class="bg-red-500 text-white font-semibold py-2 px-4 rounded-lg">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Button container -->
                    <div class="mb-4">
                        <a href="{{ route('voedselpakket.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Nieuw Voedselpakket</a>
                    </div>

                    <!-- Search bar -->
                    <div class="mb-4 flex">
                        <form action="{{ route('voedselpakket.search') }}" method="GET" class="mr-2">
                            <input type="text" name="search" placeholder="Zoek op klantnaam..." class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ request()->get('search') }}">
                            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Zoek</button>
                        </form>
                        <a href="{{ route('voedselpakket.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Terug</a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Klant Naam</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Voedselpakket ID</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Datum van Samenstelling</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Datum van Uitgave</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">Acties</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($voedselpakketten as $voedselpakket)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $voedselpakket->klant->voornaam }} {{ $voedselpakket->klant->achternaam }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $voedselpakket->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $voedselpakket->samenstelling_datum }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">{{ $voedselpakket->uitgifte_datum }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <a href="{{ route('voedselpakket.show', ['id' => $voedselpakket->id]) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Bekijk voedselpakket</a>
                                            @if (strtotime($voedselpakket->uitgifte_datum) > strtotime('today'))
                                                <form action="{{ route('voedselpakket.destroy', ['id' => $voedselpakket->id]) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Weet je zeker dat je dit voedselpakket wilt annuleren?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Annuleren</button>
                                                </form>
                                                <a href="{{ route('voedselpakket.edit', ['id' => $voedselpakket->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-2">Wijzigen</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Klanten Overzicht') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="px-4 py-2">Klantoverzicht</h1>
                    <td class="px-4 py-2"><a href="{{ route('klanttoevoegen') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Klant Toevoegen</a></td>
                    <table>
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Voornaam</th>
                                <th class="px-4 py-2">Achternaam</th>
                                <th class="px-4 py-2">Adres</th>
                                <th class="px-4 py-2">Telefoon</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Volwassenen</th>
                                <th class="px-4 py-2">Kinderen</th>
                                <th class="px-4 py-2">Babys</th>
                                <th class="px-4 py-2">Bijwerken</th>
                                <th class="px-4 py-2">Verwijderen</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klanten as $klant)
                                <tr class="{{ $klant->blocked ? 'opacity-50' : '' }}">
                                    <td class="px-4 py-2">{{ $klant->voornaam }}</td>
                                    <td class="px-4 py-2">{{ $klant->achternaam }}</td>
                                    <td class="px-4 py-2">{{ $klant->adres }}</td>
                                    <td class="px-4 py-2">{{ $klant->telefoon }}</td>
                                    <td class="px-4 py-2">{{ $klant->email }}</td>
                                    <td class="px-4 py-2">{{ $klant->volwassenen }}</td>
                                    <td class="px-4 py-2">{{ $klant->kinderen }}</td>
                                    <td class="px-4 py-2">{{ $klant->babys }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('klant.edit', $klant->klant_id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('klant.delete', $klant->klant_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Weet je zeker dat je deze klant wilt verwijderen?')">Verwijderen</button>
                                        </form>
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
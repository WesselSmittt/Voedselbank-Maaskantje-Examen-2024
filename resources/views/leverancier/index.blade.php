<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzicht leveranciers') }}
        </h2>
    </x-slot>

    //succes message
    @if(session('success'))
        <div class="flex justify-center items-center" id="successMessage">
            <div class="bg-green-500 text-white font-semibold p-4 mt-4 rounded-lg max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        </div>
    @endif

    //error message
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- De rest van de view -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="{{ route('leverancier.create') }}" style="background-color: #00D656; color: #FFFFFF;" class="font-bold py-2 px-4 rounded">Toevoegen</a>   
                </div>                 
                <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Bedrijfsnaam</th>
                                <th class="px-4 py-2">Contactpersoon</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Telefoon</th>
                                <th class="px-4 py-2">Volgende levering</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leveranciers as $leverancier)
                                <tr>
                                    <td class="border px-4 py-2">{{ $leverancier->bedrijfsnaam }}</td>
                                    <td class="border px-4 py-2">{{ $leverancier->contactpersoon }}</td>
                                    <td class="border px-4 py-2">{{ $leverancier->email }}</td>
                                    <td class="border px-4 py-2">{{ $leverancier->telefoon }}</td>
                                    <td class="border px-4 py-2">{{ $leverancier->volgende_levering }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('leverancier.show', $leverancier->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded" title="Bekijk details">👁️</a>
                                        <a href="{{ route('leverancier.edit', $leverancier->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded" title="Bewerk leverancier">✏️</a>
                                        <form action="{{ route('leverancier.destroy', $leverancier->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded" title="Verwijder leverancier">🗑️</button>
                                        </form> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

// Script to hide the success message after 3 seconds
<script>
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000);
</script>
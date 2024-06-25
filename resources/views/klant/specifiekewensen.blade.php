</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naam</th>
                            <th>Omschrijving</th>
                            <!-- Voeg meer kolommen toe indien nodig -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialeBehoeften as $behoefte)
                            <tr>
                             
                                <!-- Voeg meer cellen toe indien nodig -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
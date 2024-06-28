<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Voedselpakket Aanmaken</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0px;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        select, input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <x-app-layout>
        <div class="container">
            <h1>Nieuw Voedselpakket Aanmaken</h1>

            <form method="POST" action="{{ route('voedselpakket.store') }}">
                @csrf

                <label for="klant_id">Klant:</label>
                <select name="klant_id" id="klant_id" required>
                    @foreach ($klanten as $klant)
                        <option value="{{ $klant->id }}">{{ $klant->voornaam }} {{ $klant->achternaam }}</option>
                    @endforeach
                </select>

                <label for="samenstelling_datum">Datum van Samenstelling:</label>
                <input type="date" name="samenstelling_datum" id="samenstelling_datum" required>

                <label for="uitgifte_datum">Datum van Uitgave:</label>
                <input type="date" name="uitgifte_datum" id="uitgifte_datum" required>

                <label for="product_id">Select Product:</label>
                <select name="product_id" id="product_id" required>
                    <option value="">Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-stock="{{ $product->hoeveelheid }}">
                            {{ $product->product_naam }} (In Stock: {{ $product->hoeveelheid }})
                        </option>
                    @endforeach
                </select>

                <button type="submit">Opslaan</button>
            </form>
        </div>
    </x-app-layout>
</body>
</html>

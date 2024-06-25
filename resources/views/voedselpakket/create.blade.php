<!DOCTYPE html>
<html>
<head>
    <title>Nieuw Voedselpakket Aanmaken</title>
</head>
<body>
    <h1>Nieuw Voedselpakket Aanmaken</h1>

    <form method="POST" action="{{ route('voedselpakket.store') }}">
        @csrf

        <label for="klant_id">Klant:</label>
        <select name="klant_id" id="klant_id">
            @foreach ($klanten as $klant)
                <option value="{{ $klant->klant_id }}">{{ $klant->achternaam }}</option>
            @endforeach
        </select>
        <br><br>

        <label for="samenstelling_datum">Datum van Samenstelling:</label>
        <input type="date" name="samenstelling_datum" id="samenstelling_datum" required>
        <br><br>

        <label for="uitgifte_datum">Datum van Uitgave:</label>
        <input type="date" name="uitgifte_datum" id="uitgifte_datum" required>
        <br><br>
        <label for="product_id">Select Product:</label>
<select name="product_id" id="product_id" class="form-control" required>
    <option value="">Select a product</option>
    @foreach ($products as $product)
        <option value="{{ $product->id }}" data-stock="{{ $product->hoeveelheid }}">
            {{ $product->product_naam }} (In Stock: {{ $product->hoeveelheid }})
        </option>
    @endforeach
</select>

        <button type="submit">Opslaan</button>
    </form>
</body>
</html>

<!-- resources/views/voedselpakket/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Wijzig Voedselpakket</title>
</head>
<body>
    <h1>Wijzig Voedselpakket</h1>

    <form action="{{ route('voedselpakket.update', ['id' => $voedselpakket->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="samenstelling_datum">Samenstelling Datum:</label>
        <input type="date" id="samenstelling_datum" name="samenstelling_datum" value="{{ $voedselpakket->samenstelling_datum }}">
        <br>

        <label for="uitgifte_datum">Uitgifte Datum:</label>
        <input type="date" id="uitgifte_datum" name="uitgifte_datum" value="{{ $voedselpakket->uitgifte_datum }}">
        <br>

        <label for="product_id">Select Product:</label>
        <select name="product_id" id="product_id" class="form-control" required>
    <option value="">Select a product</option>
    @foreach ($products as $product)
        <option value="{{ $product->id }}" data-stock="{{ $product->hoeveelheid }}">
            {{ $product->product_naam }} (In Stock: {{ $product->hoeveelheid }})
        </option>
    @endforeach
</select>
        <br>

        <!-- Andere velden voor wijziging, afhankelijk van je behoeften -->

        <button type="submit">Opslaan</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Voedselpakket Details</title>
</head>
<body>
    <h1>Voedselpakket Details</h1>

    <h2>Voedselpakket ID: {{ $voedselpakket->id }}</h2>
    <p><strong>Klant:</strong> {{ $voedselpakket->klant->voornaam }} {{ $voedselpakket->klant->achternaam }} </p>
    <p><strong>Datum van Samenstelling:</strong> {{ $voedselpakket->samenstelling_datum }}</p>
    <p><strong>Datum van Uitgave:</strong> {{ $voedselpakket->uitgifte_datum }}</p>
    <p><strong>Product ID:</strong> {{ $voedselpakket->product_id }}</p> 

    <a href="{{ route('voedselpakket.index') }}">Terug naar Voedselpakketten Overzicht</a>
</body>
</html>

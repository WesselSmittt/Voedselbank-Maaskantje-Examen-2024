<!DOCTYPE html>
<html>
<head>
    <title>Voedselpakket Overzicht</title>
    <style>
        .button-container {
            margin-bottom: 20px;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            color: #fff;
        }
        .btn-green {
            background-color: green;
        }
        .btn-red {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <a href="{{ route('voedselpakket.create') }}" class="btn btn-green">Nieuw Voedselpakket</a>
    </div>

    <div class="search-bar">
        <form action="{{ route('voedselpakket.search') }}" method="GET">
            <input type="text" name="search" placeholder="Zoek op klantnaam...">
            <button type="submit">Zoek</button>
        </form>
    </div>

    <h1>Voedselpakketten Overzicht</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Klant Naam</th>
                <th>Voedselpakket ID</th>
                <th>Datum van Samenstelling</th>
                <th>Datum van Uitgave</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($voedselpakketten as $voedselpakket)
    <tr>
    <td>{{ optional(optional($voedselpakket)->klant)->achternaam }}</td>
        <td>{{ $voedselpakket->id }}</td>
        <td>{{ $voedselpakket->samenstelling_datum }}</td>
        <td>{{ $voedselpakket->uitgifte_datum }}</td>
        <td>
            <a href="{{ route('voedselpakket.show', ['id' => $voedselpakket->id]) }}">Bekijk voedselpakket</a>
            @if (strtotime($voedselpakket->uitgifte_datum) > strtotime('today'))
                <button class="btn btn-red" onclick="alert('Voedselpakket annuleren')">Annuleren</button>
            @endif
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</body>
</html>

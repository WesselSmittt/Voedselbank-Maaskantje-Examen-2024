<!DOCTYPE html>
<html>
<head>
    <title>Voedselpakket Overzicht</title>
    <style>
        .button-container {
            margin-bottom: 20px;
            padding-top: 10px;
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
            text-decoration: none; 
        }
        .btn-red {
            background-color: red;
            text-decoration: none; 
        }
        .btn-blue {
            background-color: blue;
            text-decoration: none; 
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
            <button type="submit"> Zoek</button>
        </form>
        <p><a href="{{ route('voedselpakket.index') }}"><button>Terug</button></a></p>
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
    <td>{{ $voedselpakket->klant->voornaam }} {{ $voedselpakket->klant->achternaam }}</td>
        <td>{{ $voedselpakket->id }}</td>
        <td>{{ $voedselpakket->samenstelling_datum }}</td>
        <td>{{ $voedselpakket->uitgifte_datum }}</td>
        <td>
            <a href="{{ route('voedselpakket.show', ['id' => $voedselpakket->id]) }}" class="btn btn-green">Bekijk voedselpakket</a>
            @if (strtotime($voedselpakket->uitgifte_datum) > strtotime('today'))
            <form action="{{ route('voedselpakket.destroy', ['id' => $voedselpakket->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-red" onclick="return confirm('Are you sure you want to delete this voedselpakket?')">Annuleren</button>
            </form>
            <a href="{{ route('voedselpakket.edit', ['id' => $voedselpakket->id]) }}" class="btn btn-blue">Wijzigen</a>
            @endif
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</body>
</html>

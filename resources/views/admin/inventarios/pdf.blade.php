<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid rgb(22, 20, 20);
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Listado de Inventario</h1>
    <table>
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Cantidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->descripcion }}</td>
                    <td>{{ $inventario->ubicacion }}</td>
                    <td>{{ $inventario->cantidad }}</td>
                    <td>{{ $inventario->condicion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

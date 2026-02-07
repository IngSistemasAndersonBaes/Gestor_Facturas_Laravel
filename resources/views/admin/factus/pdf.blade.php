{{-- resources/views/admin/factus/pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Facturas</title>
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
    <h1>Listado de Facturas</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Número de Factura</th>
                <th>Proveedor</th>
                <th>Monto</th>
                <th>Concepto</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factus as $factu)
                <tr>
                    <td>{{ $factu->fecha->format('Y-m-d') }}</td>
                    <td>{{ str_pad($factu->No_Factura, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $factu->Proveedor }}</td>
                    <td>{{ number_format($factu->Monto, 2) }}</td>
                    <td>{{ $factu->Concepto }}</td>
                    <td>{{ $factu->Tipo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

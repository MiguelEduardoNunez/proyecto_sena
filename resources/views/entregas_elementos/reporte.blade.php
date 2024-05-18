<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Entrega de Elementos</title>
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
</head>
<body>
    <x-text size="h4" color="primary" :value="__('Entrega de Elementos')" class="text-center mb-4" />

    <x-text size="h6" color="black" :value="__('Proyecto')" />
    <x-text size="h6" style="font-weight-normal" color="black" :value="$proyecto->proyecto" />

    <x-text size="h6" color="black" :value="__('Empleado')" class="mt-4" />
    <x-text size="h6" style="font-weight-normal" color="black" :value="$entrega_elemento->empleado->empleado" />

    <x-text size="h6" color="black" :value="__('Fecha de Entrega')" class="mt-4" />
    <x-text size="h6" style="font-weight-normal" color="black" :value="$entrega_elemento->fecha_entrega" />

    <x-data-table :headers="['#', 'Elemento', 'Marca', 'Modelo', 'Tipo de Cantidad', 'Cantidad Entregada']" class="mt-4">
        @foreach ($detalle_entrega_elementos as $detalle_entrega_elemento)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detalle_entrega_elemento->elemento->item->item }}</td>
                <td>{{ $detalle_entrega_elemento->elemento->marca }}</td>
                <td>{{ $detalle_entrega_elemento->elemento->modelo }}</td>
                <td>{{ $detalle_entrega_elemento->elemento->tipoCantidad->tipo_cantidad }}</td>
                <td>{{ $detalle_entrega_elemento->cantidad }}</td>
            </tr>
        @endforeach
    </x-data-table>
</body>
</html>
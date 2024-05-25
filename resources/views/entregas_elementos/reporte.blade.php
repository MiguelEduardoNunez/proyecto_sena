<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Entrega de Elementos</title>
    <!-- AdminLTE App -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    <style>
        .firma {
            display: inline-block;
            width: 200px;
            border-bottom: 2px solid #000000;
        }
    </style>
</head>
<body>
    <div class="mb-5">
        <h4 class="font-weight-bold text-primary d-inline">Entrega de Elementos</h4>
        <h5 class="font-weight-bold text-primary d-inline float-right">#{{ $entrega_elemento->id_entrega_elemento }}</h5>
    </div>

    <div class="d-block">
        <h6 class="font-weight-bold d-inline">Proyecto:</h6>
        <h6 class="font-weight-normal d-inline ml-1">{{ $proyecto->proyecto }}</h6>
    </div>

    <div class="d-block">
        <h6 class="font-weight-bold d-inline">Empleado:</h6>
        <h6 class="font-weight-normal d-inline ml-1">{{ $entrega_elemento->empleado->empleado }}</h6>
    </div>

    <div class="d-block">
        <h6 class="font-weight-bold d-inline">Fecha de Entrega:</h6>
        <h6 class="font-weight-normal d-inline ml-1">{{ $entrega_elemento->fecha_entrega }}</h6>
    </div>

    <table class="table mt-5">
        <thead class="bg-primary text-white">
            <tr>
                <th>#</th>
                <th>Elemento</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Tipo de Cantidad</th>
                <th>Cantidad Entregada</th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
    </table>

    <div class="text-center mt-5">
        <div class="firma mt-5"></div>
        <h6 class="font-weight-bold">Firma Empleado</h6>
    </div>
</body>
</html>
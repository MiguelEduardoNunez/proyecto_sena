<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Proyecto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            text-align: center;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        .elemento {
            margin-bottom: 20px;
        }

        .elemento p {
            margin: 5px 0;
        }

        .elemento p strong {
            font-weight: bold;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>{{ $proyecto->proyecto }}</h1>
        <h3> {{ $proyecto->descripcion }}</h3>
        <hr>

        <div class="datos-proyecto">

            @foreach ($elementos as $elemento)
            <div class="elemento">
                <p><strong>Elemento:</strong> {{ $elemento->item->item }}</p>
                <p><strong>Marca:</strong> {{ $elemento->marca }}</p>
                <p><strong>Modelo:</strong> {{ $elemento->modelo }}</p>
                <p><strong>Serial:</strong> {{ $elemento->serial }}</p>
                <p><strong>Span:</strong> {{ $elemento->span }}</p>
                <p><strong>Código de Barras:</strong> {{ $elemento->codigo_barras }}</p>
                <p><strong>Grosor:</strong> {{ $elemento->grosor }}</p>
                <p><strong>Peso:</strong> {{ $elemento->peso }}</p>
                <p><strong>Tipo cantidad:</strong> {{ $elemento->tipoCantidad->tipo_cantidad }}</p>
                <p><strong>Cantidad:</strong> {{ $elemento->cantidad }}</p>
                <p><strong>Cantidad Mínima:</strong> {{ $elemento->cantidad_minima }}</p> 
                
            </div>
            <hr> 
            @endforeach
        </div>
    </div>
</body>
</html>

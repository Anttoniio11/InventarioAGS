<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREAS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Detalles del Area</h1>

        <div class="card">
            <div class="card-header">AREA #{{ $area->id }}</div>
            <div class="card-body">
                <p><strong>area:</strong> {{ $area->area }}</p>
                <a href="{{ route('areas.index') }}" class="btn btn-primary">Regresar</a>
                <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</body>
</html>

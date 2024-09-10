<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEDES</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Detalles de la Sede</h1>

        <div class="card">
            <div class="card-header">Sede #{{ $sede->id }}</div>
            <div class="card-body">
                <p><strong>sede:</strong> {{ $sede->sede }}</p>
                <a href="{{ route('sedes.index') }}" class="btn btn-primary">Regresar</a>
                <a href="{{ route('sedes.edit', $sede->id) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</body>
</html>

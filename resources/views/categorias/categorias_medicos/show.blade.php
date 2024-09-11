<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Categoría Médica</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Detalles de la Categoría Médica</h1>

        <div class="card">
            <div class="card-header">Categoría Médica #{{ $categoria->id }}</div>
            <div class="card-body">
                <p><strong>Código:</strong> {{ $categoria->codigo }}</p>
                <p><strong>Categoría:</strong> {{ $categoria->categoria }}</p>
                <a href="{{ route('categorias-medicos.index') }}" class="btn btn-primary">Regresar</a>
                <a href="{{ route('categorias-medicos.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
</body>
</html>

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
        <h1>Editar Sede</h1>

        <form action="{{ route('sedes.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sede">Sede</label>
                <input type="text" class="form-control @error('sede') is-invalid @enderror" id="sede" name="sede" value="{{ old('sede', $sede->sede) }}" required>
                @error('sede')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>

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
        <h1>Editar Area</h1>

        <form action="{{ route('areas.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ old('area', $area->area) }}" required>
                @error('area')
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

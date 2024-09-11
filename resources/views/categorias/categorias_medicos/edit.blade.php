<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría Médica</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Categoría Médica</h1>

        <form action="{{ route('categorias-medicos.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="codigo">Código</label>
                <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo', $categoria->codigo) }}" required>
                @error('codigo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="categoria">Categoría</label>
                <input type="text" class="form-control @error('categoria') is-invalid @enderror" id="categoria" name="categoria" value="{{ old('categoria', $categoria->categoria) }}" required>
                @error('categoria')
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

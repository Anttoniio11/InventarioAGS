<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Sede</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Agregar Nueva Sede</h1>

        <form action="{{ route('sedes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="text" class="form-control @error('nit') is-invalid @enderror" id="nit" name="nit" value="{{ old('nit') }}" required>
                @error('nit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="razon_social">Razón Social</label>
                <input type="text" class="form-control @error('razon_social') is-invalid @enderror" id="razon_social" name="razon_social" value="{{ old('razon_social') }}" required>
                @error('razon_social')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="departamento">Departamento</label>
                <input type="text" class="form-control @error('departamento') is-invalid @enderror" id="departamento" name="departamento" value="{{ old('departamento') }}" required>
                @error('departamento')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="municipio">Municipio</label>
                <input type="text" class="form-control @error('municipio') is-invalid @enderror" id="municipio" name="municipio" value="{{ old('municipio') }}" required>
                @error('municipio')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>

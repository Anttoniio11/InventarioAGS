<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Proveedores</h1>

        <form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nit">Nit</label>
                <input type="text" class="form-control @error('nit') is-invalid @enderror" id="nit" name="nit" value="{{ old('nit', $proveedor->nit) }}" required>
                @error('nit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control id="nombre" name="nombre" value="{{ old('nombre') }}" required>
               
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control id="telefono" name="telefono" value="{{ old('telefono') }}" required>
               
                <label for="email">Email</label>
                <input type="email" class="form-control id="email" name="email" value="{{ old('email') }}" required>
               
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control id="direccion" name="direccion" value="{{ old('direccion') }}" required>
               
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>

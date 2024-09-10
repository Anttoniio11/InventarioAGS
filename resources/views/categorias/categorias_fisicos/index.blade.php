<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías Fisicos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Categorías Tecnológicas</h1>
        <a href="{{ route('categorias-fisicos.create') }}" class="btn btn-primary mb-3">Agregar Nueva Categoría</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->categoria }}</td>
                        <td>
                            <a href="{{ route('categorias-fisicos.show', $categoria->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('categorias-fisicos.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('categorias-fisicos.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $categorias->links() }}
    </div>
</body>
</html>

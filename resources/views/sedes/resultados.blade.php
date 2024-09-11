<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Resultados de Búsqueda</h1>

        <a href="{{ route('sedes.index') }}" class="btn btn-primary mb-3">Volver al Listado</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIT</th>
                    <th>Razón Social</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sedes as $sede)
                    <tr>
                        <td>{{ $sede->id }}</td>
                        <td>{{ $sede->nit }}</td>
                        <td>{{ $sede->razon_social }}</td>
                        <td>{{ $sede->departamento }}</td>
                        <td>{{ $sede->municipio }}</td>
                        <td>
                            <a href="{{ route('sedes.show', $sede->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('sedes.edit', $sede->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('sedes.destroy', $sede->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $sedes->links() }}
    </div>
</body>
</html>

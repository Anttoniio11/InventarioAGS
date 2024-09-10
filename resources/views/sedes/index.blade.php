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
        <h1>SEDES</h1>
        <a href="{{ route('sedes.create') }}" class="btn btn-primary mb-3">Agregar Nueva Sede</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sede</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sedes as $sede)
                    <tr>
                        <td>{{ $sede->id }}</td>
                        <td>{{ $sede->sede }}</td>
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

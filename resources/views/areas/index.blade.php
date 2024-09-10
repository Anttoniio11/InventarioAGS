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
        <h1>AREAS</h1>
        <a href="{{ route('areas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Area</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Area</th>
                </tr>
            </thead>
            <tbody>
                @foreach($areas as $area)
                    <tr>
                        <td>{{ $area->id }}</td>
                        <td>{{ $area->area }}</td>
                        <td>
                            <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $areas->links() }}
    </div>
</body>
</html>

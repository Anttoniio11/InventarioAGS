<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoja de Vida - {{ $elemento->codigo }}</title>
    <link rel="stylesheet" href="{{ public_path('/css/pdf/hojaDeVida.css') }}">
</head>
<body>
    <h1>Hoja de Vida del Elemento Físico</h1>
    <p>Código: {{ $elemento->codigo }}</p>
    <p>Marca: {{ $elemento->marca }}</p>
    <p>Modelo: {{ $elemento->modelo }}</p>
    <p>Ubicación Interna: {{ $elemento->ubicacion_interna }}</p>
    <p>Disponibilidad: {{ $elemento->disponibilidad }}</p>
    <p>Código QR: {{ $elemento->codigo_QR }}</p>
    <p>Categoría: {{ $elemento->categoria->categoria }}</p>

</body>
</html> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Publicación</title>
</head>
<body>
    <h1>{{ $publicacion->titulo }}</h1>
    <p>{{ $publicacion->contenido }}</p>

    <a href="{{ route('publicaciones.index') }}">Volver al listado</a>
</body>
</html>

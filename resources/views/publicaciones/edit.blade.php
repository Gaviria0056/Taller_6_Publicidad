<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Publicación</title>
</head>
<body>
    <h1>Editar Publicación</h1>

    <form action="{{ route('publicaciones.update', $publicacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="{{ $publicacion->titulo }}" required><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" required>{{ $publicacion->contenido }}</textarea><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('publicaciones.index') }}">Volver</a>
</body>
</html>

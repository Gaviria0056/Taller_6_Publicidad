<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Publicación</title>
</head>
<body>
    <h1>Crear Nueva Publicación</h1>

    <form action="{{ route('publicaciones.store') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br>

        <label for="contenido">Contenido:</label>
        <textarea name="contenido" id="contenido" required></textarea><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('publicaciones.index') }}">Volver</a>
</body>
</html>

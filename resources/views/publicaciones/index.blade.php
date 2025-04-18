<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Publicaciones</title>
</head>
<body>
    <h1>Publicaciones</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <a href="{{ route('publicaciones.create') }}">Crear Nueva Publicación</a>
    <ul>
        @foreach ($publicaciones as $publicacion)
            <li>
                <h2>{{ $publicacion->titulo }}</h2>
                <p>{{ $publicacion->contenido }}</p>
                <a href="{{ route('publicaciones.show', $publicacion->id) }}">Ver</a> |
                <a href="{{ route('publicaciones.edit', $publicacion->id) }}">Editar</a> |
                <form action="{{ route('publicaciones.destroy', $publicacion->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>

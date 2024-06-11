<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar reserva - SportConnect</title>
</head>
<body>
    <header>
        <div id="logo"></div>
        <nav>
            <a href="/">INICIO</a>
            <a href="/reservas" class="active">RESERVAS</a>
            <a href="/equipos">EQUIPOS</a>
            @auth
                <a href="/miPerfil">MI PERFIL</a>
                <a href="/cerrarSesion">CERRAR SESIÓN</a>
            @else
                <a href="/login">INICIAR SESIÓN</a>
                <a href="/registro">REGISTRARSE</a>
            @endauth
        </nav>
    </header>
    
<h1>Modificar reserva</h1>

<form action="{{ route('actualizarreserva', ['id' => $reserva->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="{{ $reserva->nombre }}" required><br><br>

    <label for="tiempo">Tiempo:</label><br>
    <input type="number" id="tiempo" name="tiempo" value="{{ $reserva->tiempo }}" required><br><br>

    <label for="dificultad">Dificultad:</label><br>
    <select id="dificultad" name="dificultad" required>
        <option value="facil" {{ $reserva->dificultad == 'facil' ? 'selected' : '' }}>Fácil</option>
        <option value="media" {{ $reserva->dificultad == 'media' ? 'selected' : '' }}>Media</option>
        <option value="compleja" {{ $reserva->dificultad == 'compleja' ? 'selected' : '' }}>Compleja</option>
    </select><br><br>

    <label for="tipo">Tipo:</label><br>
    <select id="tipo" name="tipo" required>
        <option value="tradicional" {{ $reserva->tipo == 'tradicional' ? 'selected' : '' }}>Tradicional</option>
        <option value="slow food" {{ $reserva->tipo == 'slow food' ? 'selected' : '' }}>Slow food</option>
        <option value="freidora sin aceite" {{ $reserva->tipo == 'freidora sin aceite' ? 'selected' : '' }}>Freidora sin aceite</option>
    </select><br><br>

    <label for="texto">Descripción:</label><br>
    <textarea id="texto" name="texto" required>{{ $reserva->texto }}</textarea><br><br>

    <label for="imagen">Imagen:</label><br>
    <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>

    <button type="submit">Actualizar reserva</button>
</form>

</body>
</html>

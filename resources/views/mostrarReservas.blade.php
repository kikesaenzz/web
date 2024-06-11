<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserva: {{ $reserva->nombre }}</title>
    <link rel="stylesheet" href="/miCarpeta/style.css">

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

    <div class="">
        <h2>Detalles de la reserva</h2>
    <div class="">
            <p><strong>Tiempo:</strong> {{ $reserva->tiempo }}</p>
            <p><strong>Dificultad:</strong> {{ $reserva->dificultad }}</p>
            <p><strong>Como se hace:</strong> {{ $reserva->texto }}</p>
            <p><strong>Tipo:</strong> {{ $reserva->tipo }}</p>
            <p><strong>Fecha:</strong> {{ $reserva->fecha }}</p>
            <p><strong>ID del usuario:</strong> {{ $reserva->id_usuario }}</p>
            <p><img class="reserva-img" src="{{ $reserva->foto }}" alt="Imagen de la reserva"></p>
        </div>
    </div>
    <a href="{{ url('reservas') }}" class="btn-reservas btn-comentar">Volver a reservas</a>
    <div class="comentarios-container">
    @if (session()->has('nombre_usuario'))
    <form action="" method="post">

        <section id="comentarios">
    <h2>Comentarios:</h2>
    <?php
        foreach($reserva->comentarios as $comentario){
            echo '<div class="comentario"> <p><strong>';
            echo $comentario->autor->nombre_usuario;
            echo ':</strong> ';
            echo $comentario->texto;

            echo '<strong>     Valoracion:';
            echo $comentario->valoracion;
            echo '</strong> ';
            echo '</p></div>';
        }
    ?>

    <div class="nuevo-comentario">
        <h3>Añadir Comentario:</h3>
        <form action="/reserva/{{$reserva->id}}" method="post">
            @csrf


            <label for="valoracion">Valoración:</label>

            <div class="valoracion-estrellas">
            <input type="radio" id="estrella1" name="valoracion" value="5">
            <label for="estrella1">&#9733;</label>

            <input type="radio" id="estrella2" name="valoracion" value="4">
            <label for="estrella2">&#9733;</label>

            <input type="radio" id="estrella3" name="valoracion" value="3">
            <label for="estrella3">&#9733;</label>

            <input type="radio" id="estrella4" name="valoracion" value="2">
            <label for="estrella4">&#9733;</label>

            <input type="radio" id="estrella5" name="valoracion" value="1">
            <label for="estrella5">&#9733;</label>

        </div>
        <label for="comentario">Comentario:</label>
        <textarea id="comentario" name="comentario" rows="4" required></textarea>
            <button type="submit">Publicar Comentario</button>
            <input type="hidden" name="id_reserva" value="{{ $reserva->id }}">
        </form>
    </div> 


    </form>
@endif

    </div>
</body>
</html>
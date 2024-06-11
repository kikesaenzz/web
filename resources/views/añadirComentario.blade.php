<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportConnect - Añadir Comentario</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">
</head>
<body>
    <header>
        <div id="logo"></div>
        <nav>
            <a href="/">INICIO</a>
            <a href="/reservas" class="active" >RESERVAS</a>
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

<h1>Añadir Comentario</h1>

<form action="/reserva/{{$reserva->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="comentario">Comentario:</label>
    <textarea id="comentario" name="comentario" required></textarea>

    <label for="valoracion">Tu valoración (1-5):</label>
    <input type="number" id="valoracion" name="valoracion" min="1" max="5" required>

    <input type="hidden" name="id_reserva" value="{{ $id }}">

    <button type="submit">Añadir Comentario</button>
</form>

<footer id="footer">
    <div class="separador"></div>
    © <span id="currentYear"></span> SportConnect. Todos los derechos reservados.
</footer>

<script>
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
</script>
</body>
</html>

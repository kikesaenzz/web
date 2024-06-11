
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportConnect</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
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

<?php if (session()->has('esAdmin') && session('esAdmin') == 1) { ?>
    <form action="/insertarreserva" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>  

        <label for="tiempo">Tiempo:</label>
        <input type="number" id="tiempo" name="tiempo" required>

        <label for="dificultad">Dificultad:</label>
        <select id="dificultad" name="dificultad" required>
            <option value="facil">Fácil</option>
            <option value="media">Media</option>
            <option value="compleja">Compleja</option>
        </select>

        <select id="tipo" name="tipo" required>
            <option value="tradicional">Tradicional</option>
            <option value="slow food">Slow food</option>
            <option value="freidora sin aceite">Freidora sin aceite</option>
        </select>

        <label for="texto">Texto:</label>
        <textarea id="texto" name="texto" required></textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">

        <button type="submit">Añadir reserva</button>
    </form>
<?php } ?>

<footer id="footer">
<div class="separador"></div>
    © <span id="currentYear"></span> SportConnect. Todos los derechos reservados.
</footer>
<script>
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesión - ForoPlatos</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">
</head>
<body>

    <header>
        <div id="logo"></div>
        <nav>
            <a href="/">INICIO</a>
            <a href="/reservas">RESERVAS</a>
            <a href="/equipos">EQUIPOS</a>
            @auth
                <a href="/miPerfil">MI PERFIL</a>
                <a href="/cerrarSesion" class="active">CERRAR SESIÓN</a>
            @else
                <a href="/login">INICIAR SESIÓN</a>
                <a href="/registro">REGISTRARSE</a>
            @endauth
        </nav>
    </header>
<div class="separador"></div>
<main>
    <h3 class="form-title">Cerrar Sesión</h3>

    <form action="/logout" method="POST" class="logout-form">
        @csrf
        <p>¿Estás seguro de que deseas cerrar sesión?</p>
        <button type="submit" name="accion" value="cerrarSesion">Cerrar Sesión</button>
    </form>
</main>

<footer id="footer">
    <div class="separador"></div>
    © <span id="currentYear"></span> ForoPlatos. Todos los derechos reservados.
</footer>

<script>
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - SportConnect</title>
    <link rel="icon" href="/miCarpeta/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<header>
    <div id="logo"></div>
    <nav>
        <a href="/">INICIO</a>
        <a href="/reservas">RESERVAS</a>
        <a href="/equipos">EQUIPOS</a>
        @auth
            <a href="/miPerfil" class="active">MI PERFIL</a>
            <a href="/cerrarSesion">CERRAR SESIÓN</a>
        @else
            <a href="/login">INICIAR SESIÓN</a>
            <a href="/registro">REGISTRARSE</a>
        @endauth
    </nav>
</header>



<div class="separador"></div>
<main class="perfil-container">
    <section class="perfil-section">
        <h1 class="perfil-heading">Mi Perfil</h1>
        
        <!-- Mostrar todos los datos del usuario -->
        <p class="perfil-info">Nombre de usuario: {{ $usuario->nombre_usuario }}</p>
        <p class="perfil-info">Nombre: {{ $usuario->nombre }}</p>
        <p class="perfil-info">Apellidos: {{ $usuario->apellidos }}</p>
        <p class="perfil-info">Correo electrónico: {{ $usuario->correo }}</p>
        <p class="perfil-info">Experiencia: {{ $usuario->experiencia }}</p>
        <p class="perfil-info">Fecha de nacimiento: {{ $usuario->fecha_nacimiento }}</p>
        
        <!-- Formulario para modificar el perfil -->
        <h2 class="perfil-subheading">Modificar Perfil</h2>
        <form action="/actualizarPerfil" method="post">
            @csrf
            <label class="perfil-label" for="nombre_usuario">Nombre de usuario</label>
            <input class="perfil-input" type="text" id="nombre_usuario" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}" required>
            
            <label class="perfil-label" for="nombre">Nombre</label>
            <input class="perfil-input" type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
            
            <label class="perfil-label" for="apellidos">Apellidos</label>
            <input class="perfil-input" type="text" id="apellidos" name="apellidos" value="{{ $usuario->apellidos }}" required>
            
            <label class="perfil-label" for="contrasena">Contraseña</label>
            <div style="position: relative;">
                <input class="perfil-input" type="password" id="contrasena" name="contrasena" required>
                <i class="fas fa-eye show-password-icon" onclick="togglePasswordVisibility()"></i>
            </div>
            
            <label class="perfil-label" for="correo">Correo electrónico</label>
            <input class="perfil-input" type="email" id="correo" name="correo" value="{{ $usuario->correo }}" required>
            
            <label class="perfil-label" for="experiencia">Experiencia</label>
            <select class="perfil-input" id="experiencia" name="experiencia">
                <option value="Principiante" {{ $usuario->experiencia == 'Principiante' ? 'selected' : '' }}>Principiante</option>
                <option value="Experimentado" {{ $usuario->experiencia == 'Experimentado' ? 'selected' : '' }}>Experimentado</option>
                <option value="Profesional" {{ $usuario->experiencia == 'Profesional' ? 'selected' : '' }}>Profesional</option>
            </select>
            
            <label class="perfil-label" for="fecha_nacimiento">Fecha de nacimiento</label>
            <input class="perfil-input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}">
            
            <button class="perfil-button" type="submit" name="accion" value="actualizarPerfil">Guardar Cambios</button>
        </form>
    </section>
</main>


<footer id="footer">
    <div class="separador"></div>
    © <span id="currentYear"></span> SportConnect. Todos los derechos reservados.
</footer>

<script>
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();

    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("contrasena");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</body>
</html>

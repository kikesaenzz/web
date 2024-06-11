<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportConnect</title>
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
                <a href="/miPerfil">MI PERFIL</a>
                <a href="/cerrarSesion">CERRAR SESIÓN</a>
            @else
                <a href="/login">INICIAR SESIÓN</a>
                <a href="/registro" class="active">REGISTRARSE</a>
            @endauth
        </nav>
    </header>
<div class="separador"></div>

<h3 class="form-title">REGISTRARSE</h3>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/registro" method="post" class="register-form">
    @csrf
    <div>
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ old('nombre_usuario') }}" required>
        @error('nombre_usuario')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        @error('nombre')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
        @error('apellidos')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="contrasena">Contraseña:</label>
        <div style="position: relative;">
            <input type="password" id="contrasena" name="contrasena" required>
            <i class="fas fa-eye show-password-icon" onclick="togglePasswordVisibility()"></i>
        </div>
        @error('contrasena')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="{{ old('correo') }}" required>
        @error('correo')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="experiencia">Experiencia:</label>
        <select id="experiencia" name="experiencia">
            <option value="Principiante" {{ old('experiencia') == 'Principiante' ? 'selected' : '' }}>Principiante</option>
            <option value="Experimentado" {{ old('experiencia') == 'Experimentado' ? 'selected' : '' }}>Experimentado</option>
            <option value="Profesional" {{ old('experiencia') == 'Profesional' ? 'selected' : '' }}>Profesional</option>
        </select>
        @error('experiencia')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
    </div>

    <button type="submit">Registrar</button>
</form>

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

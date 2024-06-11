<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SportConnect</title>
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
            <?php if(auth()->guard()->check()): ?>
                <a href="/miPerfil">MI PERFIL</a>
                <a href="/cerrarSesion">CERRAR SESIÓN</a>
            <?php else: ?>
                <a href="/login" class="active">INICIAR SESIÓN</a>
                <a href="/registro">REGISTRARSE</a>
            <?php endif; ?>
        </nav>
    </header>

    
<div class="separador"></div>
<main>
    <h3 class="form-title">Iniciar Sesión</h3>

    <form action="/login" method="post" class="login-form">
        <?php echo csrf_field(); ?>
        <label for="correo">Correo</label>
        <input type="email" id="correo" name="correo" required>
        <label for="contrasena">Contraseña</label>
        <div style="position: relative;">
            <input type="password" id="contrasena" name="contrasena" required>
            <i class="fas fa-eye show-password-icon" onclick="togglePasswordVisibility()"></i>
        </div>
        <button type="submit" name="accion" value="iniciarSesion">Iniciar Sesión</button>
    </form>

    <form action="/registro" class="register-form">
        <p>En caso de no tener cuenta puedes registrarte aquí:</p>
        <button>Registrarse</button>
    </form>
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
<?php /**PATH C:\xampp\test-app\resources\views/login.blade.php ENDPATH**/ ?>
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
        <?php if(auth()->guard()->check()): ?>
            <a href="/miPerfil" class="active">MI PERFIL</a>
            <a href="/cerrarSesion">CERRAR SESIÓN</a>
        <?php else: ?>
            <a href="/login">INICIAR SESIÓN</a>
            <a href="/registro">REGISTRARSE</a>
        <?php endif; ?>
    </nav>
</header>



<div class="separador"></div>
<main class="perfil-container">
    <section class="perfil-section">
        <h1 class="perfil-heading">Mi Perfil</h1>
        
        <!-- Mostrar todos los datos del usuario -->
        <p class="perfil-info">Nombre de usuario: <?php echo e($usuario->nombre_usuario); ?></p>
        <p class="perfil-info">Nombre: <?php echo e($usuario->nombre); ?></p>
        <p class="perfil-info">Apellidos: <?php echo e($usuario->apellidos); ?></p>
        <p class="perfil-info">Correo electrónico: <?php echo e($usuario->correo); ?></p>
        <p class="perfil-info">Experiencia: <?php echo e($usuario->experiencia); ?></p>
        <p class="perfil-info">Fecha de nacimiento: <?php echo e($usuario->fecha_nacimiento); ?></p>
        
        <!-- Formulario para modificar el perfil -->
        <h2 class="perfil-subheading">Modificar Perfil</h2>
        <form action="/actualizarPerfil" method="post">
            <?php echo csrf_field(); ?>
            <label class="perfil-label" for="nombre_usuario">Nombre de usuario</label>
            <input class="perfil-input" type="text" id="nombre_usuario" name="nombre_usuario" value="<?php echo e($usuario->nombre_usuario); ?>" required>
            
            <label class="perfil-label" for="nombre">Nombre</label>
            <input class="perfil-input" type="text" id="nombre" name="nombre" value="<?php echo e($usuario->nombre); ?>" required>
            
            <label class="perfil-label" for="apellidos">Apellidos</label>
            <input class="perfil-input" type="text" id="apellidos" name="apellidos" value="<?php echo e($usuario->apellidos); ?>" required>
            
            <label class="perfil-label" for="contrasena">Contraseña</label>
            <div style="position: relative;">
                <input class="perfil-input" type="password" id="contrasena" name="contrasena" required>
                <i class="fas fa-eye show-password-icon" onclick="togglePasswordVisibility()"></i>
            </div>
            
            <label class="perfil-label" for="correo">Correo electrónico</label>
            <input class="perfil-input" type="email" id="correo" name="correo" value="<?php echo e($usuario->correo); ?>" required>
            
            <label class="perfil-label" for="experiencia">Experiencia</label>
            <select class="perfil-input" id="experiencia" name="experiencia">
                <option value="Principiante" <?php echo e($usuario->experiencia == 'Principiante' ? 'selected' : ''); ?>>Principiante</option>
                <option value="Experimentado" <?php echo e($usuario->experiencia == 'Experimentado' ? 'selected' : ''); ?>>Experimentado</option>
                <option value="Profesional" <?php echo e($usuario->experiencia == 'Profesional' ? 'selected' : ''); ?>>Profesional</option>
            </select>
            
            <label class="perfil-label" for="fecha_nacimiento">Fecha de nacimiento</label>
            <input class="perfil-input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo e($usuario->fecha_nacimiento); ?>">
            
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
<?php /**PATH C:\xampp\test-app\resources\views/miPerfil.blade.php ENDPATH**/ ?>
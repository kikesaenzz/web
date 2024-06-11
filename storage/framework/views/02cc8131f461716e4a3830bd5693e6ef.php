<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportConnect</title>
    <link rel="icon" href="/miCarpeta/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">
</head>
<body>
    <header>
        <div id="logo"></div>
        <nav>
            <a href="/">INICIO</a>
            <a href="/reservas" class="active">RESERVAS</a>
            <a href="/equipos">EQUIPOS</a>
            <?php if(auth()->guard()->check()): ?>
                <a href="/miPerfil">MI PERFIL</a>
                <a href="/cerrarSesion">CERRAR SESIÓN</a>
            <?php else: ?>
                <a href="/login">INICIAR SESIÓN</a>
                <a href="/registro">REGISTRARSE</a>
            <?php endif; ?>
        </nav>
    </header>

    <hr class="separador">

    <h2 class="titulo-seccion">Pistas disponibles:</h2>

    <div class="separador"></div>

    <section class="columns-container">
        <div class="columnas-deportes">
            <h2>Pabellón Alberto Maestro</h2>
            <a href="<?php echo e(route('horario', ['pabellon' => 'Pabellón Alberto Maestro'])); ?>">Ver Horario Semanal</a>
            <img src="img/pabellonAlbertoMaestro.jpg" class="imagen-pequena">
        </div>
        
        <div class="columnas-deportes">
            <h2>Pabellón Torrero</h2>
            <a href="<?php echo e(route('horario', ['pabellon' => 'Pabellón Torrero'])); ?>">Ver Horario Semanal</a>
            <img src="img/pabellonTorrero.jpg" class="imagen-pequena">
        </div>
    </section>
    
    <section class="columns-container">
        <div class="columnas-deportes">
            <h2>Pabellón Arrabal</h2>
            <a href="<?php echo e(route('horario', ['pabellon' => 'Pabellón Arrabal'])); ?>">Ver Horario Semanal</a>
            <img src="img/pabellonArrabal.jpg" class="imagen-pequena">
        </div>
        
        <div class="columnas-deportes">
            <h2>Pabellón Salduba</h2>
            <a href="<?php echo e(route('horario', ['pabellon' => 'Pabellón Salduba'])); ?>">Ver Horario Semanal</a>
            <img src="img/pabellonSalduba.jpeg" class="imagen-pequena">
        </div>
    </section>
    
    <section class="columns-container">
        <div class="columnas-deportes">
            <h2>Pabellón Alberto Maestro</h2>
            <a href="<?php echo e(route('horario', ['pabellon' => 'Pabellón Alberto Maestro'])); ?>">Ver Horario Semanal</a>
            <img src="img/pabellonAlbertoMaestro.jpg" class="imagen-pequena">
        </div>
        <div class="columnas-deportes">
            <h2>Pabellón Utebo</h2>
            <a href="<?php echo e(route('horario', ['pabellon' => 'Pabellón Utebo'])); ?>">Ver Horario Semanal</a>
            <img src="img/pabellonUtebo.jpeg" class="imagen-pequena">
        </div>
    </section>

    <footer id="footer">
        <div class="separador"></div>
        © <span id="currentYear"></span> SportConnect. Todos los derechos reservados.
    </footer>
</body>
</html>
<?php /**PATH C:\xampp\test-app\resources\views/baloncesto.blade.php ENDPATH**/ ?>
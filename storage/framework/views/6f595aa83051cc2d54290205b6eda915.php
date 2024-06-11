<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SportConnect te ayuda a encontrar equipos deportivos cerca de ti. Únete a un equipo de fútbol, baloncesto, pádel y más. Contacta con nosotros para más información.">
    <meta name="keywords" content="SportConnect, equipos deportivos, fútbol, baloncesto, pádel, reservas">
    <meta name="author" content="Tu Nombre">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportConnect - Encuentra tu Equipo Ideal</title>
    <link rel="icon" href="/miCarpeta/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">
</head>

<body>
    <header>
        <div id="logo"></div>
        <nav>
            <a href="/">INICIO</a>
            <a href="<?php echo e(route('reservas')); ?>" class="active">RESERVAS</a>
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

    <div class="separador"></div>

    <section>
        <h2 class="tituloDeportes">Hacer una Reserva</h2>
        <!-- Aquí irá el contenido relacionado con las reservas -->
        <div class="column-deportes">
            <div class="column-deporte">
                <a href="<?php echo e(route('reserva', ['reserva' => 'futbol'])); ?>" class="sport-link">
                    <div>
                        <p>Fútbol</p>
                        <img src="<?php echo e(asset('img/campoFutbol.jpg')); ?>" alt="Campos">
                    </div>
                </a>
            </div>

            <div class="column-deporte">
                <a href="<?php echo e(route('reserva', ['reserva' => 'baloncesto'])); ?>" class="sport-link">
                    <div class="campos-img">
                        <p>Baloncesto</p>
                        <img src="<?php echo e(asset('img/campoBaloncesto.jpg')); ?>" alt="Campos">
                    </div>
                </a>
            </div>

            <div class="column-deporte">
                <a href="<?php echo e(route('reserva', ['reserva' => 'padel'])); ?>" class="sport-link">
                    <div class="campos-img">
                        <p>Pádel</p>
                        <img src="<?php echo e(asset('img/campoPadel.jpg')); ?>" alt="Campos">
                    </div>
                </a>
            </div>

            <div class="column-deporte">
                <a href="<?php echo e(route('reserva', ['reserva' => 'fronton'])); ?>" class="sport-link">
                    <div class="campos-img">
                        <p>Frontón</p>
                        <img src="<?php echo e(asset('img/campoFronton.jpg')); ?>" alt="Campos">
                    </div>
                </a>
            </div>

            <div class="column-deporte">
                <a href="<?php echo e(route('reserva', ['reserva' => 'tenis'])); ?>" class="sport-link">
                    <div class="campos-img">
                        <p>Tenis</p>
                        <img src="<?php echo e(asset('img/campoTenis.jpg')); ?>" alt="Campos">
                    </div>
                </a>
            </div>

            <div class="column-deporte">
                <a href="<?php echo e(route('reserva', ['reserva' => 'piscina'])); ?>" class="sport-link">
                    <div class="campos-img">
                        <p>Piscina</p>
                        <img src="<?php echo e(asset('img/piscina.jpg')); ?>" alt="Campos">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <div class="separador"></div>

    <div class="contenedor-secciones">
        <section id="contactanos" class="seccion-contacto">
            <div class="column-contactanos">
                <h2>CONTÁCTANOS</h2>
                <p>Para más información sobre eventos deportivos, inscripciones y cualquier otra consulta, no dudes en ponerte en contacto con nosotros.</p>
                <ul>
                    <li>Dirección: Calle Deportiva, 123</li>
                    <li>Teléfono: (123) 456-7890</li>
                    <li>Correo Electrónico: info@sportconnect.com</li>
                </ul>
            </div>
        </section>

        <section id="trabaja-con-nosotros" class="seccion-trabajo">
            <div class="column-trabajo">
                <h2>TRABAJA CON NOSOTROS</h2>
                <p>Únete a nuestro equipo y sé parte de la pasión por el deporte. Descubre oportunidades de empleo emocionantes.</p>
                <a href="vacantes.html" class="btn-trabaja">Ver Vacantes</a>
            </div>
        </section>
    </
<?php /**PATH C:\xampp\test-app\resources\views/reservas.blade.php ENDPATH**/ ?>
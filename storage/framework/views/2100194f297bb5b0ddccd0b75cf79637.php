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
            <a href="/" class="active">INICIO</a>
            <a href="/reservas">RESERVAS</a>
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

<section id="noticias" class="seccion-noticias">
    <div class="separador"></div>

    <div class="contenedor-secciones">
        <section id="elige" class="seccion-elige">
            <div class="column-elige">
                <h1>¡PUEDES UNIRTE A UN EQUIPO AQUÍ!</h1>
                <p>Tenemos varios equipos que necesitan a gente como tú. Aquí tienes algunos de ellos:</p>
                <h2>Fútbol</h2>
                <ul>
                    <li><a href="futbolClubRayoAzul.html">Fútbol Club Rayo Azul</a></li>
                    <li><a href="futbolLeyendasDelGol.html">Leyendas del Gol FC</a></li>
                </ul>
                <h2>Baloncesto</h2>
                <ul>
                    <li><a href="basketDinamitaDunkers.html">Dinamita Dunkers</a></li>
                    <li><a href="basketEstrellasDelAro.html">Estrellas del Aro Basketball Club</a></li>
                </ul>
                <h2>Pádel</h2>
                <ul>
                    <li><a href="padelSmashPadel.html">Smash Pádel Team</a></li>
                    <li><a href="padelProdigyClub2.html">Pádel Prodigy Club 2</a></li>
                </ul>
            </div>
        </section>

        <section id="noticias" class="seccion-noticas">
            <div class="column-noticias">
                <h2>RESERVA TU PISTA!</h2>
                <a href="reservas.html" class="btn-noticas">Reserva aquí</a>
                <p>¡Puedes reservar una pista para jugar tu y tus amigos aqui!</p>
                <p>Hemos actualizado nuestro sistema de reservas para que puedas asegurar tu espacio en las pistas con solo unos clics. ¡Haz tu reserva en línea y prepárate para disfrutar de tu próximo partido!</p>
                <img src="img/fondo.jpg" alt="Fondo" class="imagen-fondo">
            </div>
    
     </section>
        
    </div>
    <div class="separador"></div>
    <div>
        <h2 class="tituloMapa">Encuéntranos aquí:</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.8679756519605!2d-0.8984592248604408!3d41.63698508047744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5915278b6ca0d5%3A0x7befd9e11bcacf02!2sCentro%20Deportivo%20Municipal%20Perico%20Fern%C3%A1ndez.%20Salduba!5e0!3m2!1ses!2ses!4v1700910699025!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

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
        
    </div>

<footer id="footer">
    <div class="separador"></div>
    © <span id="currentYear"></span> SportConnect. Todos los derechos reservados.
</footer>
<script>
    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
</script>
</body>
</html>
<?php /**PATH C:\xampp\test-app\resources\views/menu.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservas - SportConnect</title>
    <link rel="icon" href="img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">

</head>
<body>
    <header>
        <div id="logo"></div>
        <nav>
            <a href="/">INICIO</a>
            <a href="/reservas">RESERVAS</a>
            <a href="/equipos" class="active">EQUIPOS</a>
            @auth
                <a href="/miPerfil">MI PERFIL</a>
                <a href="/cerrarSesion">CERRAR SESIÓN</a>
            @else
                <a href="/login">INICIAR SESIÓN</a>
                <a href="/registro">REGISTRARSE</a>
            @endauth
        </nav>
    </header>

<div class="separador"></div>
<section>
    <h2 class="tituloDeportes">SELECCIONA UN DEPORTE:</h2>
    <div class="column-deportes">
        <div class="column-deporte">
            <a href="futbol.html" class="sport-link">
                <div>
                    <p>Fútbol</p>
                    <img src="img/campoFutbol.jpg" alt="Campos">
                </div>
            </a>
        </div>

        <div class="column-deporte">
            <a href="baloncesto.html" class="sport-link">
                <div class="campos-img">
                    <p>Baloncesto</p>
                    <img src="img/campoBaloncesto.jpg" alt="Campos">
                </div>
            </a>
        </div>

        <div class="column-deporte">
            <a href="padel.html" class="sport-link">
                <div class="campos-img">
                    <p>Pádel</p>
                    <img src="img/campoPadel.jpg" alt="Campos">
                </div>
            </a>
        </div>

        <div class="column-deporte">
            <a href="fronton.html" class="sport-link">
                <div class="campos-img">
                    <p>Frontón</p>
                    <img src="img/campoFronton.jpg" alt="Campos">
                </div>
            </a>
        </div>

        <div class="column-deporte">
            <a href="tenis.html" class="sport-link">
                <div class="campos-img">
                    <p>Tenis</p>
                    <img src="img/campoTenis.jpg" alt="Campos">
                </div>
            </a>
        </div>

        <div class="column-deporte">
            <a href="piscina.html" class="sport-link">
                <div class="campos-img">
                    <p>Piscina</p>
                    <img src="img/piscina.jpg" alt="Campos">
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
</div>


<div class="separador"></div>

<section class="seccion-reservas">
    <div class="column-reservas">
        <h2>Todas las reservas</h2>
        
        <a href="añadirreserva" class="btn-añadirreservas">Añadir reservas</a>
    </div>
</section>

@if ($reservas->count() > 0)
    @foreach ($reservas as $reserva)
        <div id="seccion-{{ $reserva->id }}" class="contenedor-reservas">
            <div class="column-reservas">
                <h2>{{ $reserva->nombre }}</h2>
                <img src="{{ asset('images/' . $reserva->imagen) }}" alt="{{ $reserva->nombre }}" class="imagen-reserva">
                <p>Tiempo: {{ $reserva->tiempo }}</p>
                <p>Dificultad: {{ $reserva->dificultad }}</p>
                <p>Fecha: {{ $reserva->fecha }}</p>

            </div>
            <div class="column-descripccion">
                <h2>¿Cómo se hace? Aquí lo tienes:</h2>
                <p>{{ $reserva->texto }}</p>
            </div>
            <a href="{{ route('reserva', ['reserva' => $reserva->id]) }}" class="btn-reservas btn-comentar">Ver reserva</a>
            @if (session()->has('esAdmin')&&session('esAdmin')==1)
            <a href="{{ route('modificarreserva', ['id' => $reserva->id]) }}" class="btn-reservas btn-modificar">Modificar reserva</a>

            <form id="eliminarreservaForm_{{ $reserva->id }}" action="{{ route('eliminarreserva', ['id' => $reserva->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar reserva</button>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('eliminarreservaForm_{{ $reserva->id }}').submit();" class="btn-reservas btn-modificar">Eliminar reserva</a>


            @endif
        </div>
    @endforeach
@else
    <p>No hay reservas disponibles.</p>
@endif


</body>
</html>

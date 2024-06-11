



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario Semanal</title>
    <link rel="icon" href="/miCarpeta/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/miCarpeta/style.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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

    <h2 class="titulo-seccion">Horario Semanal de <?php echo e($pabellon); ?></h2>

    <div class="separador"></div>

    <table>
        <thead>
            <tr>
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00' ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($hora); ?></td>
                    <?php $__currentLoopData = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="hora" data-pavilion="<?php echo e($pabellon); ?>" data-time="<?php echo e($hora); ?>" data-day="<?php echo e($dia); ?>"></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <footer id="footer">
        <div class="separador"></div>
        © <span id="currentYear"></span> SportConnect. Todos los derechos reservados.
    </footer>

    <script>
        // Cargar reservas desde localStorage
        document.addEventListener('DOMContentLoaded', () => {
            const reservas = JSON.parse(localStorage.getItem('reservas')) || [];
            reservas.forEach(reserva => {
                const td = document.querySelector(`td[data-pavilion="${reserva.pavilion}"][data-time="${reserva.time}"][data-day="${reserva.day}"]`);
                if (td) {
                    td.classList.add('hora-ocupada');
                }
            });
        });
    
        document.querySelectorAll('.hora').forEach(td => {
            td.addEventListener('click', () => {
                // Verificar si el usuario ha iniciado sesión
                <?php if(auth()->guard()->guest()): ?>
                    alert('Debes iniciar sesión para realizar una reserva.');
                    return;
                <?php endif; ?>
    
                if (td.classList.contains('hora-ocupada')) {
                    alert('Esta hora ya está ocupada.');
                    return;
                }
    
                const pavilion = td.dataset.pavilion;
                const time = td.dataset.time;
                const day = td.dataset.day;
                const confirmReservation = confirm(`¿Deseas reservar la hora ${time} del día ${day} en ${pavilion}?`);
    
                if (confirmReservation) {
                    // Guardar la reserva en localStorage
                    const reservas = JSON.parse(localStorage.getItem('reservas')) || [];
                    reservas.push({ pavilion, time, day });
                    localStorage.setItem('reservas', JSON.stringify(reservas));
    
                    // Marcar la celda como ocupada
                    td.classList.add('hora-confirmada');
                }
            });
        });
    </script>
    
</body>
</html>
<?php /**PATH C:\xampp\test-app\resources\views/horario.blade.php ENDPATH**/ ?>
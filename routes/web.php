<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservaController; 
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\MiPerfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;


// Rutas para la página de inicio, sesión y perfil
Route::get('/', function () {
    return view('menu');
});

Route::get('/sesion', function () {
    return session('nombre_usuario');
});

Route::get('/miPerfil', function () {
    return view('miPerfil');
});

Route::get('/cerrarSesion', function () {
    return view('cerrarSesion');
});

// Rutas para reservas
Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas');
Route::post('/reservas', [ReservationController::class, 'store'])->name('reservas.store');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store')->middleware('auth');
Route::post('/reservar', [ReservaController::class, 'reservar'])->middleware(['auth', 'verified']);



Route::get('/reserva/futbol', [ReservaController::class, 'mostrarReservaFutbol'])->name('reserva.futbol');
Route::get('/reserva/baloncesto', [ReservaController::class, 'mostrarReservasPorDeporte'])->name('reserva.baloncesto')->defaults('deporte', 'baloncesto');

Route::get('/reserva/tenis', [ReservaController::class, 'mostrarReservaTenis'])->name('reserva.tenis');
Route::get('/reserva/padel', [ReservaController::class, 'mostrarReservaPadel'])->name('reserva.padel');

Route::get('/horario/{pabellon}', function ($pabellon) {
    $reservas = Reserva::where('pavilion', $pabellon)->get();
    return view('horario', ['pabellon' => $pabellon, 'reservas' => $reservas]);
})->name('horario');
Route::post('/reservar', [ReservationController::class, 'reservar'])->middleware(['auth', 'verified']);



// Otras rutas para la autenticación, registro, y perfil
Route::post('/insertarreserva', [ReservaController::class, 'añadereserva'])->name('insertareserva');
Route::get('/añadirreserva', [ReservaController::class, 'mostrarFormularioAñadirreserva'])->name('añadirreserva');
Route::get('/reserva/{reserva}', [ReservaController::class, 'muestrareserva'])->name('reserva');
Route::post('/reserva/{reserva}', [ReservaController::class, 'addComentario']);
Route::get('/ultimas-reservas', [ReservaController::class, 'ultimasreservas']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Otras rutas para registro, login, y perfil
Route::get('/registro', [RegistroController::class, 'miMetodo'])->name('registro');
Route::post('/registro', [RegistroController::class, 'crearUsuario']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/actualizarPerfil', [MiPerfilController::class, 'actualizar'])->name('perfil.actualizar');
Route::get('/miPerfil', [MiPerfilController::class, 'mostrarPerfil'])->name('perfil.mostrar');
Route::post('/darseBaja', [MiPerfilController::class, 'darseBaja'])->name('perfil.darseBaja');
Route::get('/todosUsuarios', [MiPerfilController::class, 'mostrarTodosUsuarios'])->name('todosUsuarios');
Route::get('/editarUsuario/{id}', [MiPerfilController::class, 'editarUsuario'])->name('editarUsuario');
Route::post('/actualizaUsuario/{id}', [MiPerfilController::class, 'actualizarUsuario'])->name('actualizarUsuario');
Route::delete('/eliminarUsuario/{id}', [MiPerfilController::class, 'eliminarUsuario'])->name('eliminarUsuario');

// Rutas para modificar y eliminar reservas
Route::get('/modificarreserva/{id}', [ReservaController::class, 'mostrarModificarreserva'])->name('modificarreserva');
Route::post('/actualizarreserva/{id}', [ReservaController::class, 'actualizarreserva'])->name('actualizarreserva');
Route::delete('/eliminarreserva/{id}', [ReservaController::class, 'eliminarreserva'])->name('eliminarreserva');

// Ruta para menú
Route::get('/menu', [ReservaController::class, 'index'])->name('menu');

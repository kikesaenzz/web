<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva; // Asegúrate de importar el modelo Reserva aquí

class HorarioController extends Controller
{
    public function show($pabellon)
    {
        // Aquí puedes agregar la lógica para obtener las reservas
        $reservas = Reserva::all(); // Reemplaza esto con tu lógica real para obtener las reservas

        // Luego, pasas la variable $reservas a la vista junto con otras variables necesarias
        return view('horario', compact('pabellon', 'reservas'));
    }
}

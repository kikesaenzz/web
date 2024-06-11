<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservationController extends Controller
{
    public function reservar(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'pavilion' => 'required|string',
            'time' => 'required|string',
            'day' => 'required|string',
        ]);

        // Verificar si la hora ya está ocupada
        $reservaExistente = Reserva::where('pavilion', $validatedData['pavilion'])
                                    ->where('time', $validatedData['time'])
                                    ->where('day', $validatedData['day'])
                                    ->first();

        if ($reservaExistente) {
            return response()->json(['success' => false, 'message' => 'La hora ya está ocupada.'], 409);
        }

        // Crear una nueva reserva
        $reserva = new Reserva();
        $reserva->pavilion = $validatedData['pavilion'];
        $reserva->time = $validatedData['time'];
        $reserva->day = $validatedData['day'];
        $reserva->user_id = auth()->id(); // Asumiendo que el usuario está autenticado
        $reserva->save();

        return response()->json(['success' => true]);
    }
}



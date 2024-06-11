<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;


class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas', ['reservas' => $reservas]);
    }

    // Método para almacenar la reserva en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pavilion' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'day' => 'required|string|max:255',
        ]);
    
        // Verificar si la hora ya está reservada para el pabellón y el día específico
        $exists = Reserva::where('pavilion', $validated['pavilion'])
                        ->where('time', $validated['time'])
                        ->where('day', $validated['day'])
                        ->exists();
    
        if ($exists) {
            return redirect()->back()->with('error', 'Esta hora ya está reservada.');
        }
    
        // Crear una nueva reserva asociada al usuario autenticado
        $reserva = new Reserva();
        $user = auth()->user();
        $reserva->user_id = auth()->user()->id; // Asociar la reserva con el usuario autenticado
        $reserva->pavilion = $validated['pavilion'];
        $reserva->time = $validated['time'];
        $reserva->day = $validated['day'];
        $reserva->save();
    
        return redirect()->back()->with('success', 'Reserva creada con éxito.');
    }

    // Método para mostrar las reservas de un pabellón específico
    public function mostrarReservasPorDeporte($deporte)
    {
        // Recupera las reservas del deporte específico
        $reservas = Reserva::where('tipo', $deporte)->get();
        
        // Devuelve la vista correspondiente, asegurándote de que el nombre de la vista sea correcto
        return view('baloncesto', ['reservas' => $reservas, 'deporte' => $deporte]);
    }

    public function mostrarHorario($pabellon)
    {
        $reservas = Reserva::where('pavilion', $pabellon)->get();
        return view('horario', compact('pabellon', 'reservas'));
    }
    

}

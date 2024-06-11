<?php

use App\Models\reserva;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function mostrarMenu()
    {
        $reservasMejorValoradas = reserva::select('reservas.*', DB::raw('AVG(comentarios.valoracion) as valoracion_promedio'))
            ->leftJoin('comentarios', 'reservas.id', '=', 'comentarios.id_reserva')
            ->groupBy('reservas.id')
            ->orderByDesc('valoracion_promedio')
            ->take(5)
            ->get();

        return view('menu', compact('reservasMejorValoradas'));
    }
}
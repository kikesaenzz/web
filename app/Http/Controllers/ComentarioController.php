<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComentarioController extends Controller
{
    public function añadirComentario(Request $request, $id)
    {
        try {
            $formulario = $request->validate([
                'comentario' => ['required', 'max:500'],
                'valoracion' => ['lt:6', 'gt:0']
            ]);

            Comentario::create([
                'id_reserva' => $id,
                'id_usuario' => Session::get('id'),
                'texto' => $formulario['comentario'],
                'valoracion' => $formulario['valoracion']
            ]);

            return redirect('/reserva/'.$id)->with('success', 'Comentario añadido correctamente.');
        } catch (\Exception $e) {
            \Log::error('Error insertando comentario: '.$e->getMessage());
            return redirect()->back()->with('error', 'Error al añadir el comentario. Por favor, inténtalo de nuevo.');
        }
    }

    public function mostrarFormularioAñadirComentario() {
        return view('añadirComentario');
    }
}

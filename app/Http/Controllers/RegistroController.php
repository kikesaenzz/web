<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function miMetodo()
    {
        $algo = false;
        if ($algo) {
            return view('menu');
        } else {
            return view('formularioRegistro');
        }
    }

    public function crearUsuario(Request $request)
    {
        $request->validate([
            'nombre_usuario' => ['required', 'min:4', 'max:50', 'unique:usuarios'],
            'correo' => ['required', 'email:rfc,dns', 'unique:usuarios'],
            'nombre' => ['required', 'max:50'],
            'apellidos' => ['required', 'max:50'],
            'experiencia' => ['required'],
            'contrasena' => ['required', 'min:6']
        ], [
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nombre_usuario.min' => 'El nombre de usuario debe tener al menos :min caracteres.',
            'nombre_usuario.max' => 'El nombre de usuario no puede tener más de :max caracteres.',
            'nombre_usuario.unique' => 'El nombre de usuario ya está en uso.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'correo.unique' => 'El correo electrónico ya está en uso.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.max' => 'Los apellidos no pueden tener más de :max caracteres.',
            'experiencia.required' => 'La experiencia es obligatoria.',
            'contrasena.required' => 'La contraseña es obligatoria.',
            'contrasena.min' => 'La contraseña debe tener al menos :min caracteres.'
        ]);

        $usuario = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'experiencia' => $request->experiencia,
            'contrasena' => $request->contrasena, // Laravel's setContrasenaAttribute will handle hashing
        ]);

        session()->put('usuario', $usuario);

        return redirect('/')->with('mensaje', '¡Usuario registrado correctamente!');
    }
}

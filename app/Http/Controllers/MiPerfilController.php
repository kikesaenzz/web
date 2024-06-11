<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MiPerfilController extends Controller
{
    public function mostrarPerfil()
    {
        try {
            // Obtener el usuario autenticado actualmente
            $usuario = Auth::user();
    
            // Si no hay un usuario autenticado, redirigir al inicio de sesión
            if (!$usuario) {
                return redirect('/login');
            }
    
            return view('miPerfil', compact('usuario'));
        } catch (\Exception $e) {
            return "Error en la aplicación: " . $e->getMessage();
        }
    }

    public function actualizar(Request $request)
    {
        $idUsuario = Session::get('id');
        $usuario = Usuario::findOrFail($idUsuario);

        $request->validate([
            'nombre' => 'string|max:255',
            'correo' => 'email|max:255',
            'contrasena' => 'nullable|string|min:6',
            'nombre_usuario' => 'unique:usuarios,nombre_usuario,' . $usuario->id,
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->correo = $request->correo;
        if ($request->filled('contrasena')) {
            $usuario->contrasena = Hash::make($request->contrasena);
        }

        $usuario->save();

        Session::put('nombre', $request->nombre);
        Session::put('nombre_usuario', $request->nombre_usuario);
        Session::put('correo', $request->correo);

        return redirect('/')->with('success', 'Perfil actualizado correctamente');
    }

    public function darseBaja(Request $request)
    {
        $user = Auth::user();

        if ($user && $user instanceof Usuario) {
            $user->delete();
            Auth::logout();
            return redirect('/')->with('status', 'Cuenta eliminada correctamente.');
        } else {
            return redirect('/')->with('error', 'No se pudo encontrar el usuario autenticado.');
        }
    }

    public function mostrarTodosUsuarios()
    {
        try {
            if (!Session::has('nombre') || !Session::has('esAdmin')) {
                return redirect('/login');
            }

            $esAdmin = Session::get('esAdmin');

            if ($esAdmin != 1) {
                return redirect()->route('inicio')->with('error', 'No tienes permiso para acceder a esta función.');
            }

            $usuarios = Usuario::all();

            return view('todosUsuarios', compact('usuarios'));
        } catch (\Exception $e) {
            return "Error en la aplicación: " . $e->getMessage();
        }
    }

    public function editarUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('editarUsuario', compact('usuario'));
    }

    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'string|max:255',
            'apellidos' => 'string|max:255',
            'nombre_usuario' => 'unique:usuarios,nombre_usuario,' . $usuario->id,
            'correo' => 'email|max:255|unique:usuarios,correo,' . $usuario->id,
            'contrasena' => 'nullable|string|min:6',
            'esAdmin' => 'boolean'
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->correo = $request->correo;
        if ($request->filled('contrasena')) {
            $usuario->contrasena = Hash::make($request->contrasena);
        }
        $usuario->esAdmin = $request->esAdmin ?? 0;

        $usuario->save();

        return redirect()->route('todosUsuarios')->with('success', 'Usuario actualizado correctamente.');
    }

    public function eliminarUsuario($id)
    {
        Usuario::findOrFail($id)->delete();

        return redirect()->route('todosUsuarios')->with('success', 'Usuario eliminado correctamente.');
    }
}

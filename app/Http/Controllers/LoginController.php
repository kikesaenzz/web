<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'contrasena' => ['required', 'min:6']
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            // Establecer 'correo' en la sesión
            $request->session()->put('correo', $request->correo);
            
            return redirect()->route('menu');
        }

        $user = Usuario::where('correo', $credentials['correo'])->first();

        if ($user && Hash::check($credentials['contrasena'], $user->contrasena)) {
            Auth::login($user);
            return redirect()->route('menu');
        }

        return redirect()->route('login')->withErrors([
            'correo' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('mensaje', '¡Has cerrado sesión exitosamente!');
    }
}

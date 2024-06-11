<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Asegúrate de extender Authenticatable
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable // Cambiado de Model a Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id', 'esAdmin'];
    // protected $fillable = ['nombre_usuario', 'nombre', 'apellidos', 'correo', 'experiencia'];

    // Relaciones
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Cifrar la contraseña antes de guardarla en la base de datos
    public function setContrasenaAttribute($pwd)
    {
        $this->attributes['contrasena'] = Hash::make($pwd);
    }

    // Ocultar la contraseña cuando se serializa el modelo
    protected $hidden = [
        'contrasena', 'remember_token',
    ];

    // Métodos adicionales para autenticación
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}

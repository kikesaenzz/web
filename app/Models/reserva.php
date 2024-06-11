<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    protected $fillable = ['pavilion', 'time', 'day', 'user_id'];
    use HasFactory;
    public function ingredientes(){
        return $this->hasMany(Ingrediente::class);
    }
    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
    public function comentarios(){
        return $this->hasMany(Comentario::class,'id_reserva');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

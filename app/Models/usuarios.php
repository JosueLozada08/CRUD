<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Corregido: el namespace estaba mal escrito


class Usuarios extends Authenticatable // Cambiado a 'Authenticatable' en lugar de 'Model'
{
    use  HasFactory; // Incluye 'Notifiable' si usas notificaciones

    protected $table = 'usuarios'; // Especifica el nombre de la tabla

    // Define los campos que pueden ser rellenados masivamente
    protected $fillable = [
        'user_name',  // Nombre de usuario
        'user_pass',  // Contraseña del usuario
        'user_tipo'   // Tipo de usuario
    ];

    // Oculta la contraseña al convertir el modelo en un array o JSON
    protected $hidden = [
        'user_pass',
    ];

    // Método para obtener la contraseña para la autenticación
    public function getAuthPassword()
    {
        return $this->user_pass;
    }

    public $timestamps = false; // Desactiva el uso de timestamps automáticos
}

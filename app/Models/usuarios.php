<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory; // Habilita la funcionalidad de creación de instancias de modelo utilizando el Factory Pattern
    protected $table = 'usuarios'; /* Especifica el nombre de la tabla en la base de datos asociada con este modelo */

    // Define los campos que pueden ser rellenados masivamente (por ejemplo, mediante métodos como create o update)
    protected $fillable = [
        'user_name',  // Nombre de usuario
        'user_pass',  // Contraseña del usuario
        'user_tipo'   // Tipo de usuario (posiblemente rol o permisos)
    ];

    // Define los atributos que deberían estar ocultos cuando el modelo sea convertido a un array o JSON
    protected $hidden = [
        'user_pass', // Oculta la contraseña para no ser expuesta al hacer transformaciones de JSON o array
    ];

    // Método para obtener la contraseña para el proceso de autenticación
    public function getAuthPassword()
    {
        return $this->user_pass; // Retorna el campo 'user_pass' como la contraseña de autenticación
    }

    public $timestamps = false; // Desactiva el uso de timestamps automáticos (created_at y updated_at) en la tabla
}

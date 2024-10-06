<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware; // Extiende la clase base de middleware de autenticación en Laravel
use Illuminate\Http\Request; // Importa la clase Request para manejar solicitudes HTTP

class Authenticate extends Middleware
{
    /**
     * Obtiene la ruta a la cual el usuario debe ser redirigido cuando no está autenticado.
     * @param \Iluminate\Http\Request $request // Recibe una solicitud HTTP
     * @return string|null // Devuelve la URL a la cual se redirige o null si no es necesario redirigir
     */
    protected function redirectTo($request)
    {
        // Verifica si la solicitud no espera una respuesta en formato JSON
        if(!$request->expectsJson()){
            // Si la solicitud no espera JSON, redirige a la ruta de login
            return route('login'); 
        }
    }
}

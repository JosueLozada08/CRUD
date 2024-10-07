<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Importación necesaria

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $type
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $type): Response
    {
        // Verifica si el usuario está autenticado
        if (Auth::guard('usuarios')->check()) {
            // Verifica el tipo de usuario
            if (Auth::guard('usuarios')->user()->user_tipo != $type) {
                return redirect('/persona/consultar')->with('error', 'Acceso denegado. Tipo de usuario no autorizado.'); // Mensaje opcional
            }
        }
        return $next($request);
    }
}

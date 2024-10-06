<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
// Método para mostrar el formulario de inicio de sesión
public function showLoginForm()
{
    // Retorna la vista del formulario de inicio de sesión
    return view('auth.login');
}

// Método para manejar el proceso de inicio de sesión
public function login(Request $request)
{
    // Obtiene las credenciales (nombre de usuario y contraseña) del request
    $credentials = $request->only('user_name', 'user_pass');

    // Busca el usuario en la base de datos usando el nombre de usuario proporcionado
    $user = \app\Models\Usuarios::where('user_name', $credentials['user_name'])->first();

    // Verifica si se encontró un usuario y si la contraseña ingresada es correcta
    if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
        // Si las credenciales son correctas, inicia sesión para el guard 'usuarios'
        Auth::guard('usuarios')->login($user);
        // Redirige al usuario a la página que intentaba acceder o a la página por defecto
        return redirect()->intended('/personas/inicio');
    }
    // (Opcional) Si las credenciales son incorrectas, podrías agregar un mensaje de error o redirigir
}

}

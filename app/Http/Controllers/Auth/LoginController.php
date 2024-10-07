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
        // Validar los datos del formulario
        $request->validate([
            'user_name' => 'required|string',
            'user_pass' => 'required|string',
        ]);

        // Obtiene las credenciales (nombre de usuario y contraseña) del request
        $credentials = $request->only('user_name', 'user_pass');

        // Busca el usuario en la base de datos usando el nombre de usuario proporcionado
        $user = \App\Models\Usuarios::where('user_name', $credentials['user_name'])->first();

        // Verifica si se encontró un usuario y si la contraseña ingresada es correcta
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            // Si las credenciales son correctas, inicia sesión para el guard 'usuarios'
            Auth::guard('usuarios')->login($user);

            // Redirige al usuario a la página que intentaba acceder o a la página por defecto
            return redirect()->intended('/personas/inicio');
        }

        // Si las credenciales son incorrectas, regresar con un mensaje de error
        return back()->withErrors([
            'user_name' => 'La clave o el usuario son incorrectos.',
        ])->withInput();  // Con withInput() preservamos el valor del input del usuario
    }

    // Método para manejar el cierre de sesión
    public function logout(Request $request)
    {
        // Cierra la sesión del guard 'usuarios'
        Auth::guard('usuarios')->logout();

        // Invalida la sesión actual para asegurar que no se pueda usar después de cerrar sesión
        $request->session()->invalidate();
        
        // Regenera el token de la sesión para evitar ataques CSRF (Cross-Site Request Forgery)
        $request->session()->regenerateToken();

        // Redirige al usuario a la página de inicio de sesión
        return redirect('/login');
    }
}

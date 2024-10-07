<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Manejar el proceso de inicio de sesión
    public function login(Request $request)
    {
        // Validar las credenciales proporcionadas
        $request->validate([
            'user_name' => 'required|string',
            'user_pass' => 'required|string',
        ]);

        // Buscar al usuario por nombre de usuario
        $user = \App\Models\Usuarios::where('user_name', $request->user_name)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && Hash::check($request->user_pass, $user->user_pass)) {
            // Iniciar sesión para el usuario
            Auth::guard('usuarios')->login($user);

            // Redirigir al usuario a la página de inicio
            return redirect()->intended('/personas/inicio');
        }

        // Retornar con un error si las credenciales no son correctas
        return back()->withErrors([
            'user_name' => 'El nombre de usuario o la contraseña son incorrectos.',
        ])->withInput(); // Mantener los valores del formulario
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout();

        // Invalida la sesión actual y regenera el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

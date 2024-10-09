<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class LoginController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    // Validar las credenciales proporcionadas
    $request->validate([
        'user_name' => 'required|string',
        'user_pass' => 'required|string',
    ]);

    // Obtener las credenciales del formulario
    $credentials = $request->only('user_name', 'user_pass');
    
    // Buscar al usuario por su nombre de usuario
    $user = Usuarios::where('user_name', $credentials['user_name'])->first();

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
        // Iniciar sesión con el guard 'usuarios'
        Auth::guard('usuarios')->login($user);
        return redirect()->intended('/libros/inicio');
    }

    // Si las credenciales no coinciden, retornar con un mensaje de error
    return back()->withErrors([
        'user_name' => 'Las credenciales no coinciden con nuestros registros.',
    ])->withInput(); // Mantener los valores del formulario
}

    

        public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

}

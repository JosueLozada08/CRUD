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
        $credentials = $request->only('user_name', 'user_pass');
    
        $user = \App\Models\Usuarios::where('user_name', $credentials['user_name'])->first();
    
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            Auth::guard('usuarios')->login($user);
            dd(Auth::guard('usuarios')->user());
            return redirect()->intended('/persona/crear');
        }
    
        return back()->withErrors([
            'user_name' => 'Las credenciales no coinciden, intenta de nuevo .',
        ]);
    }
    

        public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

}

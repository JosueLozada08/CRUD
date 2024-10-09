<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider y todas ellas
| serán asignadas al grupo de middleware "web".
|
*/

// Ruta de bienvenida (pública)
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas para las operaciones de "persona", solo accesibles para usuarios autenticados
Route::middleware(['auth:usuarios', 'check.user.type:0'])->group(function() {

    // Ruta para crear una persona
    Route::get('/persona/crear', [PersonaController::class, 'crear'])->name('persona.crear');

    // Ruta para guardar una persona
    Route::post('/persona/bank', [PersonaController::class, 'bank'])->name('persona.bank');

    // Ruta para leer las personas
    Route::get('/persona/leer', [PersonaController::class, 'leer'])->name('persona.leer');

    // Ruta para actualizar una persona
    Route::put('/persona/{persona}', [PersonaController::class, 'update'])->name('persona.update');

    // Ruta para eliminar una persona
    Route::delete('/persona/{id}', [PersonaController::class, 'destroy'])->name('persona.destroy');

    // Ruta para ver el formulario de eliminar personas
    Route::get('/persona/borrar', [PersonaController::class, 'borrar'])->name('persona.borrar');

    // Ruta para buscar una persona por ID o nombre
    Route::get('/persona/search', [PersonaController::class, 'search'])->name('persona.search');
    
    // Ruta principal después de iniciar sesión
    Route::get('/persona/inicio', [PersonaController::class, 'inicio'])->name('persona.inicio');
});

// Rutas de login, solo accesibles para usuarios no autenticados
Route::middleware('guest')->group(function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); // formulario de login
    Route::post('login', [LoginController::class, 'login'])->name('login.process'); // procesar inicio de sesión
});

// Ruta de logout (sin middleware de autenticación para permitir que todos los usuarios puedan cerrar sesión)
Route::post('logout', [LoginController::class, 'logout'])->name('logout');




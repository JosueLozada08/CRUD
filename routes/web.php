<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:usuarios', 'check.user.type:0'])->group(function(){

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
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');/* formulario de login  */
Route::post('login', [LoginController::class, 'login'])->name('login'); /* para iniciar sesion  */
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


<?php

use App\Http\Controllers\PersonaController;
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
Route::get('/persona/crear', [PersonaController::class, 'crear'])->name('persona.crear'); /* ruta para la vista crear  */
Route::post('/persona/bank', [PersonaController::class, 'bank'])->name('persona.bank');/* ruta post para enviar los datos  */
Route::get('/persona/leer', [PersonaController::class, 'leer'])->name('persona.leer');
Route::put('/persona/{persona}', [PersonaController::class, 'update'])->name('persona.update');




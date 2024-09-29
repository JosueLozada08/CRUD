<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona; // Corregir la importación de Persona (la clase debe comenzar con mayúscula)

class PersonaController extends Controller
{
    public function crear()
    {
        return view('persona.crear');
    }
    public function leer()
    {
        /* $persona = Persona::all();
        dd($persona); */

        $persona = Persona::all();
        return view('persona.leer', compact('persona'));
    }
    public function update(Request $request, Persona $persona )
    {
         // Validación de los campos
         $request->validate([
            'nombre' => 'required|string|max:255',
            'ocupacion' => 'required|string',
            'edad' => 'required|integer|min:0|max:120', // Validación de edad
        ]);

        /* actualizar  */
        $persona->update($request->all());
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Persona actualizada correctamente.');
    }

    public function bank(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ocupacion' => 'required|string',
            'edad' => 'required|integer|min:0|max:120', // Validación de edad
        ]);

        // Crear nueva instancia del modelo Persona
        $persona = new Persona();
        
        // Asignar los valores del request a la instancia del modelo
        $persona->nombre = $request->nombre;
        $persona->ocupacion = $request->ocupacion;
        $persona->edad = $request->edad;

        // Guardar los datos en la base de datos
        $persona->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Persona creada correctamente.');
    }
}

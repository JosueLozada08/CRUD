<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\persona

class PersonaController extends Controller
{
    public function crear()
    {
        return view('persona.crear');
    }

    public function bank(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ocupacion' => 'required|string',
            'edad' => 'required|integer|min:0|max:120', // Validación de edad
        ]);

        $persona = new Persona();
        /* setear  */
        $persona->nombre = $request->nombre;
        $persona->ocupacion = $request->ocupacion;
        $persona->edad = $request->edad;


        /* guardar datos  */
        $persona ->save();


        // Aquí puedes manejar el procesamiento de los datos, como guardarlos en la base de datos
        // Ejemplo: Persona::create($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Persona Creada Correctamente');
    }
}


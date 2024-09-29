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
        // Cambiar $persona a $personas (en plural)
        $personas = Persona::all(); // Obtener todas las personas desde la base de datos
    
        // Enviar la variable $personas a la vista
        return view('persona.leer', compact('personas')); // Usar el nombre correcto de la variable
    }
    public function borrar()
    {
        
        $personas = Persona::all(); 
    
     
        return view('persona.borrar', compact('personas')); 
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


  

    public function destroy($id)
    {
        // Buscar la persona por ID
        $persona = Persona::find($id);
        
        // Verificar si la persona existe
        if ($persona) {
            $persona->delete(); // Eliminar la persona
            return redirect()->back()->with('success', 'Persona borrada correctamente.');
        } else {
            return redirect()->back()->with('error', 'La persona no se encontró.');
        }
    }
    

    public function search(Request $request)
    {
        // Obtener el término de búsqueda (nombre o ID)
        $searchTerm = $request->input('search');
    
        // Buscar la persona por ID o Nombre
        $persona = Persona::where('id', $searchTerm)
                    ->orWhere('nombre', 'like', "%{$searchTerm}%")
                    ->first();
    
        // Si se encuentra la persona, devolver la vista con los datos
        if ($persona) {
            return view('persona.borrar', compact('persona'));
        } else {
            // Si no se encuentra, devolver con un mensaje de error
            return redirect()->back()->with('error', 'Persona no encontrada.');
        }
    }
    

}

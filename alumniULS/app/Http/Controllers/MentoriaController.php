<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentoria;

class MentoriaController extends Controller
{
    public function index()
    {
        // Mostrar la lista de relaciones de mentoría
        $mentorias = Mentoria::all();
        return view('mentorias.index', compact('mentorias'));
    }

    public function crear()
    {
        // Mostrar el formulario para crear una nueva relación de mentoría
        return view('mentorias.crear');
    }

    public function guardar(Request $request)
    {
        // Validar y guardar una nueva relación de mentoría
        $request->validate([
            'id_mentor' => 'required|exists:exalumnos,id',
            'id_estudiante' => 'required|exists:exalumnos,id',
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        Mentoria::create($request->all());

        return redirect()->route('mentorias.index')->with('success', 'La relación de mentoría se ha creado con éxito.');
    }

    public function editar($id)
    {
        // Mostrar el formulario para editar una relación de mentoría existente
        $mentoria = Mentoria::findOrFail($id);
        return view('mentorias.editar', compact('mentoria'));
    }

    public function actualizar(Request $request, $id)
    {
        // Validar y actualizar una relación de mentoría existente
        $request->validate([
            'id_mentor' => 'required|exists:exalumnos,id',
            'id_estudiante' => 'required|exists:exalumnos,id',
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);

        $mentoria = Mentoria::findOrFail($id);
        $mentoria->update($request->all());

        return redirect()->route('mentorias.index')->with('success', 'La relación de mentoría se ha actualizado con éxito.');
    }

    public function eliminar($id)
    {
        // Eliminar una relación de mentoría existente
        $mentoria = Mentoria::findOrFail($id);
        $mentoria->delete();

        return redirect()->route('mentorias.index')->with('success', 'La relación de mentoría se ha eliminado con éxito.');
    }
}

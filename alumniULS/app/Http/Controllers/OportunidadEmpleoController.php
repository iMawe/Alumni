<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OportunidadEmpleo;

class OportunidadEmpleoController extends Controller
{
    public function index()
    {
        // Mostrar la lista de oportunidades de empleo y pasantías
        $oportunidades = OportunidadEmpleo::all();
        return view('oportunidades.index', compact('oportunidades'));
    }

    public function crear()
    {
        // Mostrar el formulario para crear una nueva oportunidad
        return view('oportunidades.crear');
    }

    public function guardar(Request $request)
    {
        // Validar y guardar una nueva oportunidad
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'empresa' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        OportunidadEmpleo::create($request->all());

        return redirect()->route('oportunidades.index')->with('success', 'La oportunidad se ha creado con éxito.');
    }

    public function editar($id)
    {
        // Mostrar el formulario para editar una oportunidad existente
        $oportunidad = OportunidadEmpleo::findOrFail($id);
        return view('oportunidades.editar', compact('oportunidad'));
    }

    public function actualizar(Request $request, $id)
    {
        // Validar y actualizar una oportunidad existente
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'empresa' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        $oportunidad = OportunidadEmpleo::findOrFail($id);
        $oportunidad->update($request->all());

        return redirect()->route('oportunidades.index')->with('success', 'La oportunidad se ha actualizado con éxito.');
    }

    public function eliminar($id)
    {
        // Eliminar una oportunidad existente
        $oportunidad = OportunidadEmpleo::findOrFail($id);
        $oportunidad->delete();

        return redirect()->route('oportunidades.index')->with('success', 'La oportunidad se ha eliminado con éxito.');
    }
}

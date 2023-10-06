<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donacion;

class DonacionController extends Controller
{
    public function index()
    {
        // Mostrar la lista de donaciones
        $donaciones = Donacion::all();
        return view('donaciones.index', compact('donaciones'));
    }

    public function crear()
    {
        // Mostrar el formulario para crear una nueva donación
        return view('donaciones.crear');
    }

    public function guardar(Request $request)
    {
        // Validar y guardar una nueva donación
        $request->validate([
            'id_exalumno' => 'required|exists:exalumnos,id',
            'monto' => 'required|numeric|min:0',
            'fecha_donacion' => 'required|date',
        ]);

        Donacion::create($request->all());

        return redirect()->route('donaciones.index')->with('success', 'La donación se ha registrado con éxito.');
    }

    public function editar($id)
    {
        // Mostrar el formulario para editar una donación existente
        $donacion = Donacion::findOrFail($id);
        return view('donaciones.editar', compact('donacion'));
    }

    public function actualizar(Request $request, $id)
    {
        // Validar y actualizar una donación existente
        $request->validate([
            'id_exalumno' => 'required|exists:exalumnos,id',
            'monto' => 'required|numeric|min:0',
            'fecha_donacion' => 'required|date',
        ]);

        $donacion = Donacion::findOrFail($id);
        $donacion->update($request->all());

        return redirect()->route('donaciones.index')->with('success', 'La donación se ha actualizado con éxito.');
    }

    public function eliminar($id)
    {
        // Eliminar una donación existente
        $donacion = Donacion::findOrFail($id);
        $donacion->delete();

        return redirect()->route('donaciones.index')->with('success', 'La donación se ha eliminado con éxito.');
    }
}

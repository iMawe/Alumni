<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistroActividad;

class RegistroActividadController extends Controller
{
    public function index()
    {
        // Mostrar una lista de actividades registradas
        $actividades = RegistroActividad::latest()->get();
        return view('actividades.index', compact('actividades'));
    }

    public function registrar(Request $request)
    {
        // Registrar una nueva actividad
        RegistroActividad::create([
            'actividad' => $request->input('actividad'),
            'descripcion' => $request->input('descripcion'),
            'id_usuario' => auth()->user()->id, // Asignar el ID del usuario actual
        ]);

        return redirect()->route('actividades.index')->with('success', 'Actividad registrada con éxito.');
    }
}

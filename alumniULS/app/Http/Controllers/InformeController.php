<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informe;

class InformeController extends Controller
{
    public function index()
    {
        // Mostrar una lista de informes generados
        $informes = Informe::latest()->get();
        return view('informes.index', compact('informes'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo informe
        return view('informes.create');
    }

    public function store(Request $request)
    {
        // Validar y almacenar el nuevo informe
        $request->validate([
            'nombre_informe' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Informe::create([
            'nombre_informe' => $request->input('nombre_informe'),
            'descripcion' => $request->input('descripcion'),
            'fecha_generacion' => now(), // Fecha actual
        ]);

        return redirect()->route('informes.index')->with('success', 'Informe generado con éxito.');
    }

    public function show(Informe $informe)
    {
        // Mostrar detalles de un informe específico
        return view('informes.show', compact('informe'));
    }
}

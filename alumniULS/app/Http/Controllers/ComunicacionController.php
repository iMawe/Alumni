<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunicacion;

class ComunicacionController extends Controller
{
    public function listarComunicaciones()
    {
        // Lista todas las comunicaciones disponibles
        $comunicaciones = Comunicacion::all();
        return view('comunicaciones.index', compact('comunicaciones'));
    }

    public function mostrarComunicacion($id)
    {
        // Muestra los detalles de una comunicación específica
        $comunicacion = Comunicacion::find($id);
        return view('comunicaciones.show', compact('comunicacion'));
    }

    public function enviarComunicacion(Request $request)
    {
        // Valida y permite enviar una comunicación a los exalumnos
        $request->validate([
            'asunto' => 'required|string',
            'mensaje' => 'required|string',
            // Puedes agregar más reglas de validación según tus necesidades
        ]);

        // Crea un registro de comunicación en la base de datos
        Comunicacion::create([
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
            // Agrega más campos según tus necesidades
        ]);

        return redirect()->route('comunicaciones.listar')->with('success', 'La comunicación se ha enviado correctamente.');
    }
}

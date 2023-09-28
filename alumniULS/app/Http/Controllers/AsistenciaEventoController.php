<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsistenciaEvento;
use App\Models\Exalumno;
use App\Models\Evento;

class AsistenciaEventoController extends Controller
{
    public function marcarAsistencia(Request $request)
    {
        // Valida y almacena la asistencia del exalumno a un evento
        $request->validate([
            'id_exalumno' => 'required|exists:exalumnos,id',
            'id_evento' => 'required|exists:eventos,id',
            'asistio' => 'required|boolean',
        ]);

        // Crea un registro de asistencia en la base de datos
        AsistenciaEvento::create($request->all());

        return redirect()->back()->with('success', 'Asistencia marcada correctamente.');
    }

    public function editarAsistencia($id)
    {
        // Muestra el formulario para editar la asistencia de un exalumno a un evento
        $asistencia = AsistenciaEvento::find($id);
        return view('asistencia.edit', compact('asistencia'));
    }

    public function actualizarAsistencia(Request $request, $id)
    {
        // Actualiza la asistencia del exalumno a un evento
        $asistencia = AsistenciaEvento::find($id);
        $asistencia->update($request->all());

        return redirect()->route('eventos.show', $asistencia->id_evento)->with('success', 'Asistencia actualizada correctamente.');
    }

    public function eliminarAsistencia($id)
    {
        // Elimina el registro de asistencia de un exalumno a un evento
        $asistencia = AsistenciaEvento::find($id);
        $asistencia->delete();

        return redirect()->back()->with('success', 'Asistencia eliminada correctamente.');
    }
}

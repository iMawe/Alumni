<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembresiaRedes;

class MembresiaRedController extends Controller
{
    public function unirseRedSocial(Request $request)
    {
        // Valida y permite a un exalumno unirse a una red social o grupo
        $request->validate([
            'id_exalumno' => 'required|exists:exalumnos,id',
            'id_red_social' => 'required|exists:redes_sociales,id',
            // Puedes agregar más reglas de validación según tus necesidades
        ]);

        // Verifica si el exalumno ya está unido a la red social
        $exalumnoId = $request->input('id_exalumno');
        $redSocialId = $request->input('id_red_social');
        $membresiaExistente = MembresiaRedes::where('id_exalumno', $exalumnoId)
            ->where('id_red_social', $redSocialId)
            ->first();

        if ($membresiaExistente) {
            return redirect()->back()->with('error', 'Ya estás unido a esta red social.');
        }

        // Crea un registro de membresía en la base de datos
        MembresiaRedes::create([
            'id_exalumno' => $exalumnoId,
            'id_red_social' => $redSocialId,
            // Agrega más campos según tus necesidades
        ]);

        return redirect()->back()->with('success', 'Te has unido a la red social exitosamente.');
    }

    public function abandonarRedSocial(Request $request)
    {
        // Permite a un exalumno abandonar una red social o grupo
        $request->validate([
            'id_exalumno' => 'required|exists:exalumnos,id',
            'id_red_social' => 'required|exists:redes_sociales,id',
        ]);

        // Elimina el registro de membresía en la base de datos
        $exalumnoId = $request->input('id_exalumno');
        $redSocialId = $request->input('id_red_social');
        MembresiaRedes::where('id_exalumno', $exalumnoId)
            ->where('id_red_social', $redSocialId)
            ->delete();

        return redirect()->back()->with('success', 'Has abandonado la red social exitosamente.');
    }
}

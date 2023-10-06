<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RedSocial;
use App\Models\MembresiaRedes;

class RedSocialController extends Controller
{
    public function listarRedesSociales()
    {
        // Lista todas las redes sociales disponibles
        $redesSociales = RedSocial::all();
        return view('redes_sociales.index', compact('redesSociales'));
    }

    public function unirseRedSocial(Request $request)
    {
        // Valida y permite a un exalumno unirse a una red social
        $request->validate([
            'id_red_social' => 'required|exists:redes_sociales,id',
        ]);

        // Crea un registro de membresía en la base de datos
        MembresiaRedes::create([
            'id_exalumno' => auth()->user()->id_exalumno,
            'id_red_social' => $request->input('id_red_social'),
        ]);

        return redirect()->back()->with('success', 'Te has unido a la red social correctamente.');
    }

    public function mostrarRedSocial($id)
    {
        // Muestra los detalles de una red social específica
        $redSocial = RedSocial::find($id);
        return view('redes_sociales.show', compact('redSocial'));
    }

    public function publicarContenido(Request $request)
    {
        // Valida y permite a un exalumno publicar contenido en una red social
        $request->validate([
            'id_red_social' => 'required|exists:redes_sociales,id',
            'contenido' => 'required|string',
        ]);

        // Crea un registro de publicación en la base de datos
        // Aquí deberías ajustar la lógica según tus necesidades específicas

        return redirect()->back()->with('success', 'Contenido publicado correctamente.');
    }
}

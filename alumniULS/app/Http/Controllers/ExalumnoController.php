<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exalumno;

class ExalumnoController extends Controller
{
    public function index()
    {
        // Muestra una lista de exalumnos
        $exalumnos = Exalumno::all();
        return view('exalumnos.index', compact('exalumnos'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo exalumno
        return view('exalumnos.create');
    }

    public function store(Request $request)
    {
        // Almacena un nuevo exalumno en la base de datos
        Exalumno::create($request->all());
        return redirect()->route('exalumnos.index')->with('success', 'Exalumno creado exitosamente.');
    }

    public function show($id)
    {
        // Muestra los detalles de un exalumno específico
        $exalumno = Exalumno::find($id);
        return view('exalumnos.show', compact('exalumno'));
    }

    public function edit($id)
    {
        // Muestra el formulario para editar un exalumno
        $exalumno = Exalumno::find($id);
        return view('exalumnos.edit', compact('exalumno'));
    }

    public function update(Request $request, $id)
    {
        // Actualiza los datos de un exalumno en la base de datos
        $exalumno = Exalumno::find($id);
        $exalumno->update($request->all());
        return redirect()->route('exalumnos.index')->with('success', 'Exalumno actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Elimina un exalumno de la base de datos
        $exalumno = Exalumno::find($id);
        $exalumno->delete();
        return redirect()->route('exalumnos.index')->with('success', 'Exalumno eliminado exitosamente.');
    }
}
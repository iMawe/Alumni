<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index()
    {
        // Muestra una lista de eventos
        $eventos = Evento::all();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo evento
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        // Almacena un nuevo evento en la base de datos
        Evento::create($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento creado exitosamente.');
    }

    public function show($id)
    {
        // Muestra los detalles de un evento específico
        $evento = Evento::find($id);
        return view('eventos.show', compact('evento'));
    }

    public function edit($id)
    {
        // Muestra el formulario para editar un evento
        $evento = Evento::find($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        // Actualiza los datos de un evento en la base de datos
        $evento = Evento::find($id);
        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        // Elimina un evento de la base de datos
        $evento = Evento::find($id);
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado exitosamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\User;

class RolController extends Controller
{
    public function index()
    {
        // Mostrar una lista de roles
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    public function crear()
    {
        // Mostrar el formulario para crear un nuevo rol
        return view('roles.crear');
    }

    public function guardar(Request $request)
    {
        // Validar y crear un nuevo rol
        $request->validate([
            'nombre_rol' => 'required|unique:roles,nombre_rol',
        ]);

        Rol::create([
            'nombre_rol' => $request->input('nombre_rol'),
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado con éxito.');
    }

    public function asignarRol($usuarioId)
    {
        // Mostrar el formulario para asignar un rol a un usuario
        $usuario = User::findOrFail($usuarioId);
        $roles = Rol::all();
        return view('roles.asignar', compact('usuario', 'roles'));
    }

    public function guardarAsignacion(Request $request, $usuarioId)
    {
        // Validar y asignar un rol a un usuario
        $usuario = User::findOrFail($usuarioId);

        $request->validate([
            'rol_id' => 'required|exists:roles,id',
        ]);

        $usuario->roles()->attach($request->input('rol_id'));

        return redirect()->route('usuarios.index')->with('success', 'Rol asignado con éxito.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function registrar(Request $request)
    {
        // Mostrar el formulario de registro
        return view('usuarios.registrar');
    }

    public function guardarRegistro(Request $request)
    {
        // Validar y crear un nuevo usuario
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
            'id_exalumno' => 'required' // Asegúrate de que el campo id_exalumno sea requerido si es necesario
        ]);

        User::create([
            'nombre_usuario' => $request->input('nombre_usuario'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'id_exalumno' => $request->input('id_exalumno') // Asegúrate de que el campo id_exalumno se esté asignando correctamente
        ]);

        return redirect()->route('nombre_de_ruta_a_login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    public function perfil()
    {
        // Mostrar el perfil del usuario autenticado
        $usuario = auth()->user();
        return view('usuarios.perfil', compact('usuario'));
    }

    public function editarPerfil()
    {
        // Mostrar el formulario para editar el perfil del usuario
        $usuario = auth()->user();
        return view('usuarios.editar', compact('usuario'));
    }

    /*public function actualizarPerfil(Request $request)
    {
        // Validar y actualizar el perfil del usuario autenticado
        $usuario = auth()->user();

        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario,' . $usuario->id,
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
        ]);

        $usuario->update([
            'nombre_usuario' => $request->input('nombre_usuario'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('perfil')->with('success', 'Perfil actualizado con éxito.');
    }*/
}

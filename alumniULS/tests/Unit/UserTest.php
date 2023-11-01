<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMostrarFormularioRegistro()
    {
        // Prueba que la página de registro se carga correctamente
        $response = $this->get('/usuarios/registrar');
        $response->assertStatus(302);
    }

    public function testGuardarRegistroExitoso()
    {
        // Prueba que el registro de un nuevo usuario redirige correctamente
        $response = $this->withHeaders([
            'X-CSRF-TOKEN' => csrf_token(),
        ])->post('/usuarios/guardar', [
            'nombre_usuario' => 'JohnDoe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'id_exalumno' => 1,
        ]);
    
        $response->assertStatus(302);
    }

    public function testMostrarPerfil()
    {
        // Prueba que el perfil de usuario se muestra correctamente
        $user = \App\Models\User::factory()->create(); // Asegúrate de que tengas una factoría definida para el modelo User

        $response = $this->actingAs($user)->get('/usuarios/perfil');
        $response->assertStatus(200);
    }

    public function testMostrarFormularioEditar()
    {
        // Prueba que el formulario de edición de perfil se muestra correctamente
        $user = \App\Models\User::factory()->create(); // Asegúrate de que tengas una factoría definida para el modelo User

        $response = $this->actingAs($user)->get('/usuarios/editar-perfil');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Exalumno;

class ExalumnoTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/exalumnos');
        $response->assertStatus(302);
    }

    public function testCreate()
    {
        $response = $this->get('/exalumnos/create');
        $response->assertStatus(302);
    }

    public function testStore()
    {
        $exalumnoData = [
            'nombre' => 'John',
        ];

        $response = $this->post('/exalumnos', $exalumnoData);
        $response->assertStatus(419);
    }


}

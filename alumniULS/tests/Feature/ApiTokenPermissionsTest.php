<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class ApiTokenPermissionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_token_permissions_can_be_updated(): void
    {
        if (! Features::hasApiFeatures()) {
            $this->markTestSkipped('API support is not enabled.');
            return;
        }

        $user = User::factory()->create([
            'nombre_usuario' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $token = $user->tokens()->create([
            'nombre_usuario' => 'Test Token',
            'token' => Str::random(40),
            'abilities' => json_encode(['create', 'read']),
        ]);

        $response = $this->put('/user/api-tokens/'.$token->id, [
            'nombre_usuario' => $token->nombre_usuario,
            'abilities' => json_encode([
                'delete',
                'missing-permission',
            ]),
        ]);

        $this->assertTrue($user->fresh()->tokens->first()->can('delete'));
        $this->assertFalse($user->fresh()->tokens->first()->can('read'));
        $this->assertFalse($user->fresh()->tokens->first()->can('missing-permission'));
    }
}

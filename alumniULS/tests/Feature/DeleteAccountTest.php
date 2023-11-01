<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class DeleteAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_accounts_can_be_deleted(): void
    {
        if (!Features::hasAccountDeletionFeatures()) {
            $this->markTestSkipped('Account deletion is not enabled.');

            return;
        }

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->delete('/user', [
            'password' => 'password',
        ]);

        $this->assertNull(User::find($user->id));
    }

    public function test_correct_password_must_be_provided_before_account_can_be_deleted(): void
    {
        if (!Features::hasAccountDeletionFeatures()) {
            $this->markTestSkipped('Account deletion is not enabled.');

            return;
        }

        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->delete('/user', [
            'password' => 'wrong-password',
        ]);

        $this->assertNotNull(User::find($user->id));
    }
}

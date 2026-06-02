<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_a_new_user(): void
    {
        $authenticatedUser = User::create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
            'password' => Hash::make('1234'),
        ]);

        $response = $this->actingAs($authenticatedUser)
            ->post('/users', [
                'name' => 'Maria',
                'email' => 'maria@test.com',
                'password' => '1234',
            ]);

        $response->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', [
            'name' => 'Maria',
            'email' => 'maria@test.com',
        ]);
    }
}

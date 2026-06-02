<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_successfully(): void
    {
        $response = $this->post('/register', [
            'name' => 'José Alves',
            'email' => 'jose@teste.com',
            'password' => '1234',
        ]);

        $response->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'name' => 'José Alves',
            'email' => 'jose@teste.com',
        ]);
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_successfully(): void
    {
        $user = User::create([
            'name' => 'José Alves',
            'email' => 'jose@teste.com',
            'password' => Hash::make('1234'),
        ]);

        $response = $this->post('/login', [
            'email' => 'jose@teste.com',
            'password' => '1234',
        ]);

        $response->assertRedirect('/users');

        $this->assertAuthenticatedAs($user);
    }
}

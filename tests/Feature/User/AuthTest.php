<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    public function test_api_user_can_register()
    {
        $user = [
            'name'                  => 'User01',
            'email'                 => 'user01@example.com',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ];
        $response = $this->postJson('/api/v1/register', $user);
        $response->assertSuccessful();
        $this->assertDatabaseHas('users', ['name' => 'User01']);
    }

    public function test_api_user_invalid_register_returns_error()
    {
        $user = ['name'  => ''];
        $response = $this->postJson('/api/v1/register', $user)
            ->assertUnprocessable();
        $response->assertJsonValidationErrors(['name']);
    }

    public function test_api_user_can_login_with_email_and_password()
    {
        $response = $this->postJson('/api/v1/login', [
            'email'     => $this->user->email,
            'password'  => 'password'
        ])
            ->assertOk();
        $this->assertArrayHasKey('token', $response->json()['authorization']);
    }

    public function test_if_user_email_is_not_available_then_it_return_error()
    {
        $response = $this->postJson('/api/v1/login', [
            'email'     => 'user01@example.com',
            'password'  => 'password'
        ])->assertUnauthorized();
    }
}
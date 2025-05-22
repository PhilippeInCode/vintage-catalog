<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_access_dashboard_and_see_welcome_message(): void
    {
        $user = User::factory()->create([
            'role' => 'user',
            'name' => 'UsuarioTest',
        ]);

        $response = $this->actingAs($user)->get('/user/dashboard');

        $response->assertStatus(200);
        $response->assertSeeText('Bienvenido, UsuarioTest. Este es tu panel de usuario.');
    }
}

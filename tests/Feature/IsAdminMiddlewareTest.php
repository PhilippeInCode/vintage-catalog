<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IsAdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_route()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/admin-only-test');

        $response->assertStatus(200);
        $response->assertSee('Acceso admin');
    }

    public function test_non_admin_is_forbidden()
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)->get('/admin-only-test');

        $response->assertStatus(403);
        $response->assertSee('Forbidden');
    }

    public function test_guest_is_forbidden()
    {
        $response = $this->get('/admin-only-test');
        $response->assertRedirect('/login'); 
    }
}

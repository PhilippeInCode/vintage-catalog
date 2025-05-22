<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard_and_see_controls(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'AdminTest',
        ]);

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSeeText('Bienvenido AdminTest a tu dashboard');

        $response->assertSeeText('Añadir prenda');
        $response->assertSeeText('Eliminar prenda');
        $response->assertSeeText('Editar prenda');
        $response->assertSeeText('Visualizar prendas');
    }
}

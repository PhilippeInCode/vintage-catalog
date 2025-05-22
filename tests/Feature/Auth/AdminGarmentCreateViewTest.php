<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminGarmentCreateViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_garment_creation_view(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'AdminTest'
        ]);

        $response = $this->actingAs($admin)->get('/admin/garments/create');

        $response->assertStatus(200);
        $response->assertSeeText('Añadir nueva prenda');
        $response->assertSeeText('*Nombre');
        $response->assertSeeText('*Tipo de uso');
        $response->assertSeeText('Fotografías');
        $response->assertSeeText('Añadir prenda');
    }
}

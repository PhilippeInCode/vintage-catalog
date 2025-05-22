<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Garment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminGarmentEditViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_edit_view_for_a_garment(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'name' => 'AdminEditTest'
        ]);

        $garment = Garment::factory()->create([
            'name' => 'Chaqueta militar',
            'usage_type' => 'military',
            'description' => 'Prenda de uso militar',
            'origin_country' => 'Alemania',
            'used_country' => 'Francia',
            'production_year' => 1980,
            'usage_year' => 1985,
            'production_period' => '1980s',
            'materials' => 'Algodón y lana',
        ]);

        $response = $this->actingAs($admin)->get("/admin/garments/{$garment->id}/edit");

        $response->assertStatus(200);
        $response->assertSeeText('Editar prenda');
        $response->assertSee('Chaqueta militar');
        $response->assertSee('Prenda de uso militar');
        $response->assertSeeText('Guardar cambios');
    }
}

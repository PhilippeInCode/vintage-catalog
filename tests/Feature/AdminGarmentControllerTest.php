<?php

namespace Tests\Feature;

use App\Models\Garment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminGarmentControllerTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_admin_can_access_create_view()
    {
        $admin = $this->admin();
        $response = $this->actingAs($admin)->get('/admin/garments/create');

        $response->assertStatus(200);
        $response->assertSeeText('Añadir nueva prenda');
    }

    public function test_admin_can_store_new_garment_with_photos()
    {
        Storage::fake('public');
        $admin = $this->admin();

        $data = [
            'name' => 'Chaqueta de prueba',
            'usage_type' => 'military',
            'photos' => [UploadedFile::fake()->image('photo1.jpg')],
        ];

        $response = $this->actingAs($admin)->post('/admin/garments', $data);
        $response->assertRedirect('/garments');
        $this->assertDatabaseHas('garments', ['name' => 'Chaqueta de prueba']);
    }

    public function test_edit_mode_view_loads_with_garments()
    {
        $admin = $this->admin();
        Garment::factory()->count(2)->create();

        $response = $this->actingAs($admin)->get('/admin/garments/edit');
        $response->assertStatus(200);
        $response->assertSeeText('Modificar prenda seleccionada');
    }

    public function test_edit_view_displays_existing_garment()
    {
        $admin = $this->admin();
        $garment = Garment::factory()->create(['name' => 'Editar esto']);

        $response = $this->actingAs($admin)->get("/admin/garments/{$garment->id}/edit");
        $response->assertStatus(200);
        $response->assertSee('Editar prenda');
        $response->assertSee('Editar esto');
    }

    public function test_admin_can_update_garment()
    {
        $admin = $this->admin();
        $garment = Garment::factory()->create(['name' => 'Original']);

        $response = $this->actingAs($admin)->put("/admin/garments/{$garment->id}", [
            'name' => 'Actualizada',
            'usage_type' => 'formal'
        ]);

        $response->assertRedirect('/garments');
        $this->assertDatabaseHas('garments', ['name' => 'Actualizada']);
    }

    public function test_delete_mode_view_shows_garments()
    {
        $admin = $this->admin();
        Garment::factory()->create(['name' => 'Eliminar esto']);

        $response = $this->actingAs($admin)->get('/admin/garments/delete');
        $response->assertStatus(200);
        $response->assertSee('Eliminar esto');
    }

    public function test_destroy_selected_deletes_garments()
    {
        $admin = $this->admin();
        $garments = Garment::factory()->count(2)->create();

        $ids = $garments->pluck('id')->toArray();

        $response = $this->actingAs($admin)->delete('/admin/garments', [
            'garment_ids' => $ids
        ]);

        $response->assertRedirect('/garments');
        foreach ($ids as $id) {
            $this->assertDatabaseMissing('garments', ['id' => $id]);
        }
    }
}

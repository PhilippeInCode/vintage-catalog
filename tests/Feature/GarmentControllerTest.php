<?php

namespace Tests\Feature;

use App\Models\Garment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GarmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_loads_garments_view()
    {
        $garment = Garment::factory()->create(['name' => 'Chaqueta Vintage']);

        $response = $this->get('/garments');

        $response->assertStatus(200);
        $response->assertViewIs('garments');
        $response->assertSeeText('Chaqueta Vintage');
    }

    public function test_index_loads_with_edit_mode()
    {
        $response = $this->get('/garments?mode=edit');
        $response->assertStatus(200);
        $response->assertViewHas('editMode', true);
    }

    public function test_index_loads_with_delete_mode()
    {
        $response = $this->get('/garments?mode=delete');
        $response->assertStatus(200);
        $response->assertViewHas('deleteMode', true);
    }
}

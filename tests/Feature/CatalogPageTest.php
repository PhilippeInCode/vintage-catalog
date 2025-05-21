<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_page_loads_and_displays_garment_data(): void
    {
        $garment = \App\Models\Garment::factory()->hasPhotos(1)->create([
            'name' => 'Chaqueta A-2',
            'description' => 'Chaqueta de aviador',
            'production_year' => 1931,
            'used_country' => 'P. Goldsmith Sons Co.',
        ]);

        $response = $this->get('/garments');

        $response->assertStatus(200);
        $response->assertSee('Chaqueta A-2');
        $response->assertSee('Chaqueta de aviador');
        $response->assertSee('1931');
        $response->assertSee('P. Goldsmith Sons Co.');
    }
}

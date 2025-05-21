<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValuesPageTest extends TestCase
{
 
    public function test_values_page_loads_and_displays_expected_content(): void
    {
        $response = $this->get('/values');
        $response->assertStatus(200);

        $response->assertSee('Los valores son necesarios');

        $response->assertSee('Valores de la moda vintage');
        $response->assertSee('Mayor calidad');
        $response->assertSee('Consumo responsable');
        $response->assertSee('Respeto de los derechos humanos');
        $response->assertSee('Menor impacto');
        $response->assertSee('Historia y carácter');
        $response->assertSee('Artesanía local');

        $response->assertSee('Valores de vestir bien');
        $response->assertSee('Conocimiento');
        $response->assertSee('Practicidad');
        $response->assertSee('Comodidad');
        $response->assertSee('Atemporalidad');
        $response->assertSee('Buen aspecto');
        $response->assertSee('Ideales');

        $response->assertSee('Clásicos vintage');
        $response->assertSee('¿Deseas conocer más sobre el proyecto?');
        $response->assertSee('Contactar');
    }
}

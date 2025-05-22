<?php

namespace Tests\Feature;

use Tests\TestCase;

class TermsPageTest extends TestCase
{
    public function test_terms_page_loads_and_displays_expected_content(): void
    {
        $response = $this->get('/terms');

        $response->assertStatus(200);

        $response->assertSeeText('Términos y condiciones');

        $response->assertSeeText('1. Aceptación de los términos');
        $response->assertSeeText('Al acceder y utilizar este sitio web');

        $response->assertSeeText('2. Uso del sitio');
        $response->assertSeeText('Vintage Catalog es una plataforma dedicada');

        $response->assertSeeText('3. Registro de usuarios');
        $response->assertSeeText('es necesario registrarse');

        $response->assertSeeText('4. Contenido y propiedad intelectual');
        $response->assertSeeText('Todo el contenido publicado');

        $response->assertSeeText('5. Uso de imágenes');
        $response->assertSeeText('no se permite la publicación de contenido ofensivo');

        $response->assertSeeText('6. Modificaciones');
        $response->assertSeeText('Nos reservamos el derecho de modificar');

        $response->assertSeeText('7. Contacto');
        $response->assertSeeText('puedes contactarnos a través del formulario');
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactPageTest extends TestCase
{
    public function test_contact_page_loads_and_displays_expected_content(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);

        $response->assertSeeText('CONTACTO');

        $response->assertSeeText('Para cualquier consulta o contactar con nosotros, puedes hacerlo a través del siguiente formulario');

        $response->assertSeeText('Nombre:');
        $response->assertSeeText('Email:');
        $response->assertSeeText('Mensaje:');

        $response->assertSeeText('Enviar');

        $response->assertSeeText('0/500');
    }
}

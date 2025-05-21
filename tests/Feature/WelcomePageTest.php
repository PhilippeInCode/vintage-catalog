<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    public function test_welcome_page_loads_and_displays_expected_content(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('El legado de la moda permanente');

        $response->assertSee('¿Qué es la moda vintage?');
        $response->assertSee('Más que una moda, es un estilo de vida.');

        $response->assertSee('VALORES');
        $response->assertSeeText('Mayor resistencia');
        $response->assertSeeText('al desgaste');

        $response->assertSeeText('Cuidado del');
        $response->assertSeeText('medio ambiente');

        $response->assertSeeText('Prendas de');
        $response->assertSeeText('mejor calidad');

        $response->assertSeeText('Respeto de los');
        $response->assertSeeText('derechos humanos');

        $response->assertSee('Saber más');

        $response->assertSee('CATÁLOGO');
        $response->assertSee('N-1 Deck jacket');
        $response->assertSee('M-65 Jacket');
        $response->assertSee('A-2 Jacket');
        $response->assertSee('Ver catálogo');

        $response->assertSee('Puede ponerse en contacto con nosotros');
        $response->assertSee('Nombre:');
        $response->assertSee('Email:');
        $response->assertSee('Mensaje:');
        $response->assertSee('Enviar');
        $response->assertSee('¡Tus aportaciones complementan esta comunidad!');

        $response->assertSee('Proyecto íntegramente dedicado');
        $response->assertSee('Términos y condiciones');
        $response->assertSee('Suscríbete a nuestra newsletter');
        $response->assertSee('@PhilippeInCode');
    }
}

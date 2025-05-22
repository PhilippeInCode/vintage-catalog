<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_loads_and_displays_expected_content(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);

        $response->assertSeeText('Vintage catalog');
        $response->assertSeeText('Es un proyecto que nace de la pasión');
        $response->assertSeeText('sin tener que complicarse demasiado');

        $response->assertSeeText('constante aprendizaje');
        $response->assertSeeText('centralizar la información');
        $response->assertSeeText('comunidad motivada por vestir mejor');

        $response->assertSeeText('Aprender a');
        $response->assertSeeText('vestir mejor');

        $response->assertSeeText('Fomentar');
        $response->assertSeeText('la artesanía');

        $response->assertSeeText('Cuidado del');
        $response->assertSeeText('medio ambiente');
    }
}

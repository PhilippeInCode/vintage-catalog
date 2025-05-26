<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppLayoutComponentTest extends TestCase
{
    use RefreshDatabase;

    public function test_app_layout_component_renders_correct_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $view = $this->view('layouts.app', [
            'header' => 'Encabezado de prueba',
            'slot' => 'Contenido de prueba'
        ]);

        $view->assertSee('Contenido de prueba');
        $view->assertSee('Encabezado de prueba');
        $view->assertSee('<!DOCTYPE html>', false);
    }
}

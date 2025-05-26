<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestLayoutComponentTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_layout_component_renders_correct_view()
    {
        $view = $this->view('layouts.guest', [
            'slot' => 'Contenido de prueba para invitados'
        ]);

        $view->assertSee('Contenido de prueba para invitados');
        $view->assertSee('<!DOCTYPE html>', false); 
        $view->assertSee('<a href="/">', false); 
    }
}

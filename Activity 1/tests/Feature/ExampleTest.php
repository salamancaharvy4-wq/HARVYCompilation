<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_root_redirects_to_pokedex(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/pokedex');
    }

    public function test_pokedex_page_returns_a_successful_response(): void
    {
        $response = $this->get('/pokedex');

        $response->assertStatus(200);
        $response->assertSee('Starter Pokemon');
        $response->assertSee('Pokemon List');
    }
}

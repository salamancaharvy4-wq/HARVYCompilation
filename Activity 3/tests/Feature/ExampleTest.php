<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_redirects_to_the_form(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('form.create', absolute: false));
    }

    public function test_the_form_page_loads(): void
    {
        $response = $this->get('/form');

        $response->assertStatus(200);
        $response->assertSee('Community Skills Workshop Enrollment');
    }

    public function test_the_form_validates_required_fields(): void
    {
        $response = $this->post('/form', []);

        $response->assertSessionHasErrors([
            'participant_name',
            'email',
            'age',
            'workshop_track',
            'session_count',
            'learning_goal',
        ]);
    }

    public function test_the_form_accepts_valid_input(): void
    {
        $response = $this->post('/form', [
            'participant_name' => 'Maria Santos',
            'email' => 'maria@example.com',
            'age' => 21,
            'workshop_track' => 'Basic Coding',
            'session_count' => 3,
            'learning_goal' => 'I want to learn how to build simple websites.',
        ]);

        $response->assertRedirect(route('form.create', absolute: false));
        $response->assertSessionHas('success');
    }
}

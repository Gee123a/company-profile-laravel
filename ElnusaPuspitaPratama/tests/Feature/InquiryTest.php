<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submission(): void
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe Test',
            'email' => 'john.doe@test.com',
            'subject' => 'Request Quote',
            'message' => 'Hello this is a test message to verify the contact form submission is working correctly.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'name' => 'John Doe Test',
            'email' => 'john.doe@test.com',
            'subject' => 'Request Quote',
            'message' => 'Hello this is a test message to verify the contact form submission is working correctly.',
        ]);
    }
}

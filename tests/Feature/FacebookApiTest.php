<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacebookApiTest extends TestCase
{

    public function testFacebookGetShouldReturnSuccess()
    {
        $response = $this->json('GET', '/api/profile/facebook/10214896922593764');

        $response
            ->assertStatus(200);
    }

    public function testApiSuccessResponseWithDataAndStatus()
    {
        $response = $this->json('GET', '/api/profile/facebook/10214896922593764');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => true,
                'status' => true
            ]);
    }

    public function testApiErrorResponseWithErrorAndStatus()
    {
        $response = $this->json('GET', '/api/profile/facebook/1');

        $response
            ->assertStatus(200)
            ->assertJson([
                'error' => true,
                'status' => true
            ]);
    }
}

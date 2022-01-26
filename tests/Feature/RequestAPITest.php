<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequestAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_requestapi()
    {
        $response = $this->post('/api/podcasts/create', [
            'podcast_url' => 'https://feeds.megaphone.fm/VMP5705694065',
        ]);

        $response->assertStatus(200);
    }
}

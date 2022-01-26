<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\PodcastsController;

class URLTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_url()
    {
        $podcast_url = 'https://feeds.megaphone.fm/VMP5705694065';
        
        // call podcast controller to test podcast url
        $controller = new PodcastsController();
        $podcast = $controller->testPodcastURL($podcast_url);
        $this->assertTrue(true);
    }
}

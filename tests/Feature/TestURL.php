<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\PodcastsController;

class TestURL extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_url()
    {
        $podcast_url = 'https://feeds.simplecast.com/54nAGcIl';
        
        // call podcast controller to test podcast url
        $controller = new PodcastsController();
        $podcast = $controller->testPodcastURL($podcast_url);
        $this->assertTrue(true);
    }
}

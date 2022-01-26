<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\PodcastsController;

class ImportPodcastTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_import()
    {
        $podcast_url = 'https://feeds.simplecast.com/54nAGcIl';
        
        // call podcast controller to test podcast url
        $controller = new PodcastsController();
        $podcast = $controller->create($podcast_url);
        
        $this->assertTrue(true);
    }
}

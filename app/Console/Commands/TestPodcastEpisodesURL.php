<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PodcastEpisodesController;

class TestPodcastEpisodesURL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test-podcast-episodes-url {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the provided URL and try to get the podcast episodes list';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $podcast_url = $this->argument('url');
        // call podcast controller to test podcast url
        $controller = new PodcastEpisodesController();
        $podcast = $controller->testPodcastEpisodesURL($podcast_url);

        // if the podcast information is not empty
        if (!empty($podcast)) {
            // loop through the podcast episodes
            foreach ($podcast as $episode) {
                // print the episode number in array
                $this->info('episode title ' . $episode['title']);
                $this->info('episode description ' . substr($episode['description'], 0, 50) . '...');
                $this->info('episode url ' . $episode['website_url']);
                $this->info('episode image ' . $episode['image']);
                $this->info('episode language ' . $episode['language']);
                $this->info('-------------------------------------');
            }
        }
        else{
            $this->info('podcast information is empty');
        }
    }
}

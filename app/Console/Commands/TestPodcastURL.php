<?php

namespace App\Console\Commands;

use App\Http\Controllers\PodcastsController;
use Illuminate\Console\Command;

/**
 * TestPodcastURL
 *
 * @category   Command
 * @package    TestPodcastURL
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description Test podcast URL command for artisan
 */
class TestPodcastURL extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test-podcast-url {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Try to get the podcast URL';

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
        $controller = new PodcastsController();
        $podcast = $controller->testPodcastURL($podcast_url);
        // print the podcast information
        $this->info('podcast title ' . $podcast['title']);
        $this->info('podcast description ' . $podcast['description']);
        $this->info('podcast url ' . $podcast['website_url']);
        $this->info('podcast feed url ' . $podcast['rss_feed_url']);
        $this->info('podcast artwork ' . $podcast['artwork_url']);
        $this->info('podcast language ' . $podcast['language']);
    }
}


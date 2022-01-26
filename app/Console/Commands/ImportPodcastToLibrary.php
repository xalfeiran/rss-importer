<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PodcastsController;
use App\Http\Controllers\PodcastEpisodesController;

/**
 * TestPodcastEpisodesURL
 *
 * @category   Command
 * @package    TestPodcastEpisodesURL
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description With the provided URL try to get the podcast info and episodes to update the database
 */
class ImportPodcastToLibrary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import-podcast-to-library {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'With the provided URL, try to get the podcast information and episodes list';

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
        // save the current time
        $time = time();

        // with the url call the controller to create the podcast in the library
        $podcast_url = $this->argument('url');
        // call podcast controller to test podcast url
        $controller = new PodcastsController();
        $podcast = $controller->create($podcast_url);

        // diff between the current time and the time variable
        $diff = time() - $time;

        $this->info('Podcast information loaded');
        $this->info('Took ' . $diff . ' seconds');
    }
}

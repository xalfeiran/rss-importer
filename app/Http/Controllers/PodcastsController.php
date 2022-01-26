<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use App\Helpers\ContentsFromURL;
/**
 * PodcastsController
 *
 * @category   Controller
 * @package    PodcastsController
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description Podcasts related class controller
 */
class PodcastsController extends Controller
{

    /**
     * Test podcast URL
     *
     * @param string $podcast_url
     * @return void
     */
    public function testPodcastURL($podcast_url)
    {
        // try to get podcast information from a url
        $podcast = ContentsFromURL::getFromURL($podcast_url);
        // if the podcast information is not empty
        
        return $podcast;
        
    }

    // create a new podcast
    public function create($podcast_url)
    {
        // get the podcast information from the request
        $podcast_data = ContentsFromURL::getFromURL($podcast_url);
        // if the podcast information is not empty
        if (!empty($podcast_data)) {

            // create or replace the podcast
            $podcast = Podcast::updateOrCreate($podcast_data);
            // if the podcast is created
            if ($podcast) {
                // get the podcast episodes
                $podcast_episodes = ContentsFromURL::getEpisodesFromURL($podcast_url);
                // if the podcast episodes are not empty
                if (!empty($podcast_episodes)) {
                    // create or replace the podcast episodes
                    $podcast_episodes = PodcastEpisodesController::replace_all($podcast, $podcast_episodes);
                }
            }

            return $podcast;
        }
    }

    // sample method to call the podcast creation from a request
    public function createFromRequest(Request $request)
    {
        // get the podcast information
        $podcast_url = $request->podcast_url;
        // call the podcast creation
        $podcast = $this->create($podcast_url);

        // return a json response
        return response()->json($podcast);
    }
}

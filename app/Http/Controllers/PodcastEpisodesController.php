<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\PodcastEpisode;
use App\Helpers\ContentsFromURL;

/**
 * PodcastEpisodesController
 *
 * @category   Controller
 * @package    PodcastEpisodesController
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description Podcast episodes related class controller
 */
class PodcastEpisodesController extends Controller
{
    /* 
     * Test for a podcast episodes URL
     */
    public function testPodcastEpisodesURL($podcast_url)
    {
        // try to get podcast information from a url
        $podcast = ContentsFromURL::getEpisodesFromURL($podcast_url);
        // if the podcast information is not empty
        
        return $podcast;
    }

    /* 
     * Bulk create or replace podcast episodes
     */
    static function replace_all($podcast, $podcast_episodes)
    {
        // if the podcast episodes are not empty
        if (!empty($podcast_episodes)) {

            // run thru the podcast episodes
            foreach($podcast_episodes as $podcast_episode) {
                // create or replace the podcast episode
                $podcast_episode['podcast_id'] = $podcast->id;
                $podcast_episode = PodcastEpisode::updateOrCreate($podcast_episode);   
            }
        }
    }
}

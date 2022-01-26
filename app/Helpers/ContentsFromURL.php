<?php

namespace App\Helpers;

use Route;
use App\Models\Podcast;

/**
 * ContentsFromURL
 *
 * @category   Helper
 * @package    ContentsFromURL
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description Handle all then interactions with the outside world regarding getin content from podcasts
 */
class ContentsFromURL
{
    // try to get podcast information from a url
    public static function getFromURL( $url )
    {
        // get the xml file
        $xml = file_get_contents( $url );
        // the thing with the namespace and the simplexml_load_string
        
        $xml = str_replace('<itunes:new-feed-url>', '<newfeedurl>', $xml);
        $xml = str_replace('</itunes:new-feed-url>', '</newfeedurl>', $xml);

        // try catch if the xml is not valid
        try {
             // parse the xml file
            $xml = simplexml_load_string( $xml );
            // get the podcast information
            $podcast = self::getPodcastInformation( $xml );
            // return the podcast information
            return $podcast;
        } catch (\Exception $e) {
            return false;
        }
    }

    // try to get podcast episodes information from a xml file
    public static function getEpisodesFromURL( $url )
    {
        // get the xml file
        $xml = file_get_contents( $url );
        $xml = str_replace('<itunes:duration>', '<itunesduration>', $xml);
        $xml = str_replace('</itunes:duration>', '</itunesduration>', $xml);
        // parse the xml file
        $xml = simplexml_load_string( $xml );
        // get the podcast episodes information
        $podcast_episodes = self::getPodcastEpisodes( $xml );
        // return the podcast episodes information
        return $podcast_episodes;
        
    }

    // get podcast information from a xml file
    public static function getPodcastInformation( $xml )
    {

        // get the podcast information
        $podcast = [
            'title' => $xml->channel->title,
            'description' => $xml->channel->description,
            'rss_feed_url' => $xml->channel->newfeedurl,
            'artwork_url' => $xml->channel->image->url,
            'language' => $xml->channel->language,
            'website_url' => $xml->channel->link,
        ];
        // return the podcast information
        return $podcast;
    }

    // get podcast episodes from a xml file
    public static function getPodcastEpisodes( $xml )
    {
        // get the podcast episodes
        $podcast_episodes = [];
        foreach ( $xml->channel->item as $item ) {
            $podcast_episodes[] = [
                'title' => $item->title,
                'description' => $item->description,
                'audio_url' => $item->enclosure['url'],
                'duration' => $item->itunesduration,
                'episode_url' => $item->link
            ];
        }
        // return the podcast episodes
        return $podcast_episodes;
    }
}

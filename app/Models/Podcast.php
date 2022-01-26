<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',        // podcast title
        'artwork_url',  // podcast artwork url (square image)
        'rss_feed_url', // podcast rss feed url (xml)
        'description',  // podcast description
        'language',     // podcast language
        'website_url',  // podcast website url
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'artwork_url' => 'string',
        'rss_feed_url' => 'string',
        'description' => 'string',
        'language' => 'string',
        'website_url' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',   // podcast record first date of creation in DB
        'updated_at',   // podcast record last date of update in DB
    ];

    /**
     * Relationship with PodcastEpisodes.
     */
    public function episodes()
    {
        return $this->hasMany(PodcastEpisode::class, 'podcast_id', 'id');
    }
}

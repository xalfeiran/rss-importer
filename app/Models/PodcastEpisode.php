<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * PodcastEpisode model
 *
 * @category   Model
 * @package    PodcastEpisode
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description Model for each episode of certain podcast
 */
class PodcastEpisode extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',        // episode title
        'description',  // episode description
        'audio_url',    // episode audio url
        'duration',     // episode duration
        'episode_url',  // episode url (depending on the podcast this info may not be available)
        'podcast_id',   // episode podcast id
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'audio_url' => 'string',
        'duration' => 'integer',
        'episode_url' => 'string',
        'podcast_id' => 'integer',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',   // episode record first date of creation in DB
        'updated_at',   // episode record last date of update in DB
    ];

    /**
     * Relationship with Podcast.
     */
    public function podcast()
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}

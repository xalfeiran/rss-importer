<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Podcasts table migration
 *
 * @category   Migration
 * @package    Podcasts
 * @author     Xavier Alfeiran <xavier.alfeiran@gmail.com>
 * @description Create the Podcasts table follwing the model structure
 */
class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('artwork_url');
            $table->mediumText('rss_feed_url');
            $table->mediumText('description');
            $table->string('language');
            $table->mediumText('website_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('podcasts');
    }
}
